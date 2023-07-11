<?php 

$reponse = $_POST['question'];
if ($reponse == 5 ) {
require_once("ldap2.php");
} else if ($response != 5)  {
    header("Location: error_log.php");
    exit();
}
?>


