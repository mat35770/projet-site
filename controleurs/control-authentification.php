<?php
include ('../include/lib/connexion_db.php');
include ('../include/lib/database.php');


function control_db ($bd,$la_requete,$affiche=false){
    $reponse=$bd->query($la_requete);
    if ($reponse===FALSE){
        $errInfos=$bd->errorInfo();
        echo 'requete échouée'.$errInfos[2];
        return false;
    }else{
        header('Location: ../vues/rechercher.php');
        exit();
    }
}

if (isset($_POST['login'])){
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != false){
        $la_requete="SELECT ".$_POST['login']." FROM membres";
        control_db($bd, $la_requete); 
    }
}

?>