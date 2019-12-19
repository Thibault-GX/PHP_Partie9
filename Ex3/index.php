<?php
$partNb = 9;
$exerciseNb ='Exercice 3';
include '../header.php';

setlocale(LC_TIME, 'fr_FR.utf8','fra');
echo ('<p>Nous sommes le '.strftime('%A %e %B %Y').'.</p>');
include '../footer.php';