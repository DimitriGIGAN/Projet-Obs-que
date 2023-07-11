<?php
   //***************************************************************************\\
   //*                WebApplication : Obsq                                    *\\
   //*                    Version    :  1.0.0                                  *\\
   //*              Date de Création : 08/08/2012                              *\\
   //***************************************************************************\\
   //*                      Module   : tab.php                                 *\\
   //*        Modification du Module : 09/08/2012                              *\\
   //*                   Réalisé par : Fabrice MAILLOT                         *\\
   //*                                                                         *\\
   //***************************************************************************\\

   //initialisation de la session PHP
   session_start();
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
        <meta charset="UTF-8" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script>
                !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
        </script>
        <script type="text/javascript" src="jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="obsq.css" />
<script type="text/javascript">
                $(document).ready(function() {
                        $("#various3").fancybox({
                                'width'                         : '80%',
                                'height'                        : '100%',
                                'autoScale'                     : false,
                                'transitionIn'                  : 'none',
                                'transitionOut'                 : 'none',
                                'type'                          : 'iframe'
                        });

                });
        function toto(id, ZeVal) {
                $("#various3").attr('href','fiche.php?ZeId='+ZeVal);
                $("#various3").trigger("click");
                }
</script>
</head>
        <body>
                <?php
                        include('connexion_bdd.php');

                        function VerifSit($Val) {
                                        if (strstr ($Val, "NON")) {
                                                        return "<font color=\"red\"><b>".$Val."</b></font>";
                                        } else {
                                                        return $Val;
                                        }
                                }

                        function MultChr($a, $b) {
                                $c = 0;
                                $d = "";
                                while ($c < $b) {
                                                $d = $d.$a;
                                                $c = $c + 1;
                                        }
                                return $d;
                                }

                        function CompDate($DateFin,$Col) {
                                $datejour = date('d/m/Y');
                                $datefin= $DateFin;
                                $dfin = explode("/", $datefin);
                                $djour = explode("/", $datejour);
                                $finab = $dfin[2].$dfin[1].$dfin[0];
                                $auj = $djour[2].$djour[1].$djour[0];
                                 if ($auj>$finab) {
                                                //Hors Carence
                                                return $Col;
                                        }
                                        else
                                        {
                                                //Dans la carence => Couleur Orange
                                                return "<td style=\"background-color: #e89f57; color:#ffffff\"><FONT SIZE=\"2\"><font face=\"Arial\">";
                                        }
                                 }

                                function AffDate($val) {
                                        //Lien invisible pour l'affichage des pop-up
                                        echo "<a id=\"various3\" href=\"detail.html\" style=\"display:none\"></a>";
                                        //Affiche une Date en format FRANCAIS (DD/MM/YYYY)
                                        $val = explode("-",$val);
                                        $val = $val[2]."/".$val[1]."/".$val[0];
                                        return $val;
                                        }
                                        function VerifRapt($valX) {
                                                // Retourne une image en fonction de la valeur de RAPATRIEMENT
                                                $ZeImg = "";
                                                if (strstr($valX, "REUNION")) {
                                                    $ZeImg = "<img src=\"images/run.png\" title='CONTRAT REUNION'>";
                                                }
                                                if (strstr($valX, "METROPOLE")) {
                                                    $ZeImg = "<img src=\"images/plane.png\" title='RAPATREMENT - CONTRAT METROPOLE'>";
                                                }
                                                return $ZeImg;
                                            }
                                            
                   //Affichage du TAbleaux
                                if (isset($_POST["valide"]))  {
                                        echo "<p>Recherche de la valeur : ".strtoupper($_POST["val_search"])." dans le champ : ".$_POST["lst_search"];
                                        if (strcasecmp ( $_POST["opt_search"] , "ext" )==0) {
                                                $Search = $_POST["lst_search"]." = '".strtoupper($_POST["val_search"])."'";
                                   }
                                        if (strcasecmp ( $_POST["opt_search"] , "fin" )==0) {
                                                $Search = $_POST["lst_search"]." LIKE '%".strtoupper($_POST["val_search"])."'";
                                   }
                                        if (strcasecmp ( $_POST["opt_search"] , "cont" )==0) {
                                                $Search = $_POST["lst_search"]." LIKE '%".strtoupper($_POST["val_search"])."%'";
                                   }
                                        if (strcasecmp ( $_POST["opt_search"] , "com" )==0) {
                                                $Search = $_POST["lst_search"]." LIKE '".strtoupper($_POST["val_search"])."%'";
                                   }
                                        if (strcasecmp ( $_POST["val_search2"] , "" )==0) {
                                                $Search2 = "";
                                                echo "</p>";
                                        }

                                        else {
                                                echo    " et de la valeur :<i> ".strtoupper($_POST["val_search2"])."</i> Dans le Champ <i>".$_POST["lst_search2"]."</i>";
                                                if (strcasecmp ( $_POST["opt_search2"] , "ext" )==0) {
                                                        $Search2 = " AND ".$_POST["lst_search2"]." = '".strtoupper($_POST["val_search2"])."'";
                                                }
                                                if (strcasecmp ( $_POST["opt_search2"] , "fin" )==0) {
                                                        $Search2 = " AND ".$_POST["lst_search2"]." LIKE '%".strtoupper($_POST["val_search2"])."'";
                                                }
                                                if (strcasecmp ( $_POST["opt_search2"] , "cont" )==0) {
                                                        $Search2 =" AND ".$_POST["lst_search2"]." LIKE '%".strtoupper($_POST["val_search2"])."%'";
                                                }
                                                if (strcasecmp ( $_POST["opt_search2"] , "com" )==0) {
                                                        $Search2 =" AND ".$_POST["lst_search2"]." LIKE '".strtoupper($_POST["val_search2"])."%'";
                                                }
                                        }

                                        // if (strcasecmp ( $_POST["val_search3"] , "" )==0) {
                                        //         $Search3 = "";
                                        //         echo "</p>";
                                        // }

                                        // else {
                                        //         echo    " et de la valeur :<i> ".strtoupper($_POST["val_search3"])."</i> Dans le Champ <i>".$_POST["lst_search3"]."</i></p>";
                                        //         if (strcasecmp ( $_POST["opt_search3"] , "ext" )==0) {
                                        //                 $Search3 = " AND ".$_POST["lst_search3"]." = '".strtoupper($_POST["val_search3"])."'";
                                        //         }
                                        //         if (strcasecmp ( $_POST["opt_search3"] , "fin" )==0) {
                                        //                 $Search3 = " AND ".$_POST["lst_search3"]." LIKE '%".strtoupper($_POST["val_search3"])."'";
                                        //         }
                                        //         if (strcasecmp ( $_POST["opt_search3"] , "cont" )==0) {
                                        //                 $Search3 =" AND ".$_POST["lst_search3"]." LIKE '%".strtoupper($_POST["val_search3"])."%'";
                                        //         }
                                        //         if (strcasecmp ( $_POST["opt_search3"] , "com" )==0) {
                                        //                 $Search3 =" AND ".$_POST["lst_search3"]." LIKE '".strtoupper($_POST["val_search3"])."%'";
                                        //         }
                                        // }

                                        echo "<TABLE class=\"legende\">";
                                        echo "<TR><TH colspan=\"2\">LEGENDE :</TH></TR>";
                                   echo "<TR><TD class=\"car\">CARENCE NON TERMINEE</TD>";
                                   echo "<TD class=\"cot\">COTISATION NON A JOUR</TD></TR>";
                                   echo "</TABLE>";


                                   $sql = "SELECT SUM(1) FROM lst_file_obsq WHERE file_name='".$_POST["lst_file"]."' AND ".$Search.$Search2;
                                   $Req = $dbh->query($sql) or die(print_r($dbh->errorInfo()));
                                   $data = $Req->fetch();
                                   if ($data["SUM(1)"] > 0) {
                                                if ($data["SUM(1)"] < 3000) {
                                                   echo "<font face=\"Arial\">Nombre de valeurs trouvées : ".$data["SUM(1)"];
                                                   $Col01= "<th></th>" ;
                                                   $Col02= "<th></th>" ;
                                                   $Col03= "<th>NOM</th>" ;
                                                   $Col04= "<th>PRENOM</th>" ;
                                                   $Col05= "<th>CONTRAT</th>" ;
                                                   $Col05x= "<th>RAPATREMENT</th>" ;
                                                   $Col06= "<th>OPTION</th>" ;
                                                   /*$Col07= "<th>NUM_CONTRAT</th>" ;*/
                                                   $Col08= "<th>CATEGORIE</th>" ;
                                                   $Col09= "<th>DATE DE NAISSANCE</th>" ;
                                                   $Col10= "<th>INSEE</th>" ;
                                                   /*$Col11= "<th>ADRESSE</th>" ;
                                                   $Col12= "<th>CODE POSTAL</th>" ;
                                                   $Col13= "<th>VILLE</th>" ;*/
                                                   $Col14= "<th>SITUATION</th>" ;
                                                   $Col15= "<th>DATE INSCRIPTION</th>" ;
                                                   $Col16= "<th>DATE EFFET</th>" ;
                                                   $Col17= "<th>CARENCE</th>" ;
                                                   echo    "<p class='obligatoire'>Cliquez sur l'icône <img src= \"images/user4.png\" style='width:3%'> pour afficher les détails</p><div id=\"scrollbar\" >".
                                                                                "<table><thead>".$Col02.$Col03.$Col04. $Col06.$Col05./*$Col07.*/$Col08.$Col09.$Col10./*$Col11.$Col12.$Col13.*/$Col14.$Col15.$Col16.$Col17."</thead><tr>";
                                                   $sql = "SELECT * FROM lst_file_obsq WHERE file_name='".$_POST["lst_file"]."' AND ".$Search.$Search2;
                                                   //echo $sql;
                                                   $Req = $dbh->query($sql) or die(print_r($dbh->errorInfo()));
                                                   $Pairr = 1;
                                                   while($data2 = $Req->fetch()){
                                                          if (($Pairr % 2) == 0) {
                                                                 $Col = "<td class=\"color\">" ;
                                                         } else {
                                                                 $Col = "<td>" ;
                                                         }
                                                         echo "</td>".CompDate(AffDate($data2["EFFET"]),$Col)."<a href=\"javascript:toto(this,'".$data2["id"]."');\" style=\"color:couleur1; text-decoration:none\"  alt=\"detail\" style=\"border:none;padding-right:3px;padding-left:3px\" /><img src=\"images/user4.png\" style='width:100%'></a>".
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["NOM"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["PRENOM"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).VerifRapt($data2["RAPATREMENT"])."".$data2["CONTRAT"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["ENTREPRISE"].
                                                                 /* "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["NUM_CONTRAT"].*/
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["CATEGORIE"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["DATE_2_NAISSANCE"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["INSEE"].
                                                                  /*"</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["ADRS"].
                                                                 "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["CODE_POSTAL"].
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["VILLE"].*/
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).VerifSit($data2["SITUATION"]).
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).AffDate($data2["INSCRIPTION"]).
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).AffDate($data2["EFFET"]).
                                                                  "</td>".CompDate(AffDate($data2["EFFET"]),$Col).$data2["CARENCE"].
                                                                  "</td><tr>";
                                                          $Pairr =  $Pairr + 1;
                                                        }
                                                        echo "</table></div></br>";
                                                }

                                                else {
                                                        echo "<p class=\"obligatoire\">Trop de Valeurs pouvant correspondre a votre recherche, <br/>veuillez recommencer en affinnant vos crières.</p>";
                                                }
                                   }

                                   else {
                                           echo "<i>Aucune Valeur Correspondante dans ce Champ.</i></br>";
                                   }
                                   echo "<TABLE class=\"return\">";
                                   echo "<TR><TD><a href=\"tbord.php\">Executer une autre recherche</a></TD></TR>";
                                   echo "</TABLE>";

                                   $dbh=null;
                                }
                ?>
        </body>
</html>