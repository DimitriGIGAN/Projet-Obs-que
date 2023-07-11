<?php
   //***************************************************************************\\
   //*                WebApplication : Obsq                                    *\\

   //*                    Version    :  1.0.0                                  *\\ 

   //*              Date de Création : 08/08/2012                              *\\
   //***************************************************************************\\
   //*                      Module   : dc.php                                  *\\ 

   //*        Modification du Module : 31/01/2014                              *\\
   //*                   Réalisé par : Christophe IROUVA                       *\\
   //*                                                                         *\\ 
   //***************************************************************************\\ 

   //initialisation de la session PHP
   session_start();
?>
<!DOCTYPE html>
<head>
                <meta charset="utf-8" />
                <link rel="stylesheet" type="text/css" href="obsq.css" />
                <title>FIRE.DC</title>
                <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
                <script language= "javascript">
$mails = array();
                $(document).ready(function() {
                        $('input, select').click(function(){
                                if($(this).hasClass('error')){
                                        $(this).removeClass('error');
                                }
                        });
                        $('#valid_dc').click(function(e){
                                //on stop la soumission du formulaire pour vérifier les champs
                                e.preventDefault();
                                msg = '';
                                var ok = true;
                                //On vérifie les informations du champ date
                                var date_dc = $('input[name=ddc]').val();
                                //Si le champ date est vide
                                if(date_dc == ''){
                                        msg = msg.concat('      - Date de deces vide \n');
                                        $('input[name=ddc]').addClass('error');
                                        ok = false;
                                }
                                //si le champs date contient des séparateurs
                                else if(date_dc.indexOf('/') > 0){

                                        var res = date_dc.split('/');
                                        //si ce ne sont pas des chiffre qui ont été saisies
                                        if(isNaN(parseInt(res[0])) || isNaN(parseInt(res[1])) || isNaN(parseInt(res[2]))){
                                                msg = msg.concat('      - Date de deces incorrect\n');
                                                ok = false;
                                                $('input[name=ddc]').addClass('error');
                                        }
                                        //si les dates sont cohérentes
                                        else{
                                                var jour = parseInt(res[0]);
                                                var mois = parseInt(res[1]);
                                                var annee = parseInt(res[2]);
                                                if(res[0].length>2){
                                                        msg = msg.concat('      - Date de deces incorrect\n');
                                                        ok = false;
                                                        $('input[name=ddc]').addClass('error');
                                                }
                                                else if(res[1].length>2){
                                                        msg = msg.concat('      - Date de deces incorrect\n');
                                                        ok = false;
                                                        $('input[name=ddc]').addClass('error');
                                                }
                                                else if(res[2].length != 4){
                                                        msg = msg.concat('      - Date de deces incorrect\n');
                                                        ok = false;
                                                        $('input[name=ddc]').addClass('error');
                                                }
                                                else if(jour>31 || jour<1 || mois>12 || mois<1 || annee>(new Date).getFullYear() ){
                                                        msg = msg.concat('      - Date de deces incorrect\n');
                                                        ok = false;
                                                        $('input[name=ddc]').addClass('error');
                                                }

                                        }
                                }
                                //sinon...
                                else{
                                        msg = msg.concat('      - Date de deces incorrect\n');
                                        ok = false;
                                        $('input[name=ddc]').addClass('error');
                                }
                                //si les champs sont vides
                                if($('input[name=nom_c]').val()==''){
                                        msg = msg.concat('      - Nom de la personne à contacter est vide \n');
                                        ok = false;
                                        $('input[name=nom_c]').addClass('error');
                                }
                                if($('input[name=prenom_c]').val()==''){
                                        msg = msg.concat('      - Prénom de la personne à contacter est vide \n');
                                        ok = false;
                                        $('input[name=prenom_c]').addClass('error');
                                }
                                if($('select[name=lien_defunt]').val()==''){
                                        msg = msg.concat('      - Lien avec le défunt est non renseigné \n');
                                        ok = false;
                                        $('select[name=lien_defunt]').addClass('error');
                                }
                                if($('input[name=nom_p]').val()==''){
                                        msg = msg.concat('      - Nom de la pompe funèbre est vide \n');
                                        ok = false;
                                        $('input[name=nom_p]').addClass('error');
                                }
                                if($('input[name=ville_p]').val()==''){
                                        msg = msg.concat('      - Ville de la pompe funèbre est vide \n');
                                        ok = false;
                                        $('input[name=ville_p]').addClass('error');
                                }
                                if($('input[name=heure_p]').val()==''){
                                        msg = msg.concat('      - Heure de missionnement est vide \n');
                                        ok = false;
                                        $('input[name=heure_p]').addClass('error');
                                }

                                if($('input[name=tel]').val() == ''){
                                        msg = msg.concat('      - Numéro de téléphone 1 est vide \n');
                                        ok = false;
                                        $('input[name=tel]').addClass('error');
                                }

                                else if(parseInt(($('input[name=tel]').val()).replace(/[^0-9]/g, '').length) != 10){
                                        msg = msg.concat('      - Numéro de téléphone 1 doit composer 10 chiffres\n');
                                        ok = false;
                                        $('input[name=tel]').addClass('error');
                                }
                                if($('input[name=tel2]').val() != ''){
                                        if(isNaN(parseInt($('input[name=tel2]').val()))){
                                                msg = msg.concat('      - Numéro de téléphone 2 est incorrect \n');
                                                ok = false;
                                                $('input[name=tel2]').addClass('error');
                                        }
                                        else if(parseInt($('input[name=tel2]').val().length) != 10){
                                                msg = msg.concat('      - Numéro de téléphone 2 doit composer 10 chiffres\n');
                                                ok = false;
                                                $('input[name=tel2]').addClass('error');
                                        }
                                }
                                //si un problème a été rencontré on affiche le message d'erreur
                                if(ok==false){
                                        alert('Erreur dans le(s) champ(s) suivant(s) :\n'+ msg);
                                }
                                //sinon on envoie le formulaire
                                else{
                                        $('form[name=maildc]').submit();
                                }
                        });

                        $("#ad1").hide();

                        $("#dom").change(function() {

                                if ( $("#dom").val() == "2"){

                                        $("#ad1").show();

                                }

                                else{

                                        $("#ad1").hide();

                                }

                        });

                        if ( $("#dom").val() == "2"){

                                $("#ad").show();

                        }

                        $("#ad1").change(function() {

                                var val = $("#ad1").val();

                                $("#dom").append(val + "\n");

                        });


                        $("#ad2").hide();

                        $("#instal").change(function() {
                                if ( $("#instal").val() == "2"){
                                        $("#ad2").show();
                                }
                                else{
                                        $("#ad2").hide();

                        }

                        });

                        if ( $("#instal").val() == "2"){

                                $("#ad2").show();

                        }

                        $("#ad2").change(function() {

                                var val = $("#ad2").val();

                                $("#instal").append(val + "\n");

                        });

                });

                </script>

