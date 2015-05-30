<?php

include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
session_start();
$bd=  connect_db(SERVEUR, UTILISATEUR, MDP); 

//on test si la personne qui visionne la page est bien un membre du site
$req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
$rep=$bd->query($req);
$count=$rep->rowCount();
if ($count == 0){
    header("Location: authentification.php");
    exit();
}
?>
<html>
    <head>
        <title>Ajout d'argent</title>
        <meta charset="UTF-8">
        <meta id="formulaire de contact" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="" />
    </head>
    <body>
        <form method="post" action="../controleurs/control-argent.php">
            
            <fieldset>
            <table border="0" cellspacing="2" cellpadding="1" >                
                <tr>
                    <th><label for="montant">Saisir montant à créditer</label></th>
                    <td><input type="text" name="montant" id="montant" autofocus required></td>  
                </tr>
                <tr>
                    <th><label for="num_carte">Rentrer le numéro de carte</label></th>
                    <td><input type="text" name="num_cart" id="num_carte" required></td>
                </tr>
                <tr>
                    <th><label for="exp">Rentrer la date d'expiration de la carte</label></th>
                    <td><input type="text" name="exp" id="exp" required></td>
                </tr>
                <tr>
                    <th><label for="pic">pictogramme visuel</label></th>
                    <td><input type="text" name="pic" id="pic" required></td>
                </tr>  
                </table>
                </fieldset>
                <fieldset>
                   <input type="submit" value="Ajouter" />
                   <input type="reset" value="Annuler" />
                </fieldset>
        </form>
    </body>
</html>