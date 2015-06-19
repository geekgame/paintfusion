<?php
session_start();
include("_utils/utils.php");
include("_utils/connect.php");

if(isset($_GET["idt"]))
{
	$idt = $_GET["idt"];
}
else
{
	//header("location:index.php");
	//exit;//pas d'id tournoi, la page ne sert à rien
	$idt=1;
}

//Définir l'étât du visiteur de la page
if(!isset($_SESSION["pseudo"]))//non connecté
{
	$state = "nope";//Spectateur du tournoi
}
else
{
	$sql = "SELECT id_joueur FROM inscrit_t WHERE id_tournoi=".$idt." AND id_joueur=".$_SESSION["idJoueur"];
	$req = $pdo->query($sql);
	if($row = $req->fetch())
	{
		$state = "player";
	}
	else
	{
		$state = "spec";
	}
}

//Définir l'étât du tournoi visité
$sql = "SELECT * FROM tournoi WHERE IDTournoi=".$idt;
$req = $pdo->query($sql);
if($row = $req->fetch())
{
	$ok = true;
	$nomTournoi = $row["NomTournoi"];
	$prizePoolTournoi = $row["PrizePoolTournoi"];
	$dateTournoi = $row["DateTournoi"];
	$etatTournoi = $row["etatTournoi"];
}
else
{
	echo "non";
	//header("location:index.php");
	//exit;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Details Tournoi</title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php //<div class="header"><p class="headerText"><red>PF</red>    include("_includes/header.php"); ?></p></div>
<div class="Middle">
<h1><?php echo $nomTournoi ?></h1></p>
<?php

if($etatTournoi == 1)//si le tournoi a pas encore commencé
{
	if($state == "spec")
	{
		echo '<form id="green" method="post" action="_actions/inscriptionTournoi.php"><p>Poste préféré : <select name="poste"><option value="Top">Top</option>									<option value="Mid">Mid</option><Option value="Jungle">Jungle</Option><option value="ADC">ADC</option><option value="Sup">Support</option></select></p>';
		echo '<p><input type="hidden" name="idt" value="'.$idt.'"><input name="do" type="submit" value="Inscription"/></form></p>';
	}
	else if($state == "player")
		echo '<p><form id="red" method="post" action="_actions/inscriptionTournoi.php"><input type="hidden" name="idt" value="'.$idt.'"><input name="do" type="submit" 		value="Desinscription"/></form></p>';
	else
		echo '<p><form id="red" action="register.php"><input type="submit" value="Connexion/Inscription" /></form></p>';
}
else if($etatTournoi == 2)
{
	?>
    <p>Le tournoi est actuellement en cours. Les inscriptions sont désactivées.</p>
    <?php
}
?>
</div>
</body>
</html>