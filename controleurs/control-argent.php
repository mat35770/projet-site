<?php

include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');
session_start();
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);  

if (isset($_POST['montant'])and (!empty($_POST['montant']))){
    $montant_valide=filter_input(INPUT_POST, "montant", FILTER_SANITIZE_SPECIAL_CHARS);
    $bd->exec("UPDATE membres SET argent=argent+$montant_valide WHERE id='".$_SESSION['id']."';");
    header("Location: ../vues/profil_user.php");       
    exit();
}
else{
    header("Location: ../vues/argent.php");
    exit();    
}

