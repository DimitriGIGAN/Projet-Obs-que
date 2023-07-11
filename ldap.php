<?php
session_start();
// Vérifier si le nombre maximal de tentatives est dépassé
$maxAttempts = 5; // Définir le nombre maximal de tentatives autorisées
$blockedTime = 60; // Durée du blocage en secondes en cas de dépassement du nombre maximal de tentatives
$blockedKey = 'blocked_until'; // Clé utilisée pour stocker le moment où l'utilisateur est bloqué dans la variable de session

if (isset($_SESSION[$blockedKey]) && $_SESSION[$blockedKey] > time()) {
    // Utilisateur bloqué, rediriger vers une page d'attente ou d'erreur
    header('Location: error_log.php');
    exit();
}

// Récupération des informations du formulaire
if (isset($_POST["CR_usr"]) && !empty($_POST["CR_usr"]) && isset($_POST["CR_pwd"]) && !empty($_POST["CR_pwd"])) {
    $usr = $_POST["CR_usr"];
    $pwd = $_POST["CR_pwd"];

    include('connexion_bdd.php');
    // Requête pour vérifier les informations de connexion
    $sql = "SELECT * FROM usr_obsq WHERE user = :usr AND m2p = :pwd";
    $req = $dbh->prepare($sql);
    $req->execute(array('usr' => $usr, 'pwd' => $pwd));
    $data = $req->fetch();

    if ($data) {
        // Authentification réussie, enregistrer les informations de session et rediriger vers la page principale
        $_SESSION['usr'] = $data['user'];
        $_SESSION['iFram'] = "index.php";
        $_SESSION['id_min_page'] = 1;
        $_SESSION['id_max_page'] = 1000;
        // Réinitialiser le compteur de tentatives
        unset($_SESSION['login_attempts']);
        header('Location: index.php');
        exit();

    } else {
        // Authentification échouée, incrémenter le compteur de tentatives
        $_SESSION['login_attempts'] = isset($_SESSION['login_attempts']) ? $_SESSION['login_attempts'] + 1 : 1;
        if ($_SESSION['login_attempts'] >= $maxAttempts) {
            // Bloquer l'utilisateur pour une période de temps
            $_SESSION[$blockedKey] = time() + $blockedTime;
            // Réinitialiser le compteur de tentatives
            unset($_SESSION['login_attempts']);
            header('Location: block.php');
            exit();
        } else {
            // Rediriger vers une page d'erreur ou afficher un message d'erreur
            header('Location: error_log.php');
            exit();
        }

}
}
?>
