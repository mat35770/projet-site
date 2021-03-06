<?php
    include ('../include/lib/fonctions_db.php');
    include ('../include/lib/database.php');

    session_start();
    
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    //on test si la personne qui visionne la page est bien un membre du site
    $req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
    $rep=$bd->query($req);
    $count=$rep->rowCount();
    if ($count == 0){
        header("Location: authentification.php");
        exit();
    }

        $membres_id=$_SESSION['id'];
        
        //on test si l'utilisateur a une voiture
        $req2="SELECT * FROM vehicules WHERE membres_id=$membres_id;";
        $reponse=$bd->query($req2);
        $count=$reponse->rowCount();         

        //si la requete présente une erreur on affiche le message d'erreur
        if ($reponse===FALSE){
            $errInfos=$bd->errorInfo();
            echo 'requete échouée'.$errInfos[2];
            return false; 
        }
        //si l'utilisateur n'a pas de voiture on le renvoie sur la page recherchée
        else if($count == 0){        
        header('Location: ../vues/rechercher.php');
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
     <link rel="stylesheet" href="../include/css/slider.css">
     <link rel="stylesheet" href="../include/css/header.css">
     <link rel="stylesheet" href="../include/css/footer.css"> 
     <link rel="stylesheet" href="../include/css/main.css">     	 
     
     
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