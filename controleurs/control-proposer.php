<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

session_start();


if (isset($_POST['date'])and (!empty($_POST['date']))){
    //filtres de nettoyage
    $ville_dep_valide=filter_input(INPUT_POST, "ville_depart", FILTER_SANITIZE_SPECIAL_CHARS);
    $ville_ar_valide=filter_input(INPUT_POST, "ville_arrivee", FILTER_SANITIZE_SPECIAL_CHARS);
    $prix_valide=filter_input(INPUT_POST, "prix", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != false){
        //on ajoute les villes dans la base de données si elles n'y sont pas
        ajout_ville_db($bd, $ville_dep_valide);
        ajout_ville_db($bd, $ville_ar_valide);
        
        //on récupère l'id de la ville de départ
        $req1="SELECT id FROM villes WHERE nom='$ville_dep_valide'";
        $rep1=$bd->query($req1);    
        $donnees_ville_dep=$rep1->fetch();
        
        //on récupère l'id de la ville d'arrivée
        $req2="SELECT id FROM villes WHERE nom='$ville_ar_valide'";
        $rep2=$bd->query($req2);    
        $donnees_ville_ar=$rep2->fetch();
        
        //on ajoute le trajet dans la base de données
        $bd->exec ("INSERT INTO trajets VALUES ('','".$donnees_ville_dep['id']."','".$donnees_ville_ar['id']."','".$_POST['date']."',"
             . "'".$_POST['heure']."','".$_POST['nbp']."',0,'".$_POST['prix']."');");    
        
        //on récupère l'id du membre
        $req3="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
        $rep3=$bd->query($req3);
        $donnees_membre=$rep3->fetch();        
        
        //on récupère l'id du trajet
        $req4="SELECT id FROM trajets ORDER BY id DESC LIMIT 1 ";
        $rep4=$bd->query($req4);    
        $donnees_trajet=$rep4->fetch();
        
        //on ajoute dans la table membres_has_trajets l'id du membre et du trajet
        $bd->exec("INSERT INTO membres_has_trajets VALUES ('".$donnees_membre['id']."','".$donnees_trajet['id']."');");
        
        header("Location: ../vues/rechercher.php");
                                        
    }
}

 else {
    header("Location: ../vues/proposer.php");
    exit();
}