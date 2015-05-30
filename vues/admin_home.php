<?php
include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');
session_start();

$bd=connect_db(SERVEUR, UTILISATEUR, MDP);
//on test si la personne qui visionne la page est bien un membre du site
$req="SELECT id FROM membres WHERE login='".$_SESSION['login']."';";
$rep=$bd->query($req);
$count=$rep->rowCount();
if ($count == 0){
    header("Location: authentification.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>BassBass Car</title>
     <meta charset="utf-8">
    <link rel="icon" href="../include/images/icone-carsharing.gif">
     <link rel="shortcut icon" href="../include/images/icone-carsharing.gif" />
     <link rel="stylesheet" href="../include/css/style.css">
     <link rel="stylesheet" href="../include/css/slider.css">
     <link rel="stylesheet" href="../include/css/annonce.css">
         
</head>

<body>
    <h1>Page administrateur</h1>
    <input type="button" value="utilisateurs" onClick="javascript:document.location.href='liste_utilisateurs.php'" />
    <input type="button" value="trajets" onClick="javascript:document.location.href='liste_trajets.php'" />
</body>