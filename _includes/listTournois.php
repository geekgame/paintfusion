<!doctype HTML>
<html>
<head>
<title>liste tournois</title>
<link href="../style/tiles.css" rel="stylesheet" type="text/css">
<link href="../style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
//récupérer la liste des tournois que le joueur a rejoint
include("../_utils/connect.php");
session_start();



$sql = "SELECT 
	tournoi.IDTournoi AS IDTournoi,	
	tournoi.NomTournoi AS NomTournoi,	
	tournoi.PrizePoolTournoi AS PrizePoolTournoi,	
	tournoi.DateTournoi AS DateTournoi,	
	tournoi.etatTournoi AS etatTournoi
FROM 
	tournoi
WHERE 
	tournoi.IDTournoi =  ANY 
		(
			SELECT 
				inscrit_t.id_tournoi AS id_tournoi
			FROM 
				inscrit_t
			WHERE 
				inscrit_t.id_joueur = ".$_SESSION["idJoueur"]."
		) ";

$req = $pdo->query($sql);
$test = 0;

echo("<p align='center'><h1> Mes tournois </h1></p>");

while($row = $req->fetch())
{
	$test = 1;
	echo('<div class="tileTournoi">');
	echo('<img src="../images/11778380.jpg" class="tileImg"/>');
	echo('<div class="tileTitle"><a href="../tournoi.php?idt='.$row["IDTournoi"].'">'.$row["NomTournoi"].'</a></div>');
	echo('<div class="tileText">'.$row["PrizePoolTournoi"].'</div>');
	echo('</div>');
}

if($test == 0)
{
	echo "<p>vous n'êtes inscrit à aucun tournoi</p>";
}

echo("<p align='center'><h1> Tous les tournois </h1></p>");



$sql="SELECT * FROM tournoi ORDER BY etatTournoi";
$req = $pdo->query($sql);
while($row = $req->fetch())
{
	echo('<div class="tileTournoi">');
	echo('<img src="../images/11778380.jpg" class="tileImg"/>');
	echo('<div class="tileTitle"><a href="../tournoi.php?idt='.$row["IDTournoi"].'">'.$row["NomTournoi"].'</a></div>');
	echo('<div class="tileText">'.$row["PrizePoolTournoi"].'</div>');
	echo('</div>');
}


?>
</body>
</html>