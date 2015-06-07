<html>
<head>
<link rel="stylesheet" href="../include/css/avis.css">
</head>
<body>
<?php

function avis(){
printf("<div class=%s>","rating");
printf("<a href=%s title=%s>*</a>","#5","Donner 5 étoiles");
printf("<a href=%s title=%s>*</a>","#4","Donner 4 étoiles");
printf("<a href=%s title=%s>*</a>","#3","Donner 3 étoiles");
printf("<a href=%s title=%s>*</a>","#2","Donner 2 étoiles");
printf("<a href=%s title=%s>*</a>","#1","Donner 1 étoile");
printf("</div>");
}

avis();

?>
</body>
</html>