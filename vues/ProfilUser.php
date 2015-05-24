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
                           <p>Nom:</p> 
                           <p>Prenom:</p>
                           <p>Age:</p>
                    </div>
                    <div>
                        <form method="post" action="ProfilUser.php"/>
                        <?php
                        
                        if(!isset($_POST['nom']) OR !isset($_POST['prenom']) OR !isset($_POST['age'])){
                            $nom="Fisherman";
                            $prenom="Larry";
                            $age="23";}
                        else{
                            $nom=$_POST['nom'];
                            $prenom=$_POST['prenom'];
                            $age=$_POST['age'];
                            }    
                            
                            printf("<p><input type='text' name='nom' value='%s' /></p>", $nom);
                            printf("<p><input type='text' name='prenom' value='%s' /></p>", $prenom);
                            printf("<p><input type='text' name='age' value='%s' /></p>", $age);
                        ?>    
                    </div>
                    </div>
                </div>
                <div class="profil-vehicule">
                    <div>
                    <h1>Vehicule</h1>
                    <div>
                    <p>Marque:</p>
                    <p>Confort:</p>
                    <p>Nombre de place:</p>
                    <p>Couleur:</p>
                    </div>
                    <div>
                        <?php
                        
                        if(!isset($_POST['marque']) OR !isset($_POST['confort']) OR !isset($_POST['nbp']) OR !isset($_POST['couleur'])){
                            $marque="Audi";
                            $confort="Luxe";
                            $nbp="3";
                            $couleur="noir";    
                        }
                        else{
                            $marque=$_POST['marque'];
                            $confort=$_POST['confort'];
                            $nbp=$_POST['nbp'];
                            $couleur=$_POST['couleur'];
                            
                            }  
                        
                            printf("<p><input type='text' name='marque' value='%s' /></p>", $marque);
                            printf("<p><input type='text' name='confort' value='%s' /></p>", $confort);
                            printf("<p><input type='text' name='nbp' value='%s' /></p>", $nbp);
                            printf("<p><input type='text' name='couleur' value='%s' /></p>", $couleur);
                        ?>
                            
                    </div>
                    </div>
                </div>
                <input type="submit" name="Modifier"/>
                </div>
            </div>
        </div>
        </div>
        
    </br></br>
</div>

    
<?php include ('../include/lib/footer.html');