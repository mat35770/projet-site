<?php

include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
session_start();
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

//on test si la personne qui visionne la page est bien un membre du site
$req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
$rep=$bd->query($req);
$count=$rep->rowCount();
if ($count == 0){
    header("Location: authentification.php");
    exit();
}
//problème pour ne pas afficher les trajets passés
$date=date('Y-m-d');
$la_requete="SELECT * FROM trajets WHERE date>=$date";
execute_select($bd, $la_requete);