<?php
include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');
session_start();

if (isset($_POST['marque'])and (!empty($_POST['marque'])) and isset($_POST['modele'])and (!empty($_POST['modele'])) 
        and isset($_POST['couleur'])and (!empty($_POST['couleur'])) and isset($_POST['annee'])and (!empty($_POST['annee']))){
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);    
        //on applique des filtres de nettoyage
        $marque_valide=filter_input(INPUT_POST, "marque", FILTER_SANITIZE_SPECIAL_CHARS);
        $modele_valide=filter_input(INPUT_POST, "modele", FILTER_SANITIZE_SPECIAL_CHARS);
        $annee_valide=filter_input(INPUT_POST, "annee", FILTER_SANITIZE_SPECIAL_CHARS);
        $couleur_valide=filter_input(INPUT_POST, "couleur", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $bd->exec("INSERT INTO vehicules VALUES ('','$marque_valide','$couleur_valide','$modele_valide',$annee_valide,'".$_SESSION['id']."');");
        header("Location: ../vues/profil_user.php");       
        exit();
}