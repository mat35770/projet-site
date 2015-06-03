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
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     <!--<link rel="stylesheet" href="../include/css/style.css">-->
     <link rel="stylesheet" href="../include/css/profil.css">
     <link rel="stylesheet" href="../include/css/annonce.css">
	 <link rel="stylesheet" href="../include/css/header.css">
	 <link rel="stylesheet" href="../include/css/footer.css">
     
    
</head>
<body>

<?php include ('../include/lib/header.html');?>
    
<!--==============================Content=================================-->

<div id="content">
	<div class="slider-relative">
        <div class="corps">
            <div class="profil">
                
                <div class="profil-1">
                   
                    
                    <?php
                    $login=$_SESSION['login'];                  
                                        
                    if(file_exists("../include/photos/$login.jpg"))  {                      
                     ?> <img src='../include/photos/<?php echo "$login.jpg"?>'/> <?php     
                    }
                    else {
                      echo "<img src='../include/photos/sans_profil.png'/>";
                      ?>
                     <form method='post' action='../controleurs/control-profil_user_photo.php' enctype='multipart/form-data'>
                     <label for='idpicture'>Choisir une photo </label>
                     <input type='file' name='idpicture' id='idpicture'/>
                     <input type='submit' name='ajouter'/>
                      </form>
                     <?php
                   }                
                   
                   //requête qui renvoie la moyenne des avis avec 2 chiffres après la virgule
                    $req4="SELECT AVG(note) AS moyenne FROM commentaires WHERE membres_id='".$_SESSION['id']."';";
                    $rep4=$bd->query($req4);
                    $donnees_moyenne=$rep4->fetch();
                    $moyenne=$donnees_moyenne['moyenne'];
                    $moyenne= number_format($moyenne,2);
                   
                    //reqûete qui renvoie le nombre d'avis
                    $req3="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."';";
                    $rep3=$bd->query($req3);
                    $donnees_commentaires=$rep3->fetch();
                    $count3=$rep3->rowCount();
                    
                    
                    //requêtes pour connaitre le nombre de personnes par avis
                    $req_a_5="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=5;";
                    $rep_a_5=$bd->query($req_a_5);                    
                    $count_a_5=$rep_a_5->rowCount();
                    
                    $req_a_4="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=4;";
                    $rep_a_4=$bd->query($req_a_4);                    
                    $count_a_4=$rep_a_4->rowCount();
                    
                    $req_a_3="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=3;";
                    $rep_a_3=$bd->query($req_a_3);                    
                    $count_a_3=$rep_a_3->rowCount();
                    
                    $req_a_2="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=2;";
                    $rep_a_2=$bd->query($req_a_2);                    
                    $count_a_2=$rep_a_2->rowCount();
                    
                    $req_a_1="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=1;";
                    $rep_a_1=$bd->query($req_a_1);                    
                    $count_a_1=$rep_a_1->rowCount();
                    
                    $req_a_0="SELECT * FROM commentaires WHERE membres_id='".$_SESSION['id']."' AND note=0;";
                    $rep_a_0=$bd->query($req_a_0);                    
                    $count_a_0=$rep_a_0->rowCount();
                   
                   ?>                
                    
                    
                <div class="avis">
                    <h1>
                        <p>Moyenne: <?php echo "$moyenne"; ?> <img src="../include/images/etoile-avis.png" alt="etoile-avis" /></p>
                        Avis (total: <?php echo "$count3"; ?> )</h1>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <p> <?php echo "$count_a_5" ?> </p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p> <?php echo "$count_a_4" ?> </p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p> <?php echo "$count_a_3" ?> </p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p> <?php echo "$count_a_2" ?> </p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p> <?php echo "$count_a_1" ?> </p>
                    </br>
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p> <?php echo "$count_a_0" ?> </p>
                    </br>
                    
                </div>
                </div>
                <div>
                <div class="profil-identite">
                    <div>
                    <h1>Informations personnelles</h1>
                    <div>
                           <p>Login :</p> 
                           <p>Nom :</p> 
                           <p>Prenom :</p>
                           <p>Année de naissance :</p>
                           <p>Argent disponible : </p>
                    </div>
                    <div>
                        <form method="post" action="../controleurs/control-profil_user.php"/>
                        <?php
                            //on récupère l'id de l'utilisateur
                            $req1="SELECT * FROM membres WHERE login='".$_SESSION['login']."';";
                            $rep1=$bd->query($req1);
                            $donnees_membre=$rep1->fetch();
                            $_SESSION['id']=$donnees_membre['id'];
                         
                            printf("<p>%s</p>", $donnees_membre['login']);
                            printf("<p>%s</p>", $donnees_membre['nom']);
                            printf("<p>%s</p>", $donnees_membre['prenom']);
                            printf("<p>%d</p>", $donnees_membre['annee_naissance']);
                            printf("<p>%d</p>", $donnees_membre['argent']);
                        ?>    
                    </div>
                    </div>
                </div>
                <div class="profil-vehicule">
                    <div>
                    <h1>Véhicule</h1>
                    <div>
                    <p>Marque :</p>
                    <p>Modèle :</p>
                    <p>Couleur :</p>
                    <p>Année :</p>
                    
                    </div>
                    <div>
                        <?php    
                            //on test si l'utilisateur a une voiture
                            $membres_id=$donnees_membre['id'];
                            $req2="SELECT * FROM vehicules WHERE membres_id=$membres_id;";
                            $rep2=$bd->query($req2);
                            $donnees_vehicule=$rep2->fetch();
                            $count=$rep2->rowCount();
                            
                            //si la requete présente une erreur on affiche le message d'erreur
                            if ($rep2===FALSE){
                                $errInfos=$bd->errorInfo();
                                echo 'requete échouée'.$errInfos[2];
                                return false; 
                            }
                            //si l'utilisateur n'a pas de voiture 
                            else if($count == 0){
                                printf("<p><input type='text' name='marque' /></p>");
                                printf("<p><input type='text' name='modele' /></p>");                            
                                printf("<p><input type='text' name='couleur' /></p>");
                                printf("<p><input type='text' name='annee' /></p>");
                            
                            }
                            
                            //si l'utilisateur a un véhicule on lui montre ses caractéristiques
                            // avec une possibilité de les modifier
                            else{
                                printf("<p>%s</p>", $donnees_vehicule['marque']);
                                printf("<p>%s</p>", $donnees_vehicule['modele']);                            
                                printf("<p>%s</p>", $donnees_vehicule['couleur']);
                                printf("<p>%s</p>", 
                                        $donnees_vehicule['annee_mise_en_circulation']);
                            }
                        
                            
                        ?>
                            
                    </div>
                    
                    </div>
                            <?php if ($count == 0){
                              echo '<input id="profil-submit" type="submit" name="Modifier" value="ajouter le véhicule"/>';   
                            } ?>
                            <input id="profil-submit" type="submit" name="Argent" value="Ajouter de l'argent"/>					
                </div>
                                    
                </div>
            </div>
        </div>
        </div>
        
    </br></br>
</div>

    
<?php include ('../include/lib/footer.html');?>

</body>
</html>