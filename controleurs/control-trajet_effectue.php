<?php

include ('../include/lib/fonctions_db.php'); 
include ('../include/lib/database.php');

session_start();
    
$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

if (isset($_SESSION['login']) and (!empty($_SESSION['login']))){
    $trajet_id=$_GET['id'];
    
    //on récupère les données du trajet
    $req1="SELECT id, ville_depart_id, ville_arrivee_id, date, heure, nbr_places_disponibles, nbr_places_reservees, prix, membres_id FROM trajets WHERE id=$trajet_id;";
    $rep1=$bd->query($req1);
    $donnees_trajet=$rep1->fetch();
    
    $req2="SELECT * FROM membres_has_trajets WHERE trajets_id=$trajet_id;";
    $rep2=$bd->query($req2);      
 
        while ($donnees_membres_has_trajets=$rep2->fetch()){
            $bd->exec("UPDATE membres SET argent=argent-'".$donnees_trajet['prix']."' WHERE id='".$donnees_membres_has_trajets['membres_id']."';");
            $bd->exec("UPDATE membres SET argent=argent+'".$donnees_trajet['prix']."' WHERE id='".$_SESSION['id']."';");
			
	//on ajoute le trajet dans trajets_effectues
            $bd->exec ("INSERT INTO trajets_effectues VALUES ('".$donnees_trajet['id']."','".$donnees_trajet['ville_depart_id']."','".$donnees_trajet['ville_arrivee_id']."','".$donnees_trajet['date']."',"
             . "'".$donnees_trajet['heure']."','".$donnees_trajet['nbr_places_disponibles']."','".$donnees_trajet['nbr_places_reservees']."','".$donnees_trajet['prix']."','".$donnees_trajet['membres_id']."');");  
	//on ajoute le conducteur dans membres_has_trajets_effectues
            $bd->exec ("INSERT INTO membres_has_trajets_effectues VALUES ('".$donnees_trajet['membres_id']."','".$donnees_trajet['id']."');");
	//on ajoute les passagers dans membres_has_trajets_effectues
	$bd->exec ("INSERT INTO membres_has_trajets_effectues VALUES ('".$donnees_membres_has_trajets['membres_id']."','".$donnees_trajet['id']."');");
	
	//on supprime le trajet dans membres_has_trajets puis trajets
        header("Location: ../vues/vos_reservations.php");			 
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
