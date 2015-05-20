
<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
    <!--
    <link rel="stylesheet" href="../include/css/style.css">
    <link rel="stylesheet" href="../include/css/slider.css">
    -->
</head>
<body>
<!--==============================header=================================-->


<!--==============================content=================================-->

 
<div id="content">
	 <li>
                <div class="banner">INSCRIVEZ-VOUS OU CONNECTEZ-VOUS</div>
         </li>
                
</div>
        
       
    <!-- formulaire inscription -->
    <form method="post" action="../controleurs/control-authentification.php">
            
            <fieldset>
            <table border="0" cellspacing="2" cellpadding="1" >
                <legend>S'enregistrer</legend>
                <tr>
                    <th><label for="nom">Nom</label></th>
                    <td><input type="text" name="nom" id="nom" autofocus required></td>  
                </tr>
                <tr>
                    <th><label for="prenom">Prénom</label></th>
                    <td><input type="text" name="prenom" id="prenom" required></td>
                </tr>
                <tr>
                    <th><label for="annee">Année de naissance</label></th>
                    <td><input type="text" name="annee" id="annee" required></td>
                </tr>
                <tr>
                    <th><label for="login">Login</label></th>
                    <td><input type="text" name="login" id="login" required></td>
                </tr>                
                <tr>
                    <th><label for="mdp">mot de passe</label></th>
                    <td><input type="password" name="mdp" id="mdp" required></td>
                </tr>
                </table>
                </fieldset>
        
            <fieldset>
                <input type="submit" value="Envoyer" />
            </fieldset>  
        </form>
    
    <form method="post" action="../controleurs/control-authentification.php">
        <fieldset>
            <table border="0" cellspacing="2" cellpadding="1" >
                <legend>Connexion</legend>
                <tr>
                    <th><label for="login">Login</label></th>
                    <td><input type="text" name="login" id="login" required></td>
                </tr>                
                <tr>
                    <th><label for="mdp">mot de passe</label></th>
                    <td><input type="password" name="mdp" id="mdp" required></td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
                <input type="submit" value="Envoyer" />
        </fieldset>  
    </form>
        
    
<
	
    
    
    <!--==============================footer=================================-->
<footer>
	<div class="container_12">
		<div class="grid_8">
			<span>BassBass Car &copy; 2015 | Privacy Policy | Website  created by Clemouuche</span>
		</div>
        <div class="grid_4">
        	<ul class="soc-icon">
                    <li><a href="#"><img src="../include/images/icon-3.png" alt=""></a></li>
                    <li><a href="#"><img src="../include/images/icon-2.png" alt=""></a></li>
                    <li><a href="#"><img src="../include/images/icon-1.png" alt=""></a></li>
            </ul>
        </div>
	</div>
</footer>
    </body>
</html>


