<?php
$partNb = 9;
$exerciseNb ='Exercice 5';
include '../header.php';
$todayStamp = time();
$goalStamp = mktime(15, 0, 0, 8, 2, 2016);
// On calcule la différence, en secondes, entre aujourd'hui et une date définie, puis on divise le résultat pour obtenir un float du nombre de jours qu'on finit par arrondir.
$daysDifference = round(($todayStamp - $goalStamp)/60/60/24);
echo ('<p>Il y a '.$daysDifference.' jours entre aujourd\'hui et le 15 août 2016.</p>');
include '../footer.php';