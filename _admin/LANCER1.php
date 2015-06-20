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
<?php
include ("../_utils/connect.php");
include ("check_admin.php");
$idt = $_POST['id_tournoi'];
?>

<!--##################### PARTIE AJOUT FAKE #####################-->
<form method = "post" action = "ajout_fake.php">
<p> 
    <label for = "nom_team">nom de l'équipe</label> : <input type = "text"  value = "FAKE" name = "nom_team" id = "nom_team"/>
<!--    <label for = "place">placement</label> : <input type = "number" value = "1" name = "place_team" id = "place"/>-->
	<input type= "hidden" 	value = "<?php 	echo $idt 	;?>" 	name = "id_tournoi"		/>
    <input type= "submit" value = "Ajouter" />
</p>
</form>
<br /><br />
<!--#############################################################-->
<?php
include ("magic_team.php");

include ("profil_tournoi.php");


$sql = $pdo -> query("UPDATE tournoi SET etatTournoi=2 WHERE IDTournoi= $idt");
?>
 <a href="accueil_admin.php">retour à l'accueil</a> 
