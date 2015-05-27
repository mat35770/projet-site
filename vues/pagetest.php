<html>
<head>
  <link rel="stylesheet" href="../include/css/header.css">
  <link rel="stylesheet" href="../include/css/annonce.css">
       <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">

</head>
<body>
  <?php include ('../include/lib/fonctions_mise_en_page.php');?>
  <br>
  <div class="corps">
  <?php 
  $prenom="Larry";
  $nom="Fisherman";
  $age="22";
  $moyenne_avis=4.2;
  $nb_avis=4;
  $date="01 Juin 2015";
  $heure="18h";
  $voiture="Audi";
  $prix=22;
  $nb_places_libres=2;
  $ville_depart="Paris";
  $ville_arrivee="Troyes";
  annonce_pers($prenom, $nom, $age, $moyenne_avis, $nb_avis, $date, $heure, $voiture, $prix, $nb_places_libres, $ville_depart, $ville_arrivee)
  ?>
  </div>
</body>

</html>