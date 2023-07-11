<!DOCTYPE html>
<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" type="text/css" href="obsq.css" />
                <title>SEND.DC</title>
</head>

  <header>
    <a href='index.php'><img src='images/UMS1.png' alt='logo UMS'/></a>
                        <h1>FICHE DE RENSEIGNEMENT DECES PLUS</h1>
        </header>
        <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
        //Connexion à la base de donnée
        include_once('connexion_bdd.php');
        //controle si les champs du formulaire sont bien definis
        if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["ddn"]) && isset($_POST["cp"]) && isset($_POST["ville"]) && isset($_POST["ad"]) && isset($_POST["adh"]) && isset($_POST["dadh"]) && isset($_POST["ddb"]) && isset($_POST["adh"]))
                {
                        if (isset($_POST['emailList'])) {
                                $emailList = $_POST['emailList'];
                       
                            
        //recuperatioon des champs saisies du dc.php
                        $NOM = preg_replace('/[^A-Za-z0-9\-]/','',$_POST["nom"]);
                        $PRENOM = $_POST["prenom"];
                        $DDN = $_POST["ddn"];
                        $CP = $_POST["cp"];
                        $VILLE = $_POST["ville"];
                        $AD = $_POST["ad"];
                        $ADH = $_POST["adh"];
                        $PAR_NO = $_POST["parno"];
                        $DADH = $_POST["dadh"];
                        $DDB = $_POST["ddb"];
                        $DDC = $_POST["ddc"];
                        $DOM = $_POST["dom"];
                        $INST = $_POST["instal"];
                        $AD1 = $_POST["ad1"];
                        $AD2 = $_POST["ad2"];
                        $NPC = preg_replace('/[^A-Za-z0-9\-]/','',$_POST["nom_c"]);
                        $PPC = preg_replace('/[^A-Za-z0-9\-]/','',$_POST["prenom_c"]);
                        $TELC = preg_replace('/[^0-9]/', '',$_POST["tel"]);
                        $TELC2 = '';
                        if(isset($_POST["tel2"])){
                                $TELC2 = $_POST["tel2"];
                        }
                        $NOM_P = preg_replace('/[^A-Za-z0-9\-]/',' ',explode('#',$_POST["nom_p"])[1]);
                        $ADRESSE_P = preg_replace('/[^A-Za-z0-9\-]/',' ',$_POST["ville_p"]);
                        $HEURE_P = $_POST["heure_p"];
                        $SS1 = $_POST["ss1"];
                        $ENT = $_POST['ent'];
                        $CAR= $_POST['car'];
                        $SIT= $_POST['sit'];
                        $CTRT= $_POST['ctrt'];
                        $lien_defunt= $_POST['lien_defunt'];

                        if ($dbh)
                                {
                                echo "<div id=\"dc\">";
                                echo "<TABLE>";
                                echo "<TR>";
                                echo "<p>Votre demande a bien été envoyée au service prestations à l'adresse suivante : prestations@ums.re</p></TD>";
                                echo "<a href=index.php>Revenir a la recherche</a></TD>";
                                echo "</TR>";
                                echo "</TABLE>";
                                echo "</div>";
                                }
                        else
                                {
                                echo "<div id=\"dc\">";
                                echo "<TABLE>";
                                echo "<TR>";
                                echo "<TD><p>Echec de connexion - Veuillez contacter l'administrateur.</p></TD>";
                                echo "</TR>";
                                echo "</TABLE>";
                                echo "</div>";

                        }
                        $objet = "TEST";
                                $message = '<!DOCTYPE html>
                                <html lang="fr">
                                        <head>
                                                <meta charset="utf-8"/>
                                                <title>MAIL UMS FICHIER OBSEQUES</title>
                                        </head>';
        $message .= '<body style="margin-left: auto;margin-right: auto;margin-top: -10px;width: 996px;height:770px;background-color: white;-webkit-border-bottom-right-radius: 5px;-moz-border-radius-bottomright: 5px;border-bottom-right-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;border-bottom-left-radius: 5px;">
                                        <div id="header" style="background-color: #0034ee;color: white;font-size: 1,8em;padding-top: 10px;height: 50px;background-position: left;">
                                        <p style="text-align:center">UMS FICHIER OBSEQUES</p>
                                        </div>
                                        <div id="title" style="background-color: white;height: 40px;color: #0c55e8;">

                                        </div>
                                        <div id="content" style="font-family: arial;background-color: #d2d9d4;background-repeat: no-repeat;background_position: right;-webkit-border-top-left-radius: 15px;-moz-border-radius-topleft: 15px;border-top-left-radius: 15px;margin-top: 10px;margin-left: auto;margin-right: auto;padding-top: 20px;padding-left: auto;border: 2px solid #476fab;height: 100%;width: 100%;">
                                                <fieldset>
                                                        <legend align="top"> <h3>Informations personnelles</h3> </legend>
                                                                <table>
                                                                        <tr>
                                                                                <td>NUMERO ADHERENT : </td><td>' . $ADH . '</td>
                                                                        </tr>
                                                                        <!--<tr>
                                                                                <td>NUMERO SECURITE SOCIAL : </td><td>' . $SS1 . '</td>
                                                                        </tr>-->
                                                                        <tr>
                                                                                <td>DEFUNT : </td><td>' . $NOM . ' ' . $PRENOM . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>DATE DE NAISSANCE : </td><td>' . $DDN . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>DATE DE DECES : </td><td>' . $DDC . '</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>ADRESSE : </td><td>' . str_replace('#',' ',$AD) . ' ' . $CP . ' ' . $VILLE . '</td>
                                                                        </tr>

                                                                        <tr>
                                                                                <td>DATE D\'ADHESION :</td><td>' . $DADH . '</td>
                                                                        </tr>
                                                                </table>
                                                </fieldset>
                                                <fieldset>
                                                        <legend align="top"> <h3>Renseignement</h3> </legend>
                                                                <table>
                                                                        <TR>
                                                                                <TD colspan="4" style="padding-bottom:5px;font-weight:bold;text-align:center;">'.$ENT.'</TD>
                                                                        </TR>
                                                                        <TR>
                                                                                <TD>CARENCE :</TD><TD>'.$CAR.'</TD>
                                                                        </TR>
                                                                        <TR>
                                                                                <TD>SITUATION :</TD><TD>'.$SIT.'</TD>
                                                                        </TR>
                                                                        <TR>
                                                                                <TD>OPTION :</TD><TD>'.$CTRT.'</TD>
                                                                        </TR>
                                                                        <tr>';
                                                                                if ($DOM == 2)
                                                                                                        {
                                                                                                        $message .= '<td>LIEU OU SE TROUVE LE DEFUNT : </td><td>' . $AD1 . '</td></tr>';
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        $message .= '<td>LIEU OU SE TROUVE LE DEFUNT : </td><td>' . $DOM . '</td></tr>';
                                                                                                        }
                                                                                if ($INST == 2)
                                                                                                        {
                                                                                                        $message .= '<td>LIEU D\'INSTALLATION : </td><td>' . $AD2 . '</td>';
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                        $message .= '<td>LIEU D\'INSTALLATION : </td><td>' . $INST . '</td>';
                                                                                                        }
        $message .= '</table></fieldset>
                                <fieldset>
                                        <legend align="top"> <h3>Personne à contacter</h3> </legend>
                                        <table>
                                                <tr>
                                                        <td>NOM ET PRENOM : </td><td>'. $NPC . ' ' . $PPC . '</td>
                                                </tr>';
                                                if($lien_defunt != ''){
                                                        $message .= '<tr>
                                                                <td>LIEN AVEC LE DEFUNT : </td><td>'.$lien_defunt.'</td>
                                                        </tr>';
                                                }

                                                $message .= '<tr>
                                                        <td>TELEPHONE 1 : </td><td>' . $TELC . '</td>
                                                </tr>';
                                                if($TELC2 != ''){
                                                        $message .= '<tr>
                                                                <td>TELEPHONE 2 : </td><td></td>
                                                        </tr>';
                                                }

                                        $message .= '</table>
                                </fieldset>
                                <fieldset>
                                        <legend align="top"> <h3>Pompe funèbre missionnée</h3> </legend>
                                        <table>
                                                <tr>
                                                        <td>NOM : </td><td>'.$NOM_P.'</td>
                                                </tr>
                                                <tr>
                                                        <td>VILLE : </td><td>'.$ADRESSE_P.'</td>
                                                </tr>
                                                <tr>
                                                        <td>HEURE DE MISSIONNEMENT : </td><td>'.$HEURE_P.'</td>
                                                </tr>
                                        </table>
                                </fieldset>
                                </div></body></html>';

                        //On insère les informations du formulaire dans la table
                        $sql= "INSERT INTO dc (D_DC, LIEU_D, LIEU_D_P, LIEU_I, LIEU_I_P, NOM_PC, PRENOM_PC, TEL, TEL2, PAR_NO, NUM_ADH, NOM_ADH, PRENOM_ADH, PF) VALUES ('$DDC', '$DOM', '$AD1', '$INST', '$AD2', '$NPC', '$PPC', '$TELC','$TELC2', '$PAR_NO', '$ADH', '$NOM', '$PRENOM', '$NOM_P')";
                        $rqt = $dbh->query($sql) or die(print_r($dbh->errorInfo()));
 // Configuration de l'objet PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
try {
    $dest = $emailList.', '.explode('#',$_POST["nom_p"])[0];

// Crée une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

// Configuration du serveur SMTP
$mail->isSMTP();
$mail->Host = 'mail.zenserver.re';
$mail->SMTPAuth = true;
$mail->Username = 'mailtest@ums.re';
$mail->Password = 'mdp1mdp2+';
$mail->SMTPSecure = 'tls';
$mail->Port = 465;

// Configuration de l'expéditeur et du destinataire
$mail->setFrom('mailtest@ums.re', 'test');
$mail->addAddress($dest, 'test');

// Configuration du contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = $objet;
$mail->Body = utf8_decode($message);
$mail->AltBody = 'Contenu de l\'e-mail en texte brut';
echo "YO".$dest;

// Envoyer l'e-mail
        $mail->send();
    echo 'Votre message a bien été envoyé.';
}  catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
}
  }
                }
                        //envoi des données
                      
                 
                //         $expd = 'mailtest@ums.re';
                //         $mdp = 'mdp1mdp2+';
                //         $objet = 'FICHE RENSEIGNEMENT DECES ADHERENT - '.strtoupper($NOM).' - '.strtoupper($ADH);
                //         $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
                //         $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
                //         $headers .= 'From: "OBSEQUE"<'.$expd.'>'."\n"; // Expediteur
                //         $headers .= 'Delivered-to: '.$emails."\n"; // Destinataire
                //         $message = '<!DOCTYPE html>
                //                                 <html lang="fr">
                //                                         <head>
                //                                                 <meta charset="utf-8"/>
                //                                                 <title>MAIL UMS FICHIER OBSEQUES</title>
                //                                         </head>';
                //         $message .= '<body style="margin-left: auto;margin-right: auto;margin-top: -10px;width: 996px;height:770px;background-color: white;-webkit-border-bottom-right-radius: 5px;-moz-border-radius-bottomright: 5px;border-bottom-right-radius: 5px;-webkit-border-bottom-left-radius: 5px;-moz-border-radius-bottomleft: 5px;border-bottom-left-radius: 5px;">
                //                                         <div id="header" style="background-color: #0034ee;color: white;font-size: 1,8em;padding-top: 10px;height: 50px;background-position: left;">
                //                                         <p style="text-align:center">UMS FICHIER OBSEQUES</p>
                //                                         </div>
                //                                         <div id="title" style="background-color: white;height: 40px;color: #0c55e8;">

                //                                         </div>
                //                                         <div id="content" style="font-family: arial;background-color: #d2d9d4;background-repeat: no-repeat;background_position: right;-webkit-border-top-left-radius: 15px;-moz-border-radius-topleft: 15px;border-top-left-radius: 15px;margin-top: 10px;margin-left: auto;margin-right: auto;padding-top: 20px;padding-left: auto;border: 2px solid #476fab;height: 100%;width: 100%;">
                //                                                 <fieldset>
                //                                                         <legend align="top"> <h3>Informations personnelles</h3> </legend>
                //                                                                 <table>
                //                                                                         <tr>
                //                                                                                 <td>NUMERO ADHERENT : </td><td>' . $ADH . '</td>
                //                                                                         </tr>
                //                                                                         <!--<tr>
                //                                                                                 <td>NUMERO SECURITE SOCIAL : </td><td>' . $SS1 . '</td>
                //                                                                         </tr>-->
                //                                                                         <tr>
                //                                                                                 <td>DEFUNT : </td><td>' . $NOM . ' ' . $PRENOM . '</td>
                //                                                                         </tr>
                //                                                                         <tr>
                //                                                                                 <td>DATE DE NAISSANCE : </td><td>' . $DDN . '</td>
                //                                                                         </tr>
                //                                                                         <tr>
                //                                                                                 <td>DATE DE DECES : </td><td>' . $DDC . '</td>
                //                                                                         </tr>
                //                                                                         <tr>
                //                                                                                 <td>ADRESSE : </td><td>' . str_replace('#',' ',$AD) . ' ' . $CP . ' ' . $VILLE . '</td>
                //                                                                         </tr>

                //                                                                         <tr>
                //                                                                                 <td>DATE D\'ADHESION :</td><td>' . $DADH . '</td>
                //                                                                         </tr>
                //                                                                 </table>
                //                                                 </fieldset>
                //                                                 <fieldset>
                //                                                         <legend align="top"> <h3>Renseignement</h3> </legend>
                //                                                                 <table>
                //                                                                         <TR>
                //                                                                                 <TD colspan="4" style="padding-bottom:5px;font-weight:bold;text-align:center;">'.$ENT.'</TD>
                //                                                                         </TR>
                //                                                                         <TR>
                //                                                                                 <TD>CARENCE :</TD><TD>'.$CAR.'</TD>
                //                                                                         </TR>
                //                                                                         <TR>
                //                                                                                 <TD>SITUATION :</TD><TD>'.$SIT.'</TD>
                //                                                                         </TR>
                //                                                                         <TR>
                //                                                                                 <TD>OPTION :</TD><TD>'.$CTRT.'</TD>
                //                                                                         </TR>
                //                                                                         <tr>';
                //                                                                                 if ($DOM == 2)
                //                                                                                                         {
                //                                                                                                         $message .= '<td>LIEU OU SE TROUVE LE DEFUNT : </td><td>' . $AD1 . '</td></tr>';
                //                                                                                                         }
                //                                                                                                         else
                //                                                                                                         {
                //                                                                                                         $message .= '<td>LIEU OU SE TROUVE LE DEFUNT : </td><td>' . $DOM . '</td></tr>';
                //                                                                                                         }
                //                                                                                 if ($INST == 2)
                //                                                                                                         {
                //                                                                                                         $message .= '<td>LIEU D\'INSTALLATION : </td><td>' . $AD2 . '</td>';
                //                                                                                                         }
                //                                                                                                         else
                //                                                                                                         {
                //                                                                                                         $message .= '<td>LIEU D\'INSTALLATION : </td><td>' . $INST . '</td>';
                //                                                                                                         }
                //         $message .= '</table></fieldset>
                //                                 <fieldset>
                //                                         <legend align="top"> <h3>Personne à contacter</h3> </legend>
                //                                         <table>
                //                                                 <tr>
                //                                                         <td>NOM ET PRENOM : </td><td>'. $NPC . ' ' . $PPC . '</td>
                //                                                 </tr>';
                //                                                 if($lien_defunt != ''){
                //                                                         $message .= '<tr>
                //                                                                 <td>LIEN AVEC LE DEFUNT : </td><td>'.$lien_defunt.'</td>
                //                                                         </tr>';
                //                                                 }

                //                                                 $message .= '<tr>
                //                                                         <td>TELEPHONE 1 : </td><td>' . $TELC . '</td>
                //                                                 </tr>';
                //                                                 if($TELC2 != ''){
                //                                                         $message .= '<tr>
                //                                                                 <td>TELEPHONE 2 : </td><td></td>
                //                                                         </tr>';
                //                                                 }

                //                                         $message .= '</table>
                //                                 </fieldset>
                //                                 <fieldset>
                //                                         <legend align="top"> <h3>Pompe funèbre missionnée</h3> </legend>
                //                                         <table>
                //                                                 <tr>
                //                                                         <td>NOM : </td><td>'.$NOM_P.'</td>
                //                                                 </tr>
                //                                                 <tr>
                //                                                         <td>VILLE : </td><td>'.$ADRESSE_P.'</td>
                //                                                 </tr>
                //                                                 <tr>
                //                                                         <td>HEURE DE MISSIONNEMENT : </td><td>'.$HEURE_P.'</td>
                //                                                 </tr>
                //                                         </table>
                //                                 </fieldset>
                //                                 </div></body></html>';
                                               

                //         if (mail($dest,$objet, utf8_decode($message), $headers)) // Envoi du message
                //         {
                //                 echo 'Votre message a bien été envoyé ';
                //         }
                //         else // Non envoyé
                //         {
                //                 echo "Votre message n'a pas pu être envoyé";
                //         }
                // }
          
?>

<body>
</body>

</html>