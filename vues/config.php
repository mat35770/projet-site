<?php

include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/

//On se connecte a la base de donnee
$bd=  connect_db(SERVEUR, UTILISATEUR, MDP);

//on test si la personne qui visionne la page est bien un membre du site
$req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
$rep=$bd->query($req);
$count=$rep->rowCount();
if ($count == 0){
    header("Location: authentification.php");
    exit();
}

//Email du webmaster
$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'rechercher.php';

//Nom du design
$design = 'default';
?>