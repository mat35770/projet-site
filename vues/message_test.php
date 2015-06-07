<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="../include/css/message.css">
     <link rel="stylesheet" href="../include/css/header.css">
     <link rel="stylesheet" href="../include/css/footer.css">
	 <link rel="stylesheet" href="../include/css/main.css">

</head>
<body>


<div id="conteneur">
	<div>
            <div class="corps">
			<div class="message-header">
			<div id="boiterec">Boite de reception</div>
			<div id="titre">Le clash des gitans</div>
			<div id="nmess">Nouveau message</div>
            </div>
			<div class="corps_message">
			
			
			
			
			
			<?php

//On verifie si lutilisateur est connecte
if(isset($_SESSION['login']))
{
//On verifie que lidentifiant de la discution est defini
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//On recupere le titre et les narateurs de la discution
$rep1='select title, user1, user2 from pm where id="'.$id.'" and id2="1"';
$req1=$bd-> query($rep1);
$dn1 = $req1->fetch();
//On verifie que la discution existe
if(($req1-> rowCount())==1)
{
//On verifie que lutilisateur a le droit dafficher les messages
if($dn1['user1']==$_SESSION['id'] or $dn1['user2']==$_SESSION['id'])
{
//La discution sera placee dans les messages lus
if($dn1['user1']==$_SESSION['id'])
{
        $rep5='update pm set user1read="yes" where id="'.$id.'" and id2="1"';
		$req5=$bd-> query($rep5);
        $user_partic = 2;
}
else
{
        $rep6='update pm set user2read="yes" where id="'.$id.'" and id2="1"';
		$req6=$bd-> query($rep6);
        $user_partic = 1;
}
//On recupere la liste des messages

$rep2='select pm.timestamp, pm.message, membres.id as userid, membres.login from pm, membres where pm.id="'.$id.'" and membres.id=pm.user1 order by pm.id2';
$req2=$bd-> query($rep2);
//On verifie si lutilisateur a valide le formulaire de reponse
if(isset($_POST['message']) and $_POST['message']!='')
{
        $message = $_POST['message'];
        //On enleve lechappement si get_magic_quotes_gpc est active
        if(get_magic_quotes_gpc())
        {
                $message = stripslashes($message);
        }
        //On echape le message pour pouvoir le mettre dans une requette SQL
        //$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
        //On envoi la reponse et le statut de la discution passe a non-lu pour lautre utilisateur
        
		
		
        $rel2=$req2->rowCount();

        $rep6='update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"';
        $req6=$bd->query($rep6);
        $rep7='insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read)values("'.$id.'", "'.(intval($rel2)+1).'", "", "'.$_SESSION['id'].'", "", "'.$message.'", "'.time().'", "", "")' and $req6;
        $req7=$bd-> query($rep7);
		if($req6)
        {

//On affiche la liste des messages
?>
<div id="message-liste">
			
			<?php
            //On affiche la liste des messages non-lus
            while($dn1 = $req1->fetch())
            {
            ?>
			<div class="message">
			<h1><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?> ( <?php echo $dn1['reps']-1; ?> ) </h1><p><?php echo date('d/m/Y H:i:s' ,$dn1['timestamp']); ?></p>
			<h2><?php echo htmlentities($dn1['login'], ENT_QUOTES, 'UTF-8'); ?></h2>
			</div>

			
			<?php}
            //On affiche la liste des messages lus
            while($dn2 = $req2->fetch())
{
            ?>
		    <div class="message">
			<h1><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?> ( <?php echo $dn2['reps']-1; ?> ) </h1><p><?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></p>
			<h2><?php echo htmlentities($dn2['login'], ENT_QUOTES, 'UTF-8'); ?></h2>
			</div>
			</div>
<div class="conversation">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
        <tr>
        <th class="author">Utilisateur</th>
        <th>Message</th>
    </tr>
<?php


while($dn2 = $req2->fetch())
{
?>
        <tr>
        <td class="author center"><?php
/*if($dn2['avatar']!='')
{
        echo '<img src="'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}*/
?><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['login']; ?></a></td>
        <td class="left"><div class="date">Date d'envoi: <?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></div>
        <?php echo $dn2['message']; ?></td>
    </tr>
<?php	
	//On affiche le formulaire de reponse
}?>
</table><br />
<h2>R&eacute;pondre</h2>
<div class="center">
    <form action="message_test.php?id=<?php echo $id; ?>" method="post">
        <label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
</div>
</div>


<?php

        }
        
        }
}
else
{
//On affiche la liste des messages
?>
<div class="content">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
        <tr>
        <th class="author">Utilisateur</th>
        <th>Message</th>
    </tr>
<?php


while($dn2 = $req2->fetch())
{
?>
        <tr>
        <td class="author center"><?php
/*if($dn2['avatar']!='')
{
        echo '<img src="'.htmlentities($dn2['avatar']).'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
}*/
?><br /><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo $dn2['login']; ?></a></td>
        <td class="left"><div class="date">Date d'envoi: <?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></div>
        <?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//On affiche le formulaire de reponse
?>
</table><br />
<h2>R&eacute;pondre</h2>
<div class="center">
    <form action="message_test.php?id=<?php echo $id; ?>" method="post">
        <label for="message" class="center">Message</label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Envoyer" />
    </form>
</div>
</div>
<?php
}
}
else
{
        echo '<div class="message">Vous n\'avez pas le droit d\'acc&eacute;der &agrave; cette page.</div>';
}
}
else
{
        echo '<div class="message">Ce message n\'existe pas.</div>';
}
}
else
{
        echo '<div class="message">L\'identifiant du message n\'est pas d&eacute;fini.</div>';
}
}
else
{
        echo '<div class="message">Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page.</div>';
}
?>






            
	</div>
</div>	
</div>
<?php include('../include/lib/footer.html');
?>
        </body>
</html>