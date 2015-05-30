<?php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
	 <link rel="stylesheet" href="../include/css/authentification.css">
	 
    <!--
    <link rel="stylesheet" href="../include/css/style.css">
    <link rel="stylesheet" href="../include/css/slider.css">
	<link rel="stylesheet" href="../include/css/authentification.css">
    -->
</head>
<body>
<!--==============================header=================================-->


<!--==============================content=================================-->


     <div class="corps-authentification">           

        
       
    <!-- formulaire inscription -->
	
                <div class="authentification-banner">INSCRIVEZ-VOUS OU CONNECTEZ-VOUS</div>
    
    <form class="form-inscription" method="post" action="../controleurs/control-authentification.php">
            <legend>S'enregistrer</legend>
            <fieldset>
            <table border="0" cellspacing="2" cellpadding="1" >
                
                <tr>
                    
                    <td><input type="text" name="in_nom" id="in_nom" placeholder="Nom" autofocus required></td>  
                </tr>
                <tr>
                    
                    <td><input type="text" name="in_prenom" id="in_prenom" placeholder="Prénom" required></td>
                </tr>
                <tr>
                    
                    <td><input type="text" name="in_annee" id="in_annee" placeholder="Année de naissance" required></td>
                </tr>
                <tr>
                    
                    <td><input type="text" name="in_login" id="in_login" placeholder="Login" required></td>
                </tr>                
                <tr>
                    
                    <td><input type="password" name="in_mdp" id="in_mdp" placeholder="Password" required></td>
                </tr>
                </table>
                </fieldset>
        
            
                <input id="authentification-submit" type="submit" value="S'inscrire" />
             
        </form>
     
    <form class="form-connexion" method="post" action="../controleurs/control-authentification.php">
        <legend>Connexion</legend>
		<fieldset>
            <table border="0" cellspacing="2" cellpadding="1" >
                
                <tr>
                    
                    <td><input type="text" name="co_login" id="co_login" placeholder="Login" required></td>
                </tr>                
                <tr>
                    
                    <td><input type="password" name="co_mdp" id="co_mdp" placeholder="Password" required></td>
                </tr>
            </table>
        </fieldset>
        
                <input id="authentification-submit" type="submit" value="Se connecter" />
         
    </form>
	</div>
 
</div>
</body>
</html>


