<?php

include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');

session_start();
    
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

if (isset($_SESSION['login']) and (!empty($_SESSION['login']))){
    $note=$_GET['a'];
    $conducteur_id=$_GET['conducteur_id'];
    
    //on récupère les données du trajet
    $bd->exec("INSERT INTO commentaires (note, membres_id) VALUES ($note,$conducteur_id)");
    header("Location: ../vues/profil_user.php");
    exit();
}
else{
    header("Location: ../vues/authentification.php");
    exit();
}