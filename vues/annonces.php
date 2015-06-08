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

 

	<div class="conteneur">
            <div class="corps">              
                
                <?php
                                         
                
                //on récupère l'id de l'utilisateur
                $req0="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
                $rep0=$bd->query($req0);
                $donnees_utilisateur=$rep0->fetch();
                $utilisateur_id=$donnees_utilisateur['id']; 
                
                //on récupère les données de la recherche
                            $ville_dep=$_POST['ville_depart'];
                            $ville_ar=$_POST['ville_arrivee'];
                            $date=$_POST['date'];
                            
                            //on récupère l'id de la ville de départ
                            $req_v_d="SELECT id FROM villes WHERE nom='$ville_dep';";
                            $rep_v_d=$bd->query($req_v_d);
                            $donnees_ville=$rep_v_d->fetch();
                            $ville_depart_id=$donnees_ville['id'];
                            
                            //on récupère l'id de la ville d'arrivée
                            $req_v_a="SELECT id FROM villes WHERE nom='$ville_ar';";
                            $rep_v_a=$bd->query($req_v_a);
                            $donnees_ville=$rep_v_a->fetch();
                            $ville_arrivee_id=$donnees_ville['id'];
                            
                            
                            //on compte le nombre de trajets
                            $req1="SELECT * FROM trajets WHERE ville_depart_id='$ville_depart_id' AND ville_arrivee_id='$ville_arrivee_id' AND date='$date'";
                            $rep1=$bd->query($req1);    
                            $count=$rep1->rowCount();
                            if ($count == 1)
                                echo "<h3>$count annonce correspond à votre recherche</h3>";
                            else
                                echo "<h3>$count annonces correspondent à votre recherche</h3>";
                            
                            //pour chaque trajet on affiche les informations
                            while ($donnees_trajet=$rep1->fetch()){     
                                
                               //sélection des informations du trajet 
                                $trajet_id=$donnees_trajet['id'];
                                $membres_id=$donnees_trajet['membres_id'];                                
                                
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
                                
                                //requête qui renvoie la moyenne des avis avec 2 chiffres après la virgule
                                $req4="SELECT AVG(note) AS moyenne FROM commentaires WHERE membres_id=$membres_id;";
                                $rep4=$bd->query($req4);
                                $donnees_moyenne=$rep4->fetch();
                                $moyenne=$donnees_moyenne['moyenne'];
                                $moyenne= number_format($moyenne,2);
                                
                                //reqûete qui renvoie le nombre d'avis
                                $req3="SELECT * FROM commentaires WHERE membres_id=$membres_id;";
                                $rep3=$bd->query($req3);
                                $donnees_commentaires=$rep3->fetch();
                                $count3=$rep3->rowCount();
                               
                                
                                $annee=date('Y');
                                $age=$annee-$donnees_membre['annee_naissance'];
                                
                                //appel à la fonction qui génère les annonces
                                annonce_pers($donnees_membre['prenom'], $donnees_membre['nom'], $age,
                                        $moyenne, $count3, $donnees_trajet['date'], $donnees_trajet['heure'],
                                        $donnees_vehicule['modele'], $donnees_trajet['prix'], $donnees_trajet['nbr_places_disponibles'], 
                                        $ville_dep, $ville_ar,$trajet_id, $utilisateur_id, $membres_id, $donnees_membre['login']);
                                
                                $rep4->closeCursor();
                                $rep5->closeCursor();
                                $rep6->closeCursor();                                
                                
                            }
                            $rep1->closeCursor();
                            
                ?>
            </div> 
                

        </div>

    


   

<?php include ('../include/lib/footer.html');?>

</body>
</html>
