<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="obsq.css" />
	<link rel="shortcut icon" href="images/ums.ico" />
        <title>UMS - Fichiers Obseques</title>
  </head>
  <body>

 <?php
   //***************************************************************************\\ 
   //*                WebApplication : CallReport                              *\\
   //*                    Version    :  2.0.0                                  *\\
   //*              Date de Cr�ation : 04/07/2012                              *\\
   //***************************************************************************\\
   //*                      Module   : error_log.php                           *\\
   //*        Modification du Module : 05/07/2012                              *\\
   //*                   R�alis� par : Fabrice MAILLOT                         *\\
   //*                    Dezin� par : Christophe IROUVA                       *\\
   //***************************************************************************\\  
?>
 
   <header>
                    <TABLE>
                      <TR>
                        <TD valign="bottom" align="center"><h1>UMS</h1></TD>
                        <TD valign="bottom" align="center"><h2>FICHIER OBSEQUES</h2></TD>
                      </TR>
                    </TABLE>
                    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    </header>
                         <div id="connexion">
      <form method="post" action="ldap.php" name="Authentification">
            
            <TABLE>
                   <TR>
                       <TD><input maxlength="40" size="30" name="CR_usr" value="Nom de Connexion" onclick="this.value='' "></TD>
                   </TR>
                   <TR>
  		       <TD><input maxlength="40" size="30" name="CR_pwd" value="Mot de passe" onclick="this.value='' " type="password"></TD>
                   </TR>
                   <div>
                   <div style="display:none">
                                                <label>Ne pas remplir ce champ :</label>
                                                <input type="text" name="honey_pot" />
                                              </div>
                   <TR>
                       <TD><input value="Connexion" type="submit" onclick="return checkHoneyPot() && showMathQuestion()"></TD>
                  </TR>
                  <TR> <TD><font color="red"><b>erreur d'identification veuillez réesayer !</font></b></TD></TR>
           </TABLE>
           <div id="verification_block">
                                              

      </form>
    </div>
			<div id="error_img">
			
			</div>
			<div id="error">
				<p>Pour toutes reclamations, merci de contacter le service informatique au : <b>0262 25 80 80</b></p>
				<p>Ou par mail a l'adresse : <a href=mailto:informatique@ums.re>informatique@ums.re</a></p>
			</div>
      <div>
       <p><a href="mentions_legales.html">Mentions légales</a></p>
                        </div>
                        <script>
        function showMathQuestion() {
          var answer = prompt("Question mathématique : 1 + 1 = ?");
    
          if (answer === "2") {
            // Réponse correcte, la soumission du formulaire se poursuit
            return true;
          } else {
            // Réponse incorrecte, afficher un message d'erreur et empêcher la soumission du formulaire
            alert("La réponse est incorrecte. Veuillez réessayer.");
            return false;
          }
        }
        function checkHoneyPot() {
      if (document.getElementsByName("honey_pot")[0].value !== "") {
        // Le champ honey pot a été rempli, il s'agit probablement d'un robot
        alert("Erreur : Veuillez remplir correctement le formulaire.");
        return false;
      } else {
        // Le champ honey pot est vide, continuer le processus d'authentification
        return true;
      }
    }
      </script>
		</div>
  </body>
</html>
