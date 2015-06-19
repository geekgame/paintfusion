<?php

$DB_serveur = 'localhost';
$DB_utilisateur = 'root';
$DB_motdepasse = '';
$DB_base = 'paintfusion';

$pdo = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base,$DB_utilisateur,$DB_motdepasse,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


?>