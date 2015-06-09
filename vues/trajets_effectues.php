<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
include ('../include/lib/fonctions_mise_en_page.php');
include ('../include/lib/avis.php');
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
	 <link rel="stylesheet" href="../include/css/avis.css">
     
</head>
<body>

<?php include ('../include/lib/header.html');?>

<!--==============================content=================================-->

 

	<div class="conteneur">
            <div class="corps">              
                
                <?php
				$pageactuelle="trajets_effectues";
                $bd=  connect_db(SERVEUR, UTILISATEUR, MDP);                           
                
                //on récupère l'id de l'utilisateur
                $req1="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
                $rep1=$bd->query($req1);
                $donnees_utilisateur=$rep1->fetch();
                $utilisateur_id=$donnees_utilisateur['id'];                         
                
                            //on compte le nombre de trajets
                            $req1="SELECT * FROM membres_has_trajets_effectues WHERE membres_id='".$utilisateur_id."';";
                            $rep1=$bd->query($req1);    
                            $count=$rep1->rowCount();
                            if ($count <= 1)
                                echo "<h3>Vous avez effectué $count trajet</h3>";
                            else 
                                echo "<h3>Vous avez effectué $count trajets</h3>";
                            
                            //pour chaque trajet on affiche les informations
                            while ($donnees_membres_has_trajets=$rep1->fetch()){     
                              
                                $trajet_id=$donnees_membres_has_trajets['trajets_id'];                                                            
                                $req3="SELECT * FROM trajets_effectues WHERE id='".$trajet_id."';";
                                $rep3=$bd->query($req3);
                                $donnees_trajet=$rep3->fetch();
                                $conducteur_id=$donnees_trajet['membres_id'];
                                
                                //sélection des informations du conducteur                                                             
                                $req4="SELECT nom, prenom, annee_naissance, login FROM membres WHERE id='".$conducteur_id."';";
                                $rep4=$bd->query($req4);
                                $donnees_membre=$rep4->fetch();
                                
                                
                                //sélection du modèle de la voiture
                                $req5="SELECT modele FROM vehicules WHERE membres_id='".$conducteur_id."';";
                                $rep5=$bd->query($req5);
                                $donnees_vehicule=$rep5->fetch();                              
                                
                                
                                //sélection des commentaires du conducteur
                                $req6="SELECT commentaires_id FROM membres_has_commentaires WHERE membres_id='".$conducteur_id."';";
                                $rep6=$bd->query($req6);
                                $donnees2=$rep6->fetch();
                                $count2=$rep6->rowCount();                                 
                                
                                //requête qui renvoie la moyenne des avis avec 2 chiffres après la virgule
                                $req4="SELECT AVG(note) AS moyenne FROM commentaires WHERE membres_id=$conducteur_id;";
                                $rep4=$bd->query($req4);
                                $donnees_moyenne=$rep4->fetch();
                                $moyenne=$donnees_moyenne['moyenne'];
                                $moyenne= number_format($moyenne,2);
                                
                                //reqûete qui renvoie le nombre d'avis
                                $req3="SELECT * FROM commentaires WHERE membres_id=$conducteur_id;";
                                $rep3=$bd->query($req3);
                                $donnees_commentaires=$rep3->fetch();
                                $count3=$rep3->rowCount();
                                
                                /*
                                 *  Problème de moyenne, seul la première note est affichée
                                 */
                                $commentaire_id=$donnees2['commentaires_id'];                                
                                $req7="SELECT note FROM commentaires WHERE id='".$commentaire_id."';";
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
								printf("<div class=%s>","trajets_effectues") ;
								
								avis($conducteur_id);
                                annonce_pers($donnees_membre['prenom'], $donnees_membre['nom'], $age,
                                        $moyenne, $count3, $donnees_trajet['date'], $donnees_trajet['heure'],
                                        $donnees_vehicule['modele'], $donnees_trajet['prix'], $donnees_trajet['nbr_places_disponibles'], 
                                        $ville_dep, $ville_ar,$trajet_id, $utilisateur_id, $conducteur_id, $donnees_membre['login']);
										
								echo "</div>"; 
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
