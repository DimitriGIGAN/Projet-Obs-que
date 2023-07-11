<?php
   //***************************************************************************\\
   //*                WebApplication : Obsq                                    *\\                                                                                       *\\
   //*                    Version    :  1.0.0                                  *\\
         
   //*              Date de Création : 08/08/2012                             *\\
   //***************************************************************************\\
   //*                      Module   : fiche.php                               *\\
   //*        Modification du Module : 17/10/2012                              *\\
   //*                   Réalisé par : Fabrice MAILLOT                       *\\
   //*                                                                         *\\
                      
   //***************************************************************************\\

   //initialisation de la session PHP
   session_start();
?>

<!DOCTYPE html>
<html lang="fr-FR">

    <head>
      <meta charset="UTF-8" />
          <link rel="stylesheet" type="text/css" href="obsq.css" />
    </head>

          <body>
              <?php
                 function AffDate($val) {
                        //Lien invisible pour l'affichage des pop-up
                        echo "<a id=\"various3\" href=\"test.html\"></a>";
                    //Affiche une Date en format FRANCAIS (DD/MM/YYYY)
                    $val = explode("-",$val);
                    $val = $val[2]."/".$val[1]."/".$val[0];
                    return $val;
                    }

                                function VerifRapt($valX) {
                                        //Retourne une image en fonction de la valeur de RAPATRIEMENT
                                        if( strstr($valX, "REUNION")) {
                                                $ZeImg = "<img src=\"images/run.png\">";
                                        }
                                        if( strstr($valX, "METROPOLE")) {
                                                $ZeImg = "<img src=\"images/plane.png\">";
                                        }
                                        return $ZeImg;
                                }

            function CompDate($DateFin) {
                $datejour = date('d/m/Y');
                $datefin= $DateFin;
                $dfin = explode("/", $datefin);
                $djour = explode("/", $datejour);
                $finab = $dfin[2].$dfin[1].$dfin[0];
                $auj = $djour[2].$djour[1].$djour[0];
                if ($auj>$finab) {
                                        //Hors Carence
                                        return "<td>";
                                }
                                else{
                                        //Dans la carence => Couleur Orange
                                        return "<td class=\"car\">";
                                }
                        }

            function VerifSit($Val) {
                                if (strstr ($Val, "NON")) {
                                                return "<td class=\"sit_no\">";

                                } else {
                                                return "<td class=\"sit_ok\">";

                                }
                        }

                        if ( isset($_GET["ZeId"]) ) {
                                //Connexion a la Base
                                include('connexion_bdd.php');
                                //y récupérer les informations lié à l'ADH
                                $Sql = "SELECT * FROM lst_file_obsq WHERE id='".$_GET["ZeId"]."' ";
                                //echo $Sql;
                                $req = $dbh->query($Sql) or die(print_r($dbh->errorInfo()));
                                $data = $req->fetch();
                                #$data = $data[0];


                                /*if(strstr($data['SITUATION'], "NON")){
                                        $Ajour = false;
                                }
                                else{
                                        $Ajour = true;
                                }*/


                                $val = explode("-",$data["EFFET"]);
                $val = $val[2]."/".$val[1]."/".$val[0];
                                $datejour_c = date('d/m/Y');
                                $datefin_c = $val;
                                $dfin_c = explode("/", $datefin_c);
                                $djour_c = explode("/", $datejour_c);
                                $finab_c = $dfin_c[2].$dfin_c[1].$dfin_c[0];
                                $auj_c = $djour_c[2].$djour_c[1].$djour_c[0];
                                if ($auj_c>$finab_c) {
                                        //Hors Carence
                                        $carence = false;
                                }
                                else{
                                        //Dans la carence
                                        $carence = true;
                                }



                                //Adaptation de l'affichage pour les enfants
                                $display_doc = "";
                                $titleDoc = "";
                                $ZeImg ="";
                                $val_enfant = "";
                                $Adh = "Adhérent";
                                $style = "";
                                $enf_afp = false;
                                $annee_naissance = date('Y', strtotime(str_replace('/','-',$data["DATE_2_NAISSANCE"])));
                                if($annee_naissance >= date('Y', strtotime('-12 years'))){

                                        $val_enfant = "<img src=\"images/no.png\"> Enfant de moins de 12 ans";
                                        //Si c'est un enfant AFP, on ne prend pas en charge

                                        $display_doc = false;
                                        if(preg_match('/ AFP/i', $data["ENTREPRISE"])){
                                                $val_enfant = "<img src=\"images/no.png\"> Non pris en charge";
                                                $enf_afp = true;
                                        }
                                        else if(preg_match('/ 3 BASSIN/i', $data["ENTREPRISE"])){
                                                $display_doc = true;
                                                $doc = 'Courrier_demande_aide_3B.doc';
                                        }
                                        else if(preg_match('/ MUTEP/i', $data["ENTREPRISE"])){
                                                $doc = 'Courrier_demande_aide_MUTEP.doc';
                                                $display_doc = true;
                                        }
                                        else if(preg_match('/MRO/i', $data["ENTREPRISE"])){
                                                $doc = 'Courrier_demande_aide_MRO.doc';
                                                $display_doc = true;
                                        }
                                        $Adh = "Bénéficiaire ";
                                        $style = "border:1px solid #ce6d00;background:#fff0df;";
                                }

                                if( strstr($data["RAPATREMENT"], "REUNION")) {
                                        $ZeImg = "<img src=\"images/run.png\">";
                                        $titleDoc = 'Contrat Résident Réunion';
                                }
                                elseif( strstr($data["RAPATREMENT"], "METROPOLE")) {
                                        $ZeImg = "<img src=\"images/plane.png\">";
                                        $titleDoc = 'Contrat Décès Plus Rapatriement';
                                }

                                echo "<p>".$ZeImg." ".$titleDoc." - ".$data["ENTREPRISE"]."</p>";
                                echo "<fieldset><legend>Informations Personnelles</legend>";
                                echo "<form action=\"dc.php\" target=\"_blank\" method=\"post\">";
                                #variable hidden a envoyer pour firedc.php
                                echo "<input type=\"hidden\" name=\"nom_f\" value='".$data["NOM"]."' >";
                                echo "<input type=\"hidden\" name=\"prenom_f\" value='".$data["PRENOM"]."' >";
                                echo "<input type=\"hidden\" name=\"ddn_f\" value='".$data["DATE_2_NAISSANCE"]."' >";
                                echo "<input type=\"hidden\" name=\"cp_f\" value=".$data["CODE_POSTAL"]." >";
                                echo "<input type=\"hidden\" name=\"ville_f\" value='".$data["VILLE"]."' >";
                                echo "<input type=\"hidden\" name=\"ad_f\" value='".$data["ADRS"]."' >";
                                echo "<input type=\"hidden\" name=\"adh_f\" value=".$data["NUM_CONTRAT"]." >";
                                echo "<input type=\"hidden\" name=\"parno_f\" value=".$data["IDENTIFIANT"]." >";
                                echo "<input type=\"hidden\" name=\"dadh_f\" value='".AffDate($data["INSCRIPTION"])."' >";
                                echo "<input type=\"hidden\" name=\"ddb_f\" value='".AffDate($data["EFFET"])."' >";
                                echo "<input type=\"hidden\" name=\"ss_f\" value='".$data["INSEE"]."' >";
                                echo "<input type=\"hidden\" name=\"ent_f\" value='".$data["ENTREPRISE"]."' >";
                                echo "<input type=\"hidden\" name=\"car_f\" value='".$data["CARENCE"]."' >";
                                echo "<input type=\"hidden\" name=\"sit_f\" value='".$data["SITUATION"]."' >";
                                echo "<input type=\"hidden\" name=\"ctrt_f\" value='".$data["CONTRAT"]."' >";
                                #table fiche
                                echo "<table class=\"detail\">";
                                echo "<tr><th>".$Adh."</th><td>".$data["NOM"]." ".$data["PRENOM"]."</td></tr>";
                                echo "<tr><th>Identifiant</th><td>".$data["IDENTIFIANT"]."</td><tr>";
                                echo "<th>N° adhérent</th><td>".$data["NUM_CONTRAT"]."</td></tr>";
                                echo "<tr><th>Date de Naiss.</th><td>".$data["DATE_2_NAISSANCE"]."</td><td class=\"info\">" . $val_enfant . "</td></tr>";
                                //<!--<td><u>N° de S.S.</u> :</td><td>".$data["INSEE"]."</td>-->
                                echo "<tr><th>Adresse</th><td>".str_replace('#','<br/>',$data["ADRS"])."</td></tr>";
                                echo "<tr><th>Code Postal</th><td>".$data["CODE_POSTAL"]."</td></tr>";
                                echo "<tr><th>Ville</th><td>".$data["VILLE"]."</td></tr>";
                                echo "</table></fieldset>";

                                echo "<fieldset><legend>Contrat Obsèque</legend>";
                                echo "<table class=\"detail\">";
                                echo "<tr><td colspan=\"2\"><h2>".$data["ENTREPRISE"]."</h2></td></tr>";
                                echo "<tr><th>Option</th><td>".$data["CONTRAT"]."</td></tr>";
                                echo "<tr><th>Date d'adhésion</th><td>".AffDate($data["INSCRIPTION"])."</td></tr>";
                                echo "<tr><th>Date d'effet</th>".CompDate(AffDate($data["EFFET"])) . AffDate($data["EFFET"])."</td></tr>";
                                echo "<tr>".VerifSit($data["SITUATION"])."Situation : ".$data["SITUATION"]."</td>".CompDate(AffDate($data["EFFET"])) . $data["CARENCE"]."</td></tr>";

                                echo "</table>";

                                if($carence == true){
                                        echo"<div style='margin:auto;width:40%;font-size:14px;margin-top:10px;border:1px solid rgba(0,0,0,0.8);border-radius:10px'>
                                                <!--<p style='margin:5px 2px 0 2px;font-weight:bold;'>Date d'effet des garanties</p>
                                                <p style='margin:5px 2px 0 2px;'>En cas de décès par accident : la 31<sup>ème</sup> jour suivant la signature du bulletin d'adhésion sous réserve de l'acceptation de l'adhésion par l'UMS.</p>
                                                <p style='margin:5px 2px 0 2px;'>En cas de décès par maladie :</p>
                                                <ul style='width:590px;text-align:justify;margin:auto;margin-bottom:5px;'>
                                                        <li>Le 91<sup>ème</sup> jour suivant la signature du bulletin d'adhésion sous réserve de l'acceptation de l'adhésion par l'UMS pour les assurés âgés de moins de 65ans au jour de cette signature</li>
                                                        <li>Le 366<sup>ème</sup> jour suivant la signature du bulletin d'adhésion sous réserve de l'acceptation de l'adhésion par l'UMS pour les assurés de 65ans et plus au jour de cette signature</li>
                                                </ul>-->

                                                <p style='text-align:center;font-weight:bold'>Voir la notice d'information</p>

                                        </div>";
                                }
                                if($enf_afp == false){
                                        echo "<input type=\"submit\" value=\"REALISATION DE LA FICHE DE MISSIONNEMENT\" style='margin-top:10px;'/>";
                                }
                                if($display_doc){
                                        echo "<a style='text-decoration:none;margin:0 50px;text-transform:uppercase;' href='document/".$doc."' ><button type='button'>Courrier de demande d'aide</button></a>";
                                }
                                echo "</form></fieldset></font>";

                        }else {
                                session_destroy();
                                header('Location: error_log.php');
                        }


                          ?>

        </body>
</html>