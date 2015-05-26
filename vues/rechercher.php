<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

$bd=  connect_db(SERVEUR, UTILISATEUR, MDP);
                    
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">
     <link rel="stylesheet" href="../include/css/superfish.css">
    
</head>
<body>

<?php include ('../include/lib/header.html');?>

<!--==============================content=================================-->


<div id="content">
	<div class="slider-relative">
            <div class="corps">
                <div class="rechercher-form">
                    <p>Je cherche une place libre</p>
                    <form method="post" action="annonces.php">
                   
                   
                    <img src="../include/images/depart.png" alt="carte" />
            <select name="ville_depart" id="ville_depart"> 
                    <?php                    
                    liste_villes($bd);
                    ?>
                
            </select>                   
                    <img src="../include/images/arrivee.png" alt="arrivee" />
            <select name="ville_arrivee" id="ville_arrivee">
                <?php
                
                   liste_villes($bd); 
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