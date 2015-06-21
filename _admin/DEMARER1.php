<?php
include ("../_utils/connect.php");
session_start();
include ("check_admin.php");


$sql = "INSERT INTO tournoi
	( 
		NomTournoi,	
		PrizePoolTournoi,	
		DateTournoi,	
		etatTournoi
	)
VALUES
	( 
		'".$_POST["nt"]."',	
		'".$_POST["ppt"]."',	
		'".$_POST["dtt"]."',	
		1
	 )";
	 
$req = $pdo->query($sql);

header("location:accueil_admin.php");

?>