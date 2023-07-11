<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr-FR">
        <head>
                <meta charset="UTF-8" />
                <title>UMS - Fichiers Obseques</title>
                <link rel="stylesheet" type="text/css" href="obsq.css" />
                <!--[if IE]>
                <link rel="stylesheet" type="text/css" href="ie.css" />
                <![endif]-->
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
                 <script type="text/javascript">
                        $(document).ready(function(){
                                $('#chps_search div:nth-child(n+2)').hide();
                                $('input[name="val_search"]').keyup(function(){
                                        $('#chps_search div:nth-child(2)').show();
                                });
                                $('input[name="val_search2"]').keyup(function(){
                                        $('#chps_search div:nth-child(3)').show();
                                });

                        });

                </script>
        </head>

<body>
        <!--
    <form method="post" action="tab.php" name="listing">
          <fieldset>
              <legend style="caption-side: left;">Afficher une Liste Compl&egrave;te</legend>
              Choix du Fichier :
              <select name="lst_file">
              <?php

//                  $Sql = "SELECT DISTINCT file_name FROM lst_file_obsq";
//                  $db = mysql_connect('localhost', 'oBsQ2068', '12us89ks0o67s');
//                  mysql_select_db('db_obsq',$db);
//                  $req = mysql_query($Sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
//                  $val = array();
//                  while($data = mysql_fetch_assoc($req)){
//                      array_push($val, $data);
//                  }
//                  mysql_close();
//                  foreach($val as $usr) {
//                       echo '<option value="'.$usr["file_name"].'">'.$usr["file_name"].'</option>';
//                }
              ?>
              </select>
              <input value="Afficher la Liste" type="submit" name="valide">
          </fieldset>
    </form>  </br> -->
    <form method="post" action="tabS.php" name="search">
          <fieldset>
                                <legend style="caption-side:left;font-weight:bold;font-size:20px;">Recherche Spécifique</legend>
                                <div>

                                                <?php
                                                include('connexion_bdd.php');

                                                $sql = "SELECT DISTINCT file_name FROM lst_file_obsq";

                                                $req = $dbh->query($sql) or die(print_r($dbh->errorInfo()));

                                                if($req->rowCount()>1){
                                                        echo"<label style='display:inline-block;width:120px;padding:3px;margin-left:15px' for='lst_file'>Choix du Fichier :</label>
                                                        <select style='width:200px;padding:3px' name='lst_file'>";

                                                        while($usr = $req->fetch()){
                                                                echo '<option value="'.$usr["file_name"].'">'.$usr["file_name"].'</option>';
                                                        }
                                                        echo"</select>";
                                                }
                                                else{
                                                        echo"<select style='display:none;width:200px;padding:3px' name='lst_file'>";

                                                        while($usr = $req->fetch()){
                                                                echo '<option value="'.$usr["file_name"].'" selected>'.$usr["file_name"].'</option>';
                                                        }
                                                        echo"</select>";
                                                }

                                                ?>
                                </div>
                                <div id='chps_search'>
                                <div>
                                                <h2>Rechercher :</h2>
                                                <label for="lst_search">Dans le Champ :</label>
                                                <select name="lst_search">
                                                                <!--<option value="IDENTIFIANT">IDENTIFIANT</option>-->

                                                                <option value="NUM_CONTRAT">NUM_CONTRAT</option>
                                                                <option value="NOM" selected>NOM</option>
                                                                <option value="PRENOM">PRENOM</option>
                                                                <option value="INSEE">INSEE</option>
                                                                <option value="ADRS">ADRS</option>
                                                                <option value="CODE_POSTAL">CODE_POSTAL</option>
                                                                <option value="VILLE">VILLE</option>
                                                                <option value="RAPATRIMENT">RAPATRIEMENT</option>
                                                </select>
                                                <label for="opt_search">La Valeur qui </label>
                                                <select name="opt_search">
                                                        <option value="com">Commence Par</option>
                                                        <option value="cont" selected>Contient</option>
                                                        <option value="fin">Fini Par</option>
                                                        <option value="ext">Est Exactement</option>
                                                </select>

                                                <input maxlength="200" name="val_search" placeholder='' autofocus required><p class='obligatoire'> * </p>
                                </div>
                                <div>
                                                <label for="lst_search2" id="R1" >Dans le Champ : </label>
                                                <select name="lst_search2">
                                                        <!--<option value="IDENTIFIANT">IDENTIFIANT</option>-->
                                                        <option value="NUM_CONTRAT">NUM_CONTRAT</option>
                                                        <option value="NOM">NOM</option>
                                                        <option value="PRENOM" selected>PRENOM</option>
                                                        <option value="INSEE">INSEE</option>
                                                        <option value="ADRS">ADRS</option>
                                                        <option value="CODE_POSTAL">CODE_POSTAL</option>
                                                        <option value="VILLE">VILLE</option>
                                                        <option value="RAPATRIMENT">RAPATRIEMENT</option>
                                                </select>

                                                <label for="opt_search2" id="R2" >La Valeur qui  </label>
                                                <select name="opt_search2">
                                                        <option value="com">Commence Par</option>
                                                        <option value="cont" selected>Contient</option>
                                                        <option value="fin">Fini Par</option>
                                                        <option value="ext">Est Exactement</option>
                                                </select>
                                                <input maxlength="200" name="val_search2">
                                </div>
                                <div>
                                                <!-- <label for="lst_search3" id="R1" >Dans le Champ : </label>
                                                <select name="lst_search3">
                                                        <<option value="IDENTIFIANT">IDENTIFIANT</option>-->
                                                        <!-- <option value="NUM_CONTRAT">NUM_CONTRAT</option>
                                                        <option value="NOM">NOM</option>
                                                        <option value="PRENOM">PRENOM</option>
                                                        <option value="INSEE">INSEE</option>
                                                        <option value="ADRS">ADRS</option>
                                                        <option value="CODE_POSTAL" selected>CODE_POSTAL</option>
                                                        <option value="VILLE">VILLE</option>
                                                        <option value="RAPATRIMENT">RAPATRIEMENT</option>
                                                </select> -->
                                <!-- </div>
                                <div> --> 
                                                <!-- <label for="opt_search3" id="R2" >La Valeur qui  </label>
                                                <select style='width:140px;padding:3px' name="opt_search3">
                                                        <option value="com">Commence Par</option>
                                                        <option value="cont" selected>Contient</option>
                                                        <option value="fin">Fini Par</option>
                                                        <option value="ext">Est Exactement</option>
                                                </select>
                                                <input maxlength="200" name="val_search3"> -->
                                        </div>
                                <br /><p class="obligatoire"> * : Champ obligatoire</p><br /><br />
                                </div>
                                <input value="Rechercher" type="submit" name="valide">
                        </fieldset>
    </form>
        <footer>
                <div>
                        <p>Site développé par le service Informatique de l'UMS</p>
                </div>
        </footer>
</body>
</html>