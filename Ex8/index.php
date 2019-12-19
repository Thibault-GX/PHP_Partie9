<?php
$partNb = 9;
$exerciseNb ='Exercice 8';
include '../header.php';
setlocale(LC_TIME, 'fr_FR.utf8','fra');
echo ('<p>Il y a 20 jours, nous étions le '.strftime('%A %e %B %Y', strtotime('-20 days')).'.</p>');
include '../footer.php';