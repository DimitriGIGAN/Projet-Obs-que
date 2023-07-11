<?php
        /**********************************************
         * Script de connexion à la base              *
         * et fonction de gestion des erreurs d'acces *
         **********************************************/

        // Définition des variables de connexion
        $user = "admin";
        $pass = "12345678";
        $dsn ='mysql:host=localhost;dbname=db_obsq'; //Data Source Name

        // Connexion
        try {
                $dbh = new PDO($dsn, $user, $pass, array(
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        }
        catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
        }
?>