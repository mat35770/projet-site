<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
session_start();    
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);
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
     <link rel="stylesheet" href="../include/css/annonce.css">
	 <link rel="stylesheet" href="../include/css/header.css">
     
    
</head>
<body>

<?php include ('../include/lib/header.html');?>
    
<!--==============================Content=================================-->

<div id="content">
	<div class="slider-relative">
        <div class="corps">
            <div class="profil">
                
                <div class="profil-1">
                    <?php if(!isset($_FILES['idpicture'])){
                    printf("<img src='../include/images/idpicture.jpg' alt='idpicture' />");
                    }
                    else{
                        printf("<img src='%s' alt='idpicture' />", $_FILES['idpicture']['tmp_name']);
                    }
                    
                    ?>
                
                <form method="post" action="ProfilUser.php" enctype="multipart/form-data">
                    <input type="file" name="idpicture"/>
                    <input type="submit" name="Modifier"/>
                </form>
                
                <div class="avis">
                    <h1>
                        <p>Moyenne: 4,2 <img src="../include/images/etoile-avis.png" alt="etoile-avis" /></p>
                        Avis (total: 16)</h1>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <p>6/16</p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>3/16</p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>2/16</p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>1/16</p>
                    </br>
                    <img src="../include/images/etoile-avis.png" alt="etoile-avis" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>0/16</p>
                    </br>
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="../include/images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>1/16</p>
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
                    </div>
                    <div>
                        <form method="post" action="control-profil-user.php"/>
                        <?php
                            //on récupère l'id de l'utilisateur
                            $req1="SELECT * FROM membres WHERE login='".$_SESSION['login']."';";
                            $rep1=$bd->query($req1);
                            $donnees_membre=$rep1->fetch();                                                    
                         
                            printf("<p><input type='text' name='login' value='%s' /></p>", $donnees_membre['login']);
                            printf("<p><input type='text' name='nom' value='%s' /></p>", $donnees_membre['nom']);
                            printf("<p><input type='text' name='prenom' value='%s' /></p>", $donnees_membre['prenom']);
                            printf("<p><input type='text' name='annee_naissance' value='%s' /></p>", $donnees_membre['annee_naissance']);
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
                                printf("<p><input type='text' name='marque' value='%s' /></p>", $donnees_vehicule['marque']);
                                printf("<p><input type='text' name='modele' value='%s' /></p>", $donnees_vehicule['modele']);                            
                                printf("<p><input type='text' name='couleur' value='%s' /></p>", $donnees_vehicule['couleur']);
                                printf("<p><input type='text' name='annee_mise_en_circulation' value='%s' /></p>", 
                                        $donnees_vehicule['annee_mise_en_circulation']);
                            }
                        
                            
                        ?>
                            
                    </div>
                    </div>
                </div>
                    <input type="submit" name="Modifier" value="ajouter un véhicule"/>                
                </div>
            </div>
        </div>
        </div>
        
    </br></br>
</div>

    
<?php include ('../include/lib/footer.html');?>

</body>
</html>