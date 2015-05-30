<?php

include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');

session_start();
    
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

if (isset($_SESSION['login']) and (!empty($_SESSION['login']))){
    $trajet_id=$_GET['id'];
    
    //on récupère l'id du conducteur
    $req1="SELECT nbr_places_disponibles, nbr_places_reservees, membres_id FROM trajets WHERE id=$trajet_id;";
    $rep1=$bd->query($req1);
    $donnees_trajet=$rep1->fetch();
    
     //on récupère l'id de l'utilisateur
    $req2="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
    $rep2=$bd->query($req2);
    $donnees_membre=$rep2->fetch();        

    //si l'utilisateur est aussi le conducteur on le renvoie vers la page rechercher
    if ($donnees_trajet['membres_id'] === $donnees_membre['id']){
        header("Location: ../vues/rechercher.php");
        exit();
    }
    else{
        if ($donnees_trajet['nbr_places_disponibles'] > 0 ){
        $bd->exec("UPDATE trajets SET nbr_places_disponibles=nbr_places_disponibles-1, nbr_places_reservees=nbr_places_reservees+1 WHERE id=$trajet_id");
        $bd->exec("INSERT INTO membres_has_trajets(membres_id, trajets_id) VALUES('".$donnees_membre['id']."', $trajet_id)");
        header("Location: ../vues/vos_reservations.php");
        exit();
        }
        else{            
            header("Location: ../vues/rechercher.php");
            exit();
        }           

    }
}
else{
    header("Location: ../vues/authentification.php");
    exit();
}

                                
                             