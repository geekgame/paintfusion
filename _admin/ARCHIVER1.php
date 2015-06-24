<?php

include("../_utils/connect.php");
session_start();
include 'check_admin.php';

$idt = $_POST['idt'];
$sql = $pdo -> query("UPDATE tournoi SET etatTournoi=4 WHERE IDTournoi=".$idt); //ajout de la ligne dans la bdd 
header('Location: accueil_admin.php');  //retour à l'accueil de l'administration
?>