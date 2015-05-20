
<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
     <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.ico" />
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">
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


<!--==============================content=================================-->

 
<div id="content">
	<div class="slider-relative">
        <div class="slider-block">
            <div class="slider">
                <ul class="items">
                    <li>
                        <div class="banner">INSCRIVEZ-VOUS OU CONNECTEZ-VOUS</div>
                    </li>
                </ul>
            </div>
        </div>
        
        
    </br></br>
    
    <!-- Start Sign In form-->
    <div id="signin">
<link rel="stylesheet" href="signin_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="signin_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-green" style="background-color:#ffffff;font-size:10px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Sign in</h2></div>
	<div class="element-separator"><hr><h3 class="section-break-title">Identité</h3></div>
	<div class="element-name"><label class="title"><span class="required">*</span></label><span class="nameFirst"><input placeholder="Nom" type="text" size="8" name="nom" required="required"/><span class="icon-place"></span></span><span class="nameLast"><input placeholder="Prenom" type="text" size="14" name="Prenom" required="required"/><span class="icon-place"></span></span></div>
	<div class="element-number" title="Age"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="medium" type="text" min="18" max="100" name="number" required="required" placeholder="Age" value=""/><span class="icon-place"></span></div></div>
	<div class="element-separator"><hr><h3 class="section-break-title">Login</h3></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="medium" type="text" name="input" required="required" placeholder="login"/><span class="icon-place"></span></div></div>
	<div class="element-password" title="Password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="medium" type="password" name="password" value="" required="required" placeholder="password"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">html form</a> Formoid.com 2.9</p><script type="text/javascript" src="signin_files/formoid1/formoid-solid-green.js"></script>
    </div>
<!-- Stop Sign In form-->
</br></br>
<!-- Start Login form-->
<div id="login">
<link rel="stylesheet" href="login_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="login_files/formoid1/jquery.min.js"></script>
<form class="formoid-solid-green" style="background-color:#FFFFFF;font-size:10px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>LOGIN</h2></div>
	<div class="element-separator"><hr><h3 class="section-break-title">SE CONNECTER</h3></div>
	<div class="element-input"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="medium" type="text" name="input" required="required" placeholder="Login"/><span class="icon-place"></span></div></div>
	<div class="element-password"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="medium" type="password" name="password" value="" required="required" placeholder="Password"/><span class="icon-place"></span></div></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">html form</a> Formoid.com 2.9</p><script type="text/javascript" src="login_files/formoid1/formoid-solid-green.js"></script>
<!-- Stop Formoid form-->
</br></br>
</div>
</div>
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


