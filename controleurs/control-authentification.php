<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

session_start();


//tests pour le formulaire inscription
if (isset($_POST['in_login'])and (!empty($_POST['in_login']))){
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != FALSE){
    $ok_redirection='Location: ../vues/rechercher.php';
    $ko_redirection='Location: ../vues/erreur_in_authentification.php';    
    ajout_membre_db($bd, $ok_redirection, $ko_redirection);
    }
}


//tests pour le formulaire connexion
if (isset($_POST['co_login'])and (!empty($_POST['co_login']))){
    $bd=connect_db(SERVEUR, UTILISATEUR, MDP);
    if ($bd != false){
        //on applique des filtres de nettoyage
        $login_valide=filter_input(INPUT_POST, "co_login", FILTER_SANITIZE_SPECIAL_CHARS);
        $mdp_valide=filter_input(INPUT_POST, "co_mdp", FILTER_SANITIZE_SPECIAL_CHARS);        
        
        if ($login_valide === "admin" AND $mdp_valide === "admin"){
            $_SESSION['login']=$login_valide;
            header('Location: ../vues/admin_home.php');
        }
        else {
            $la_requete="SELECT id FROM membres WHERE login='$login_valide' AND password='$mdp_valide';";            
            $ok_redirection='Location: ../vues/rechercher.php';
            $ko_redirection='Location: ../vues/erreur_co_authentification.php';
            
            /*affiche une page différente en fonction de la requête
            * ko_redirection si la requête ne renvoie rien
            * ok_redirection si la requête est bonne
            * si la requête présente une erreur, l'erreur est affichée
            */
            $reponse=$bd->query($la_requete);              
            $donnees_membre=$reponse->fetch();    
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
                $_SESSION['login']=$login_valide;
                $_SESSION['id']=$donnees_membre['id'];
                header($ok_redirection);
                exit();
            }
            redirection_db($bd, $la_requete,$ok_redirection,$ko_redirection);
        }        
         
    }
}

?>