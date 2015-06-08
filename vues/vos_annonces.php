<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
include ('../include/lib/fonctions_mise_en_page.php');
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
     <!--<link rel="stylesheet" href="../include/css/slider.css">-->
     <link rel="stylesheet" href="../include/css/annonce.css">
	 <link rel="stylesheet" href="../include/css/header.css">
	 <link rel="stylesheet" href="../include/css/main.css">
	 <link rel="stylesheet" href="../include/css/footer.css">
     
</head>
<body>
<?php include ('../include/lib/header.html');?>




<!--==============================content=================================-->

 

	<div id="conteneur">
            <div class="corps">              
                
                <?php
                                          
                
                //on récupère l'id de l'utilisateur
                $req1="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
                $rep1=$bd->query($req1);
                $donnees_membre=$rep1->fetch();
                $membres_id=$donnees_membre['id'];                         
                           
                            
                            
                            //on compte le nombre de trajets
                            $req2="SELECT * FROM trajets WHERE membres_id=$membres_id";
                            $rep2=$bd->query($req2);    
                            $count=$rep2->rowCount();
                            if ($count <= 1)
                                echo "<h3>Vous avez $count annonce</h3>";
                            else 
                                echo "<h3>Vous avez $count annonces</h3>";
                            
                            //pour chaque trajet on affiche les informations
                            while ($donnees_trajet=$rep2->fetch()){     
                              
                                $trajet_id=$donnees_trajet['id'];                                                            
                                
                                //sélection des informations du conducteur                                                             
                                $req4="SELECT nom, prenom, annee_naissance, login FROM membres WHERE id='$membres_id'";
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
                                
                                /*
                                 *  Problème de moyenne, seul la première note est affichée
                                 */
                                $commentaire_id=$donnees2['commentaires_id'];                                
                                $req7="SELECT note FROM commentaires WHERE id='$commentaire_id'";
                                $rep7=$bd->query($req7);
                                $donnees_note=$rep7->fetch();  
                                
                                $req8="SELECT nom FROM villes WHERE id='".$donnees_trajet['ville_depart_id']."';";
                                $rep8=$bd->query($req8);
                                $donnees_ville_dep=$rep8->fetch();
                                $ville_dep=$donnees_ville_dep['nom'];
                                
                                $req9="SELECT nom FROM villes WHERE id='".$donnees_trajet['ville_arrivee_id']."';";
                                $rep9=$bd->query($req9);
                                $donnees_ville_ar=$rep9->fetch();
                                $ville_ar=$donnees_ville_ar['nom'];
                                
                                $annee=date('Y');
                                $age=$annee-$donnees_membre['annee_naissance'];
                                
                                //appel à la fonction qui génère les annonces
                                annonce_pers($donnees_membre['prenom'], $donnees_membre['nom'], $age,
                                        $donnees_note['note'], $count2, $donnees_trajet['date'], $donnees_trajet['heure'],
                                        $donnees_vehicule['modele'], $donnees_trajet['prix'], $donnees_trajet['nbr_places_disponibles'], 
                                        $ville_dep, $ville_ar,$trajet_id, $membres_id, $membres_id, $donnees_membre['login']);
										echo "</div>";
                                
                                $rep4->closeCursor();
                                $rep5->closeCursor();
                                $rep6->closeCursor();
                                $rep7->closeCursor();
                                
                            }
                            $rep1->closeCursor();
                            
                ?>
            </div> 
                

        </div>

    


   

<?php include ('../include/lib/footer.html');?>

</body>
</html>
