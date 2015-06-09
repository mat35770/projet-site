<?php

function avis($conducteur_id){
    if ($conducteur_id != $_SESSION['id']){
printf("<div class=%s>","rating");
printf("<p>Laissez un avis</p>");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=5&conducteur_id=$conducteur_id","Donner 5 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=4&conducteur_id=$conducteur_id","Donner 4 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=3&conducteur_id=$conducteur_id","Donner 3 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=2&conducteur_id=$conducteur_id","Donner 2 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=1&conducteur_id=$conducteur_id","Donner 1 étoile");                        
printf("</div>");
}
}

function avis2($conducteur_id){
    if ($conducteur_id != $_SESSION['id']){
printf("<div class=%s>","rating2");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=5&conducteur_id=$conducteur_id","Donner 5 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=4&conducteur_id=$conducteur_id","Donner 4 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=3&conducteur_id=$conducteur_id","Donner 3 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=2&conducteur_id=$conducteur_id","Donner 2 étoiles");
printf("<a href=%s title=%s>*</a>","../controleurs/control-avis.php?a=1&conducteur_id=$conducteur_id","Donner 1 étoile");                        
printf("</div>");
}
}
