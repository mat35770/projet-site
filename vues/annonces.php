<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
include ('Fonctions-temporaires.php');

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
     <link rel="stylesheet" href="../include/css/annonce.css">
     
</head>
<body>

<?php include ('../include/lib/header.html');?>

<!--==============================content=================================-->

 
<div id="content">
	<div class="slider-relative">
            <div class="corps">              
                
                <?php
                $bd=  connect_db(SERVEUR, UTILISATEUR, MDP);                           
                           
                //on récupère les données de la recherche
                            $ville_dep=$_POST['ville_depart'];
                            $ville_ar=$_POST['ville_arrivee'];
                            $date=$_POST['date'];
                            
                            //on compte le nombre de trajets
                            $req1="SELECT * FROM trajets WHERE ville_depart='$ville_dep' AND ville_arrivee='$ville_ar' AND date='$date'";
                            $rep1=$bd->query($req1);    
                            $count=$rep1->rowCount();
                            
                            //pour chaque trajet on affiche les informations
                            while ($donnees_trajet=$rep1->fetch()){
                                
                                //sélection du trajet 
                                $trajet_id=$donnees_trajet['id'];
                                $req3="SELECT membres_id FROM membres_has_trajets WHERE trajets_id='$trajet_id'";
                                $rep3=$bd->query($req3);
                                $donnees1=$rep3->fetch();
                                
                                //sélection des informations du conducteur
                                $membres_id=$donnees1['membres_id'];                                    
                                $req4="SELECT nom, prenom, annee_naissance FROM membres WHERE id='$membres_id'";
                                $rep4=$bd->query($req4);
                                $donnees_membre=$rep4->fetch();
                                
                                //sélection du modèle de la voiture
                                $req5="SELECT modele FROM vehicules WHERE membres_id='$membres_id'";
                                $rep5=$bd->query($req5);
                                $donnees_vehicule=$rep5->fetch();
                                
                                //sélection des commentaires du conducteur
                                $req6="SELECT commentaires_id FROM membres_has_commentaires WHERE membres_id='$membres_id'";
                                $rep6=$bd->query($req6);
                                $donnees2=$rep6->fetch();
                                $count2=$rep6->rowCount();
                                 
                                
                                // Problème de moyenne, seul la première note est affichée
                                $commentaire_id=$donnees2['commentaires_id'];                                
                                $req7="SELECT note FROM commentaires WHERE id='$commentaire_id'";
                                $rep7=$bd->query($req7);
                                $donnees_note=$rep7->fetch();
                                
                                //appel à la fonction qui génère les annonces
                                annonce_pers($donnees_membre['prenom'], $donnees_membre['nom'], $donnees_membre['annee_naissance'], $donnees_note['note'], $count2, $donnees_trajet['date'], $donnees_trajet['heure'], $donnees_vehicule['modele'], $donnees_trajet['prix']);
                                
                                $rep3->closeCursor();
                                $rep4->closeCursor();
                                $rep5->closeCursor();
                                $rep6->closeCursor();
                                $rep7->closeCursor();
                                
                            }
                            $rep1->closeCursor();
                            
                ?>
            </div> 
                

        </div>

     </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br>
</div>

   

<?php include ('../include/lib/footer.html');