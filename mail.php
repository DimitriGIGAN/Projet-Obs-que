<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

if(mail('elfayedmpro@gmail.com', 'coucou', 'envoie de mail reussi')){
        echo "reussi";
}
else{
        echo "echec";
}
                         
?>