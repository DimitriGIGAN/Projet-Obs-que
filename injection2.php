<?php
//Description:
//Injection d'un fichier enregistrer directement sur le serveur et nomm : obsq.csv
//dont les champs doivent suivre de la manire suivante :
//
//entreprise;option;Identifiant;N° de contrat;Categorie;Nom;Prenom;Date de naissance;INSEE;Adresse;Code postal;Ville;Situation;Date d'inscription;Date d'effet;Carence
//les dates doivent tre de la forme : 01/01/2001
//
// pour que la page PHP fonctionne il faut donc que le fichier soit au pralable copier en SSH ou  FTP dans : /var/www/obsq/upload/
// et se nommer : obsq.csv
?>

<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="UTF-8" />
  <title>Injection Fichiers Obs</title>
</head>

<body>
        <link rel="stylesheet" type="text/css" href="obsq.css" />
</head>
<h1>Injection des Fichiers Obseques</h1>
<form action="" method="post" enctype="multipart/form-data">

<input type="submit" name="envoyer" value="Envoyer le fichier">
</form>

<?php
function InjDate($val) {
        //formate une Date (JJ/MM/YYYY) en  (YYYY-MM-JJ) pour l'injecter dans la base'
        $val = explode("/",$val);
        $val = $val[2]."-".$val[1]."-".$val[0];
        return $val;
        }

if(isset($_POST['envoyer']))
{
        $ZeFile = "obsq_".date("H-i-s_d-m-Y");
/*Ouverture du fichier en lecture seule*/
$handle = fopen('obsq.csv', 'r');
/*Si on a russi  ouvrir le fichier*/
if ($handle)
{
      //On se connecte  la base
        include('connexion_bdd.php');
     //Suppression des anciennes valeur dans la Table
     $SsVide = "DELETE FROM lst_file_obsq";
     $Rqqt = $dbh->query($SsVide) or die(print_r($dbh->errorInfo()));
        /*Tant que l'on est pas  la fin du fichier*/
        $FoutuCompteur=0;
        $Xxx = 0;
        while (!feof($handle))
        {
                /*On lit la ligne courante*/
                $buffer = fgets($handle);
                /*On l'affiche*/
                if ($Xxx > 0) { //on ne prend pas la premire ligne

                           $lineContent = $buffer;
              $lineContent = str_replace ( '"', "", $lineContent) ;
              //Purge de la ligne des caracteres speciaux et mise en Majuscule
              $lineContent = str_replace ( '', "A", $lineContent) ;
              $lineContent = str_replace ( '', "A", $lineContent) ;
              $lineContent = str_replace ( '', "A", $lineContent) ;
              $lineContent = str_replace ( '', "E", $lineContent) ;
              $lineContent = str_replace ( '', "E", $lineContent) ;
              $lineContent = str_replace ( '', "C", $lineContent) ;
              $lineContent = strtoupper($lineContent);
              $lineContent = str_replace ( ',', " ", $lineContent) ;
              $lineContent = str_replace ( '', "O.", $lineContent) ;
              $lineContent = str_replace ( '', "O.", $lineContent) ;
              $lineContent = str_replace ( '', "I.", $lineContent) ;
              $lineContent = str_replace ( '', "E.", $lineContent) ;
              $lineContent = str_replace ( "'", "-", $lineContent) ;
              $Lst = explode(';',$lineContent);
              $FoutuCompteur = $FoutuCompteur+1;
              //injection des valeurs de la ligne dans la base SQL.
              $sql = "INSERT INTO lst_file_obsq VALUES('',
                                                 '".$FoutuCompteur."',
                                                 '".$Lst[0]."',
                                                 '".$Lst[1]."',
                                                 '".$Lst[2]."',
                                                 '".$Lst[3]."',
                                                 '".$Lst[4]."',
                                                 '".$Lst[5]."',
                                                 '".$Lst[6]."',
                                                 '".$Lst[7]."',
                                                 '".$Lst[8]."',
                                                 '".$Lst[9]."',
                                                 '".$Lst[10]."',
                                                 '".$Lst[11]."',
                                                 '".$Lst[12]."',
                                                 '".InjDate($Lst[13])."',
                                                 '".InjDate($Lst[14])."',
                                                 '".$Lst[15]."',
                                                 '".$Lst[16]."','".$ZeFile."');";
                   echo "------------------------------------------------------------------------------------------------------</br>Injection de la ligne : </br>".$sql;
                  $req = $dbh->query($sql) or die(print_r($dbh->errorInfo()));
                  echo "<br>====> OK !!!!";
                }
                $Xxx = $Xxx + 1;
        }
        /*On ferme le fichier*/
        echo "<script language=\"JavaScript\">alert('Upload des ".$FoutuCompteur." lignes OK!');</script>";
        fclose($handle);
} else {
                        echo "<script language=\"JavaScript\">alert('Une Erreur s\'est produite!');</script>";
        }
}
?>
</body>
</html>