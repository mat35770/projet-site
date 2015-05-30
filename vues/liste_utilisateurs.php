<?php

include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

$bd=connect_db(SERVEUR, UTILISATEUR, MDP);
//on test si la personne qui visionne la page est bien un membre du site
$req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
$rep=$bd->query($req);
$count=$rep->rowCount();
if ($count == 0){
    header("Location: authentification.php");
    exit();
}
$la_requete="SELECT * FROM membres";
execute_select($bd, $la_requete);