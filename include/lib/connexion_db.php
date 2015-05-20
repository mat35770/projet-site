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
        echo $e->getMessage(); //tester si besoin des parenthèses
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