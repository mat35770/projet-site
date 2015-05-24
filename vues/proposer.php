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
            <form method="post" action="">
                <h1>Publier une annonce</h1>
                <h2>Itinéraire</h2>
                <div>   
            <label for="villedepart">Ville de départ</label><br />
            <select name="villedepart" id="villedepart">
                <option value="paris">Paris</option>
                <option value="troyes">Troyes</option>
                <option value="nice">Nice</option>
            </select>
            </br></br>
            <label for="villearrivee">Ville d'arrivée</label><br />
            <select name="villearrivee" id="villearrivee">
                <option value="paris">Paris</option>
                <option value="troyes">Troyes</option>
                <option value="nice">Nice</option>
            </select>
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
                    
                    <input type="number" value="prix"> €
                    
                </div>
                
            
            
            <input id="submit" type="submit" value="Terminer"/>
               
              </form>

        </div>
        </div>
    </br></br>

    </div>

	
    
    
<?php include ('../include/lib/footer.html');