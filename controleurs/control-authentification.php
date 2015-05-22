<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');


if (isset($_POST['login'])){
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != false){
        $la_requete="SELECT id FROM membres WHERE login='".$_POST['login']."';";
        $ok_redirection='Location: ../vues/rechercher.php';
        $ko_redirection='Location: ../vues/erreur_authentification.php';
        control_db($bd, $la_requete,$ok_redirection,$ko_redirection); 
    }
}

?>