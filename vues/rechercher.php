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

<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     
     <!--<link rel="stylesheet" href="../include/css/style.css">-->
     <link rel="stylesheet" href="../include/css/rechercher.css">
     <link rel="stylesheet" href="../include/css/superfish.css">
     <link rel="stylesheet" href="../include/css/header.css">
     <link rel="stylesheet" href="../include/css/footer.css">
	 
    
</head>
<body>

<?php include ('../include/lib/header.html');?>

<!--==============================content=================================-->


<div id="conteneur">
	<div>
            <div class="corps">
                <div class="rechercher-form">
                    <p>Je cherche une place libre</p>
                    <form method="post" action="annonces.php">
                   
                   
                    <img src="../include/images/depart.png" alt="carte" />
                    <select name="ville_depart" id="ville_depart"> 
                    <?php
                    $req="SELECT DISTINCT ville_depart_id FROM trajets";
                    $champ="ville_depart_id";
                    liste_villes($bd,$req,$champ);                    
                    ?>                    
            </select>                   
                    <img src="../include/images/arrivee.png" alt="arrivee" />
            <select name="ville_arrivee" id="ville_arrivee">
                
                <?php
                    $req1="SELECT DISTINCT ville_arrivee_id FROM trajets";
                    $champ1="ville_arrivee_id";
                    liste_villes($bd,$req1,$champ1); 
                ?>
            </select>
                    <img id="image-date" src="../include/images/date.png" alt="date" />
                    <input type="date" name="date">                    
                        
                    <input type=submit class="bouton-rechercher" value="Rechercher"/>                   
               
                </form>    
                </div> 
                <img src="../include/images/carte.jpg" alt="carte" />
            </div> 
                

        </div>

     </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br>
</div>


    
<?php include ('../include/lib/footer.html');