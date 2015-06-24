<?php
// variables demandées: $_GET['id_tournoi']
	include '../_utils/connect.php';
	session_start();
    include 'check_admin.php';
    $idt = $_GET['id_tournoi'];
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>PaintFusion</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">
    </head>
    <body>
	<p> 
		<!-- formulaire pour créer un tournoi -->
		<form method = "post" action = "DEMARER1.php">
			<label for = "NomTournoi">		nom du tournoi</label> :	<input type = "text"  value = "tournoi" name = "nt"  id = "NomTournoi"/>		<br />
			<label for = "PrizePoolTournoi">Recompense</label> :		<input type = "text"  value = "rien" 	name = "ppt" id = "PrizePoolTournoi"/>	<br />
			<label for = "DateTournoi">		Date prevue</label> : 		<input type = "text"  value = "demain" 	name = "dtt" id = "DateTournoi"/>		<br />
    		<input type = "submit" value = "LANCER" />
		</form>
	</p>
	</body>
</html>