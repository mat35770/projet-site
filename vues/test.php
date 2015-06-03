<?php

//$annee=  date(Y[,time()]);
$annee=  date('Y-m-d');
$date= new DateTime();
//echo $annee;
if (new DateTime() > new DateTime('2015-08-27')	)
   echo "coucou";