<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="images/icone-carsharing.gif">
     <link rel="shortcut icon" href="images/icone-carsharing.gif" />
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/slider.css">
     <script src="js/jquery.js"></script>
     <script src="js/jquery.easing.1.3.js"></script>
     <script src="js/jquery-migrate-1.1.1.js"></script>
     <script src="js/superfish.js"></script>
     <script src="js/jquery.equalheights.js"></script>
     <script src="js/tms-0.4.1.js"></script>
     <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
     <script src="js/jquery.ui.totop.js"></script>
     <script>
      $(window).load(function(){
		  $('.slider')._TMS({
			show:0,
			pauseOnHover:false,
			prevBu:'.prev',
			nextBu:'.next',
			playBu:false,
			duration:800,
			preset:'fade',
			easing:'easeOutQuad', 
			pagination:true,//'.pagination',true,'<ul></ul>'
			pagNums:false,
			slideshow:8000,
			numStatus:false,
			banners:'fade',
			waitBannerAnimation:false,
			progressBar:false
		  })  
      });
      
	  $(window).load (
		 function(){$('.carousel1').carouFredSel({auto: false,prev: '.prev1',next: '.next1', width: 960, items: {
			 visible : {min: 4, max: 4},
		  }, 
		  responsive: false, 
		  scroll: 1, 
		  mousewheel: false,
		  swipe: {onMouse: false, onTouch: false}});
	  });      

     </script>
     <!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
         </a>
      </div>
    <![endif]-->
     <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body>
<!--==============================header=================================-->
<header>
	<div class="container_12">
		<div class="grid_12">
           <h1><a href="index.html"><img src="images/logo.png" alt="BIZZ"></a></h1>
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
                    
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </nav>
</header>

<!--==============================Content=================================-->

 
<div id="content">
	<div class="slider-relative">
        <div class="corps">
            <div class="profil">
                
                <div class="profil-1">
                    <?php if(!isset($_FILES['idpicture'])){
                    printf("<img src='images/idpicture.jpg' alt='idpicture' />");
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
                        <p>Moyenne: 4,2 <img src="images/etoile-avis.png" alt="etoile-avis" /></p>
                        Avis (total: 16)</h1>
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <p>6/16</p>
                    </br>
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>3/16</p>
                    </br>
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>2/16</p>
                    </br>
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>1/16</p>
                    </br>
                    <img src="images/etoile-avis.png" alt="etoile-avis" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <p>0/16</p>
                    </br>
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
                    <img src="images/etoile-avis-grey.png" alt="etoile-avis-grey" />
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

    

	
    
    
    <!--==============================footer=================================-->
<footer>
	<div class="container_12">
		<div class="grid_8">
			<span>BassBass Car &copy; 2015 | Privacy Policy | Website  created by Clemouuche</span>
		</div>
        <div class="grid_4">
        	<ul class="soc-icon">
            	<li><a href="#"><img src="images/icon-3.png" alt=""></a></li>
                <li><a href="#"><img src="images/icon-2.png" alt=""></a></li>
                <li><a href="#"><img src="images/icon-1.png" alt=""></a></li>
            </ul>
        </div>
	</div>
</footer>
    </body>
</html>
