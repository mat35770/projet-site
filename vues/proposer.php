<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
    <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">
     
     
</head>
<body>
    
<?php include ('../include/lib/header.html');?>

<!--==============================Content=================================-->

 
<div id="content">
	<div class="slider-relative">
        <div class="corps">
            <form method="post" action="../controleurs/control-proposer.php">
                <h1>Publier une annonce</h1>
                <h2>Itinéraire</h2>
                <div>   
            <label for="ville_depart">Ville de départ</label><br />
            <input type="text" name="ville_depart" id="ville_depart" required>
            </br></br>
            <label for="ville_arrivee">Ville d'arrivée</label><br />
            <input type="text" name="ville_arrivee" id="ville_arrivee" required>
               
                </div>
                <h2>Date et heure</h2>
                <div>   
                    <input type="date" name="date">
                    <select name="heure" id="heure">
                        <?php 
                        for( $i=0; $i<=23; $i++)
                        {
                            if($i<=9){
                            echo "<option value=$i>0$i</option>";}
                            else{
                            echo "<option value=$i>$i</option>";}
                        }
                        
                        ?> 
                    </select> h
                </div>
                
                <h2>Nombre de places</h2>
                <div>
                <select name="nbp" id="nbp">
                        <?php 
                        for( $i=1; $i<=5; $i++)
                        {

                            echo "<option value=$i>$i</option>";
                        }
                        
                        ?>
                </select> places  
                </div>
                
                <h2>Prix</h2>
                <div>
                    
                    <input type="number" name="prix" value="prix" required> €
                    
                </div>
                
            
            
            <input id="submit" type="submit" value="Terminer"/>
               
              </form>

        </div>
        </div>
    </br></br>

    </div>

	
    
    
<?php include ('../include/lib/footer.html');