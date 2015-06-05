<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Messages Personnels</title>
    </head>
    <body>
        <div class="header">
                <a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Espace Membre" /></a>
            </div>
        <div class="content">
<?php
//On verifie que lutilisateur est connecte
if(isset($_SESSION['login']))
{
//On affiche la liste des messages de l'utilisateur sous la forme dun tableau
//Deux requettes sont executees, une pour recuperer les messages non-lus et une pour les messages lus
$rep1 = "select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, membres.id as userid, membres.login from pm as m1, pm as m2, membres where ((m1.user1='".$_SESSION['id']."' and m1.user1read='no' and membres.id=m1.user2) or (m1.user2='".$_SESSION['id']."' and m1.user2read='no' and membres.id=m1.user1)) and m1.id2='1' and m2.id=m1.id group by m1.id order by m1.id desc";
$rep2= "select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, membres.id as userid, membres.login from pm as m1, pm as m2, membres where ((m1.user1='".$_SESSION['id']."' and m1.user1read='yes' and membres.id=m1.user2) or (m1.user2='".$_SESSION['id']."' and m1.user2read='yes' and membres.id=m1.user1)) and m1.id2='1' and m2.id=m1.id group by m1.id order by m1.id desc";
$req1=$bd -> query($rep1);
$req2=$bd -> query($rep2);
?>
Voici la liste de vos messages:<br />
<a href="new_pm.php" class="link_new_pm">Nouveau message priv&eacute;</a><br />
<h3>Messages non-lus(<?php echo intval($req1->rowCount()); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Titre</th>
        <th>Nb. R&eacute;ponses</th>
        <th>Participant</th>
        <th>Date d'envoi</th>
    </tr>
<?php
//On affiche la liste des messages non-lus
while($dn1 = $req1->fetch())
{
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn1['reps']-1; ?></td>
        <td><a href="profile.php?id=<?php echo $dn1['login']; ?>"><?php echo htmlentities($dn1['login'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('d/m/Y H:i:s' ,$dn1['timestamp']); ?></td>
    </tr>
<?php
}
//Sil na aucun message non-lu, on le dit
if(intval($req1->rowCount())==0)
{
?>
        <tr>
        <td colspan="4" class="center">Vous n'avez aucun message non-lu.</td>
    </tr>
<?php
}
?>
</table>
<br />
<h3>Messages lus(<?php echo intval($req2->rowCount()); ?>):</h3>
<table>
        <tr>
        <th class="title_cell">Titre</th>
        <th>Nb. R&eacute;ponses</th>
        <th>Participant</th>
        <th>Date d'envoi</th>
    </tr>
<?php
//On affiche la liste des messages lus
while($dn2 = $req2->fetch())
{
?>
        <tr>
        <td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo $dn2['reps']-1; ?></td>
        <td><a href="profile.php?id=<?php echo $dn2['login']; ?>"><?php echo htmlentities($dn2['login'], ENT_QUOTES, 'UTF-8'); ?></a></td>
        <td><?php echo date('d/m/Y H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>
<?php
}
//Sil na aucun message lu, on le dit
if(intval($req2->rowCount())==0)
{
?>
        <tr>
        <td colspan="4" class="center">Vous n'avez aucun message lu.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
        echo 'Vous devez &ecirc;tre connect&eacute; pour acc&eacute;der &agrave; cette page.';
}
?>
                </div>
                <div class="foot"><a href="<?php echo $url_home; ?>">Retour &agrave; l'accueil</a> - <a href="http://www.supportduweb.com/">Support du Web</a></div>
        </body>
</html>