</head>

<body>
        <header>
        <img class='img_ss_lien' src='images/UMS1.png' alt="logo de l'UMS">
     <h1>FICHE DE MISSIONNEMENT DECES PLUS</h1>
        <br>
        </header>
        <div id="dc">
                <div id="date">
                Date : <?php echo date("d/m/Y")?> Heure : <?php echo date("H:i") ?>
                </div>
                <form method="post"  action="cible.php" name="maildc">
                        <fieldset>
                         <LEGEND align=top> <h3>Informations personnelles</h3> </LEGEND>
                                <TABLE class="detail">
                                        <?php
                                        //on récupère les valeurs du formulaire fiche.php
                                                $NOM1 = $_POST['nom_f'];
                                                $PRENOM1 = $_POST['prenom_f'];
                                                $DDN1 = $_POST['ddn_f'];
                                                $CP1 = $_POST['cp_f'];
                                                $VILLE1 = $_POST['ville_f'];
                                                $AD1 = str_replace('#',' ',$_POST['ad_f']);
                                                $ADH1 = $_POST['adh_f'];
                                                $P_NO1 = $_POST['parno_f'];
                                                $DADH1 = $_POST['dadh_f'];
                                                $DDB1 = $_POST['ddb_f'];
                                                $SS1 = $_POST['ss_f'];
                                                $ENT = $_POST['ent_f'];
                                                $CAR= $_POST['car_f'];
                                                $SIT= $_POST['sit_f'];
                                                $CTRT= $_POST['ctrt_f'];


                                        //table pre-rempli
                                        echo "<table>"; // Début de la table

                                        echo "<tr>";
                                        echo "<th>N° ADHERENT</th><td>" . $ADH1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>NUMÉRO SÉCURITÉ SOCIALE</th><td>" . $SS1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>NOM</th><td>" . $NOM1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>PRENOM</th><td>" . $PRENOM1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>DATE DE NAISSANCE</th><td>" . $DDN1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>ADRESSE</th><td>" . $AD1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>VILLE</th><td>" . $VILLE1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "<tr>";
                                        echo "<th>CODE POSTAL</th><td>" . $CP1 . "</td>";
                                        echo "</tr>";
                                        
                                        echo "</table>"; // Fin de la table



                                        //input hidden a envoyer pour cible.php
                                                echo "<input type=\"hidden\" name=\"nom\" value='" .$NOM1. "' >";
                                                echo "<input type=\"hidden\" name=\"prenom\" value='" .$PRENOM1. "' >";
                                                echo "<input type=\"hidden\" name=\"ddn\" value='" .$DDN1. "' >";
                                                echo "<input type=\"hidden\" name=\"cp\" value='" .$CP1. "' >";
                                                echo "<input type=\"hidden\" name=\"ville\" value='" .$VILLE1. "' >";
                                                echo "<input type=\"hidden\" name=\"ad\" value='" .$AD1. "' >";
                                                echo "<input type=\"hidden\" name=\"adh\" value='" .$ADH1. "' >";
                                                echo "<input type=\"hidden\" name=\"parno\" value='" .$P_NO1. "' >";
                                                echo "<input type=\"hidden\" name=\"dadh\" value='" .$DADH1. "' >";
                                                echo "<input type=\"hidden\" name=\"ddb\" value='" .$DDB1. "' >";
                                                echo "<input type=\"hidden\" name=\"ss1\" value='" .$SS1. "' >";
                                                echo "<input type=\"hidden\" name=\"ent\" value='" .$ENT. "' >";
                                                echo "<input type=\"hidden\" name=\"car\" value='" .$CAR. "' >";
                                                echo "<input type=\"hidden\" name=\"sit\" value='" .$SIT. "' >";
                                                echo "<input type=\"hidden\" name=\"ctrt\" value='" .$CTRT. "' >";
                                        ?>
                                </TABLE>

                        </fieldset>

                        <fieldset>
                         <LEGEND> <h3>Renseignements décès</h3></LEGEND>
                                 <TABLE class="detail">
                                   <TR>
                                        <TH>ENTREPRISE</TH><TD><?php echo $ENT; ?></TD>
                   </TR>
                                   <TR>
                                        <TH>CARENCE</TH><TD><?php echo $CAR; ?></TD>
                   </TR>
                                   <TR>
                                        <TH>SITUATION</TH><TD><?php echo $SIT; ?></TD>
                                        </TR>
                                        <TR>
                                        <TH>OPTION</TH><TD><?php echo $CTRT; ?></TD>
                   </TR>
                                   <TR>
                                   <TH>DATE D'ADHESION</TH><TD><?php echo $DADH1; ?></TD>
                                   </TR>
                                   <TR>
                                   <TH>DATE D'EFFET DU CONTRAT</TH><TD><?php echo $DDB1; ?></TD>
                                   </TR>
                   <TR>
                                        <TH>DATE DE DECES (jj/mm/aaaa)<span style='color:red'> * </span></TH><TD><input type="text" name="ddc" size="21px" /></TD>
                   </TR>
                                   <TR>
                                        <TH>LIEU OU SE TROUVE LE DEFUNT</TH><TD><SELECT id="dom" name="dom" size="1" style='width:153px'>
                                                                <OPTION value="DOMICILE">DOMICILE
                                                                <OPTION value="2">AUTRE (PRECISER)
                                                        </SELECT>
                                                <BR/>
                                                <TEXTAREA id="ad1" name="ad1"></TEXTAREA></TD>
                   </TR>
                                   <TR>
                                        <TH>LIEU DE L'INSTALLATION</TH><TD><SELECT id="instal" name="instal" size="1"  style='width:153px'>

                                                <OPTION value="DOMICILE">DOMICILE

                                                <OPTION value="2">AUTRE (PRECISER)

                                        </SELECT>

                                </BR>

                                <TEXTAREA id="ad2" name="ad2"></TEXTAREA></TD>
                   </TR>
                                </TABLE>
                        </fieldset>
                        <fieldset>
                                 <LEGEND align=top> <h3>Personne à contacter</h3> </LEGEND>
                                        <TABLE class="detail">
                                           <TR>
                                                   <TH>NOM <span> * </span></TH><TD><input type="text" name="nom_c" size="30px"  /></TD>
                                           </TR>
                                           <TR>
                                                   <TH>PRENOM <span> * </span></TH><TD><input type="text" name="prenom_c" size="30px"  /></TD>
                                           </TR>
                                           <TR>
                                                        <TH>
                                                                <label>LIEN AVEC LE DEFUNT <span> * </span></label>
                                                        </TH>
                                                        <TD>
                                                        <select name='lien_defunt'  style='width:203px;font-weight:bold' >
                                                                <option value='' disabled selected>Sélectionner un élément</option>
                                                                <option value='famille'>FAMILLE</option>
                                                                <option value='autre'>AUTRE</option>
                                                        </select>
                                                        </TD>
                                           </TR>
                                           <TR>
                                                  <TH>TELEPHONE 1<span> * </span></TH><TD><input type="tel" name="tel" size="30px"  /></TD>
                                           </TR>
                                                <TR>
                                                  <TH>TELEPHONE 2</TH><TD><input type="tel" name="tel2" size="30px" /></TD>
                                           </TR>
                                  </TABLE>
                         </fieldset>

                         <fieldset>
                                <legend><h3>Pompe funèbre missionnée</h3></legend>

                                <table class="detail">
                                        <TR>
                                           <!--<TD>NOM <span style='color:red'> * </span> : </TD><TD><input  style='width:190px' type="text" name="nom_p" size="30px" required /></TD>-->
                                           <TH>NOM <span> * </span></TH>
                                           <TD>
                                           <select name="nom_p" style='width:203px;font-weight:bold' >
                                                   <option value='' disabled selected >Sélectionner un élément</option>
                                                   <option value='sita.pompesfunebres@gmail.com#SITA'>SITA / 000297453  - 97430 LE TAMPON</option>
                                                   <option value='pompesfunebresvergoz@wanadoo.fr#VERGOZ'>VERGOZ / 000979747 -  97422 LA SALINE</option>
                                                   <option value='hamza@pfpanchbhaya.fr#PF DE BOURBON'>PF DE BOURBON -- 000397411 -- 97420 LE PORT</option>
                                                   <option value='pfp2@orange.fr#BOURBON OBSEQUES'>BOURBON OBSEQUES -- 000999998 -- 97420 LE PORT</option>
                                                   <!--<option value='lnebonne@ums.re#Test'>Test -- 000999998 -- 97420 LE PORT</option>-->
                                                   <option value='testlogums@gmail.com#TEST'>TEST -- 0009999958 -- 97420 LE PORT</option>
                                                 </select>
                                                </TD>
                                   </TR>
                                   <TR>
                                           <TH>VILLE <span> * </span></TH><TD><input  style='width:190px' type="text" name="ville_p" size="30px"  /></TD>
                                   </TR>
                                   <TR>
                                          <TH>HEURE DE MISSIONNEMENT <span> * </span></TH><TD><input  style='width:190px' type="time" name="heure_p" size="30px" /></TD>
                                   </TR>
                                </table>
                                <input id='valid_dc' value="Envoyer"  onclick ="envoyerEmails()" type="submit">
                                
            <p class="obligatoire"> *  :  Champ obligatoire</p>
            </fieldset>
                
                     
