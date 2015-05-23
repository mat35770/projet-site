<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="images/icone-carsharing.gif" />
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">
     <link rel="stylesheet" href="../include/css/annonce.css">
     
</head>
<body>
<!--==============================header=================================-->
<header>
	<div class="container_12">
		<div class="grid_12">
           <h1><a href="index.html"><img src="../include/images/logo.png" alt="BIZZ"></a></h1>
		</div>
    </div>
    <nav>
        <div class="container_12">
            <div class="grid_12">
                <ul class="sf-menu">
                    <li class="rechercher"><a href="index.html">Rechercher</a></li>
                    
                    <li class="proposer"><a href="index-4.html">Proposer</a></li>
                    <li class="menu-about"><a href="index-1.html">MENU</a>
                    	<ul>
                            <li><a href="#">PROFIL</a></li>
                            <li><a href="#">VOS ANNONCES</a></li>
                            <li><a href="#">VOS RESERVATIONS</a></li>
                            <li><a href="#">VOS TRAJETS EFFECTUES</a></li>
                            <li><a href="#">MESSAGES PRIVES</a></li>
                            <li><a href="#">SE DECCONNECTER</a></li>

                        </ul>
                    </li>
                    <!--<li class="menu-project"><a href="index-2.html">PROJECTS</a></li>-->
                    <!--<li><a href="index-3.html">SERVICES</a></li>-->
                    
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </nav>
</header>

<!--==============================content=================================-->

 
<div id="content">
	<div class="slider-relative">
            <div class="corps">

                <div class="annonce">
                    <div class="annonce-personne">
                        <div class="photo-annonce"><img src="../include/images/idpicture.jpg" alt="idpicture" /></div>
                        <div>
                            <h1><b>Ludivine V</b></h1>
                            <p>23 ans</p>
                        </div>
                        <p><img src="../include/images/etoile-avis.png" alt="etoile-avis" /> 4.3 - 3 avis</p>
                        <img src="../include/images/reglage-icon.png" alt="reglage-icon" />
                    </div>
                    <div class="annonce-trajet">
                        <div>
                            <h1>Samedi 23 Mai à 00h40</h1>
                            <img src="../include/images/depart.png" alt="carte" /><p>Troyes</p><br>
                            <img src="../include/images/arrivee.png" alt="arrivee" /><p>Paris</p><br>
                            <p>Véhicule : <b>Mercedes C270</b> (confort)</p>
                        </div>
                        
                    </div>
                    <div class="annonce-prix">
                        <div>
                        <h1><b>24€</b></h1>
                        <h3>par place</h3>
                        <h2><b>Complet</b></h2>
                        </div>
                        <div><img src="../include/images/delete-icon.png" alt="delete-icon" /></div>
                    </div>  
                </div>
                
                <?php 
                require_once('Fonctions-temporaires.php');
         annonce_pers("Ludivine", "V", 23, 4.3, 3, "Samedi 23 Mai", "12h40", "Mercedes C470", "confort", 23);
         annonce_pers("Ludivine", "V", 23, 4.3, 3, "Samedi 23 Mai", "12h40", "Mercedes C470", "confort", 23);
         annonce_pers("Ludivine", "V", 23, 4.3, 3, "Samedi 23 Mai", "12h40", "Mercedes C470", "confort", 23);
         annonce("Ludivine", "V", 23, 4.3, 3, "Samedi 23 Mai", "12h40", "Mercedes C470", "confort", 23);
                ?>
            </div> 
                

        </div>

     </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br> </br></br>
</div>

    

	
    
    
    <!--==============================footer=================================-->
<footer>
	<div class="container_12">
		<div class="grid_8">
			<span>BassBass Car &copy; 2015 | Privacy Policy | Website  created by Clemouuche</span>
		</div>
        <div class="grid_4">
        	<ul class="soc-icon">
            	<li><a href="#"><img src="../include/images/icon-3.png" alt=""></a></li>
                <li><a href="#"><img src="../include/images/icon-2.png" alt=""></a></li>
                <li><a href="#"><img src="../include/images/icon-1.png" alt=""></a></li>
            </ul>
        </div>
	</div>
</footer>
    </body>
</html>