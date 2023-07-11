<?php
session_start();

$expectedCode = "123456"; // Remplacez cette valeur par le code attendu

$verificationCode = $_POST["verification_code"];

if ($verificationCode == $expectedCode) {
  // Code de vérification incorrect, gérer l'erreur
  require_once("ldap.php");
 } else { header("Location: error_log.php");

  exit();
}
?>
