<?php

// fonction pour se connecter à une base de données
function connect_db($serveur,$utilisateur,$mdp){
    try{
        $pdo_options[PDO::ATTR_ERRMODE]=pdo::ERRMODE_EXCEPTION;
        $bd=new PDO($serveur, $utilisateur, $mdp, $pdo_options);
        return $bd;
    } catch (PDOException $e) {
        echo "<pre>";
        print_r($pdo_options);
        echo "</pre>";
        echo 'La connexion a échoué';
        echo $e->getMessage();
        return false;
            
    }
}



/* - exécute une requête SQL et l'a renvoie sous forme de tableau
 * - par défaut $affiche=false, il faut mettre sa valeur à true si l'on veut voir
 *   le debogage
 * - fonctionne pour la connexion pdo 
 */
function execute_select($bd,$la_requete,$affiche=false){
    $reponse=$bd->query($la_requete);
    if ($reponse===FALSE){
        $errInfos=$bd->errorInfo();
        echo 'requete échouée'.$errInfos[2];
        return false;
    }else{
        $tab_res=$reponse->fetchAll(PDO::FETCH_ASSOC);
        $i=1;
        if($affiche)
            echo "<br/><b>".$la_requete."<br/><br/>";
        echo "<table>";
        foreach ($tab_res as $un_res){
            if($i==1){
                echo "<tr><th>".implode('</th><th>', array_keys($un_res))."</th></tr>";
                $i++;
            }
            echo "<tr><td>".implode('</td><td>', $un_res)."</td></tr>";
        } 
    }
echo "<table>";
return true;
}

/*
 * fonction qui permet d'ajouter un membre et de le rediriger vers une page
 * ok_redirection si l'ajout a fonctionné
 * ko_redirection si l'ajout n'a pas fonctionné
 */
function ajout_membre_db ($bd,$ok_redirection,$ko_redirection,$affiche=FALSE){
    //on applique des filtres de nettoyage
    $nom_valide=filter_input(INPUT_POST, "in_nom", FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom_valide=filter_input(INPUT_POST, "in_prenom", FILTER_SANITIZE_SPECIAL_CHARS);
    $login_valide=filter_input(INPUT_POST, "in_login", FILTER_SANITIZE_SPECIAL_CHARS);
    $annee_valide=filter_input(INPUT_POST, "in_annee", FILTER_SANITIZE_SPECIAL_CHARS);
    $mdp_valide=filter_input(INPUT_POST, "in_mdp", FILTER_SANITIZE_SPECIAL_CHARS);
    
    $requete_a_tester="SELECT id FROM membres WHERE login='$login_valide';";
    
    $reponse=$bd->query($requete_a_tester);     
    $count=$reponse->rowCount();
    
    //si la requete présente une erreur on affiche le message d'erreur
    if ($reponse===FALSE){
        $errInfos=$bd->errorInfo();
        echo 'requete échouée'.$errInfos[2];
        return false;
    
    //si un membre a déjà le même login on renvoie sur la page d'inscription 
    }else if($count > 0){
        header($ko_redirection);
        exit();        
    }
    
    //sinon on insère les informations du nouveau membre dans la base de données et
    //on le renvoie sur la page rechercher un trajet
    else{
        $req=$bd->prepare('INSERT INTO membres(nom, prenom, annee_naissance, password, login, argent) '
                . 'VALUES(:nom, :prenom, :annee_naissance, :password, :login, 0)');
        $result=$req->execute(array(
            'nom'=>$nom_valide,
            'prenom'=>$prenom_valide,
            'annee_naissance'=>$annee_valide,
            'password'=>$mdp_valide,
            'login'=>$login_valide
        ));
        
        //on teste si l'insertion a réussi ou non
        if ($result){
            $donnees_membre=$reponse->fetch();
            $_SESSION['id']=$donnees_membre['id'];
            $_SESSION['login']=$login_valide;
            header($ok_redirection);
            exit();
        }
        else{
            header($ko_redirection);
            exit();
        }
            
            
    }
}

/*
 * fonction qui permet de lancer un menu déroulant des villes de la base de données
 * seuls les villes correspondant à des trajets de départ ou d'arrivés sont affichées 
 */
function liste_villes($bd,$req,$champ){    
    $rep1=$bd->query($req);
    while ($donnees_trajet=$rep1->fetch()){
        $la_requete="SELECT nom FROM villes WHERE id='".$donnees_trajet[$champ]."';";                        
        $reponse=$bd->query($la_requete);
        while ($donnees=$reponse->fetch()){            
            echo "<option value=".$donnees['nom'].">".$donnees['nom']." </option>";                            
        }
        $reponse->closeCursor();        
    }
}

//fonction qui permet d'ajouter une ville dans la base de données
function ajout_ville_db ($bd,$nom_valide,$affiche=FALSE){ 
    //on vérifie si la ville appartient à la base de données
    $requete_a_tester="SELECT * FROM villes WHERE nom='$nom_valide'";
    $reponse=$bd->query($requete_a_tester);
    $count=$reponse->rowCount();

    //si la requete présente une erreur on affiche le message d'erreur
    if ($reponse===FALSE){
        $errInfos=$bd->errorInfo();
        echo 'requete échouée'.$errInfos[2];
        return false; 
    }
    
    //si la ville n'est pas présente dans la base de données, on l'ajoute   
    else if($count == 0){ 
        $bd->exec ("INSERT INTO villes VALUES ('','$nom_valide')");
    }
}