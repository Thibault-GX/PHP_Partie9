<?php
$partNb = 9;
$exerciseNb = 'Exercice 4';
include '../header.php';
echo ('<p>Timestamp actuel : ' . time() . '.<br>Timestamp du mardi 2 août 2016 à 15h00 : ' . mktime(15, 0, 0, 8, 2, 2016) . '.</p>');
include '../footer.php';