<script>
function envoyerEmails() { 
 var nombreMails = prompt("Combien d'adresses e-mail souhaitez vous ajouter ? ")
 if (nombreMails !== null && nombreMails !== "") {
    var emails = [];
    
    for (var i = 0; i < parseInt(nombreMails); i++) {
      var adresseMail = prompt("Veuillez entrer l'adresse e-mail " + (i + 1));
      
      if (adresseMail !== null && adresseMail !== "") {
        emails.push(adresseMail);
      }
    }
    
    if (emails.length > 0) {
      var mailsConcatenes = emails.join(", ");
      alert("Vous allez envoyer l'e-mail à : " + mailsConcatenes);
      var emailList = emails.join(","); 
      var xhr = new XMLHttpRequest();
xhr.open("POST", "cible.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // Requête terminée avec succès, faire quelque chose si nécessaire
    console.log(xhr.responseText);
  }
};
xhr.send("emailList=" + encodeURIComponent(emailList));

      
      // Ajoutez ici votre code pour envoyer l'e-mail avec les adresses récupérées
      // Utilisez une requête AJAX ou une soumission de formulaire pour envoyer les données au serveur
    } else {
      alert("Aucune adresse e-mail saisie.");
    }
  }
}
 
</script>




      </form>
    </div>
</body>