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



/*fonction qui affiche une page différente en fonction de la requête
 * ko_redirection si la requête ne renvoie rien
 * ok_redirection si la requête est bonne
 * si la requête présente une erreur, l'erreur est affichée
 */
function redirection_db ($bd,$la_requete,$ok_redirection,$ko_redirection,$affiche=FALSE){
    $reponse=$bd->query($la_requete);
    $count=$reponse->rowCount();
    if ($reponse===FALSE){
        $errInfos=$bd->errorInfo();
        echo 'requete échouée'.$errInfos[2];
        return false;
    }else if($count == 0){
        header($ko_redirection);
        exit();
    }
    else{
        header($ok_redirection);
        exit();
    }
}

/*
 * fonction qui permet d'ajouter un membre et de le rediriger vers une page
 * ok_redirection si l'ajout a fonctionné
 * ko_redirection si l'ajout n'a pas fonctionné
 */
function ajout_membre_db ($bd,$ok_redirection,$ko_redirection,$affiche=FALSE){
    $requete_a_tester="SELECT id FROM membres WHERE login='".$_POST['in_login']."';";
    
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
        $req=$bd->prepare('INSERT INTO membres(nom, prenom, mail, annee_naissance, password, login) '
                . 'VALUES(:nom, :prenom, :mail, :annee_naissance, :password, :login)');
        $result=$req->execute(array(
            'nom'=>$_POST['in_nom'],
            'prenom'=>$_POST['in_prenom'],
            'mail'=>'',
            'annee_naissance'=>$_POST['in_annee'],
            'password'=>$_POST['in_mdp'],
            'login'=>$_POST['in_login']
        ));
        
        //on teste si l'insertion a réussi ou non
        if ($result){
            header($ok_redirection);
            exit();
        }
        else{
            header($ko_redirection);
            exit();
        }
            
            
    }
}