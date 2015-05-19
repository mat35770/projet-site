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
                    <!--<li class="menu-project"><a href="index-2.html">PROJECTS</a></li>-->
                    <!--<li><a href="index-3.html">SERVICES</a></li>-->
                    
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
            <form method="post" action="">
                <h1>Publier une annonce</h1>
                <h2>Itinéraire</h2>
                <div>   
            <label for="villedepart">Ville de départ</label><br />
            <select name="villedepart" id="villedepart">
                <option value="paris">Paris</option>
                <option value="troyes">Troyes</option>
                <option value="nice">Nice</option>
            </select>
            </br></br>
            <label for="villearrivee">Ville d'arrivée</label><br />
            <select name="villearrivee" id="villearrivee">
                <option value="paris">Paris</option>
                <option value="troyes">Troyes</option>
                <option value="nice">Nice</option>
            </select>
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
                    
                    <input type="number" value="prix"> €
                    
                </div>
                
            
            
            <input id="submit" type="submit" value="Terminer"/>
               
              </form>

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