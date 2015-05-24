<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');


if (isset($_POST['date'])and (!empty($_POST['date']))){
    $ville_dep_valide=filter_input(INPUT_POST, "ville_depart", FILTER_SANITIZE_SPECIAL_CHARS);
    $ville_ar_valide=filter_input(INPUT_POST, "ville_arrivee", FILTER_SANITIZE_SPECIAL_CHARS);
    $prix_valide=filter_input(INPUT_POST, "prix", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != false){        
        ajout_ville_db($bd, $ville_dep_valide);
        ajout_ville_db($bd, $ville_ar_valide);
        $la_requete="INSERT INTO trajets VALUES ('','$ville_dep_valide','$ville_ar_valide','".$_POST['date']."',"
                . "'".$_POST['heure']."','".$_POST['nbp']."',0,'".$_POST['prix']."');";
    
        
    }
    
}

 else {
    header("Location: ../vues/proposer.php");
    exit();
}