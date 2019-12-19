<?php
$partNb = 9;
$exerciseNb ='Exercice 7';
include '../header.php';
setlocale(LC_TIME, 'fr_FR.utf8','fra');
echo ('<p>Dans 20 jours, nous serons le '.strftime('%A %e %B %Y', strtotime('+20 days')).'.</p>');
include '../footer.php';