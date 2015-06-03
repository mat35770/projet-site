<?php

include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');

session_start();
    
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

if (isset($_SESSION['login']) and (!empty($_SESSION['login']))){
    $trajet_id=$_GET['id'];
    
    //on récupère l'id du conducteur
    $req1="SELECT prix, membres_id FROM trajets WHERE id=$trajet_id;";
    $rep1=$bd->query($req1);
    $donnees_trajet=$rep1->fetch();
    
    $req2="SELECT * FROM membres_has_trajets WHERE trajets_id=$trajet_id;";
    $rep2=$bd->query($req2);      
 
        while ($donnees_membres_has_trajets=$rep2->fetch()){
            $bd->exec("UPDATE membres SET argent=argent-'".$donnees_trajet['prix']."' WHERE id='".$donnees_membres_has_trajets['membres_id']."';");
            $bd->exec("UPDATE membres SET argent=argent+'".$donnees_trajet['prix']."' WHERE id='".$_SESSION['id']."';");
            $bd->exec("DELETE FROM membres_has_trajets WHERE trajets_id=$trajet_id AND membres_id='".$donnees_membres_has_trajets['membres_id']."';");
        }
        $bd->exec("DELETE FROM trajets WHERE id=$trajet_id ");
        header("Location: ../vues/profil_user.php");
        exit();


}
else{
    header("Location: ../vues/authentification.php");
    exit();
}
