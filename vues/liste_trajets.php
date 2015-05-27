<?php

include ('../include/lib/fonctions_db.php');
include ('../include/lib/database.php');

$bd=connect_db(SERVEUR, UTILISATEUR, MDP);

$la_requete="SELECT * FROM trajets";
execute_select($bd, $la_requete);