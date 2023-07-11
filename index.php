<?php

session_start();
$_SESSION['id_min_page'] = 1;
$_SESSION['id_max_page'] = 1000;

if(!isset($_SESSION['usr'])){
        echo 'test';
        echo $_SESSION['usr'];
        header('Location:index.html');
}
?>

<!DOCTYPE html>
<html lang="fr-FR">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="obsq.css" />
    <!--[if IE]>
      <link rel="stylesheet" type="text/css" href="ie.css" />
      <![endif]-->
    <link rel="shortcut icon" href="images/ums.ico" />
    <title>UMS - Fichiers Obsèques</title>
  </head>

  <body>
  <nav>
        <a href="index.html">Accueil</a>
      </nav>
  <header>
    <a href='index.php'><img src='images/UMS1.png' alt='logo UMS'/></a>
    <h1>FICHIER OBSEQUES</h1>
  </header>
      <div id="ifrm">

         <?php

           //***************************************************************************\\
           //*                WebApplication : Obsq                                    *\\
           //*                    Version    :  1.0.0                                  *\\
           //*              Date de Création : 08/08/2012                              *\\
           //***************************************************************************\\
           //*                      Module   : index.php                               *\\
           //*        Modification du Module : 09/08/2012                              *\\
           //*                   Réalisé par : Fabrice MAILLOT                         *\\
           //*                    Deziné par : Christophe IROUVA                       *\\
           //***************************************************************************\\

           //on vérifie si une session est active
           if(isset($_SESSION['usr']) and ($_SESSION['iFram'] == "index.php")) {

                //affichage du Menu en fonction du groupe
                if ($_SESSION['usr']=='stagiaire') {
                    echo "<iframe src=\"injection2.php\"";
                }
                else {
                    echo "<br/>";
                    echo "<iframe src=\"tbord.php\"";
                }
                echo "  name=\"ZeBord\"";
                echo " id=\"ZeBord\"";
                echo "</iframe>";
                                 echo "</div>";
           }

           else {
                           header('location:index.html');
           }
        ?>

                <footer>
                        <div>
                                <p>Site développé par le service Informatique de l'UMS</p>
                        </div>
                </footer>
  </body>