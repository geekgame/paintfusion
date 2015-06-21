<?php

include("../_utils/connect.php");
include 'check_admin.php';
$idt = $_POST['idt'];
$sql = $pdo -> query("UPDATE tournoi SET etatTournoi=3 WHERE IDTournoi=".$idt);
header('Location:accueil_admin.php'	);  	
?>