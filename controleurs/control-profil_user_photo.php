<?php
session_start();

$login=$_SESSION['login']; 
                         
$uploads_dir = '../include/photos';
$tmp_name = $_FILES["idpicture"]["tmp_name"];                    
$resultat = move_uploaded_file($tmp_name, "$uploads_dir/$login.jpg" );
header("Location: ../vues/profil_user.php");
exit();
