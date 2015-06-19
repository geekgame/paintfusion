<?php

session_start();

$poste = $_POST["poste"];
if($poste != "Top" && $poste != "Mid" && $poste != "Jungle" && $poste != "ADC" && $poste != "Sup")
{
	echo "mauvais poste";
	header("../location:index.php");
	exit;
}

include("../_utils/connect.php");
try{
if($_POST["do"] == "Inscription")
{
	$sql = "INSERT INTO inscrit_t
	( 
		poste,	
		niveau,	
		id_tournoi,	
		id_joueur
	)
VALUES
	( 
		'".$poste."',	
		42,	
		".$_POST["idt"].",	
		".$_SESSION["idJoueur"]."
	 )";
	 
	 
	$req = $pdo->query($sql);
	if($row = $req->fetch())
	echo "succès";
}
else if($_POST["do"] == "Desinscription")
{
	$sql = "DELETE FROM inscrit_t WHERE inscrit_t.id_joueur = ".$_SESSION["idJoueur"]." AND inscrit_t.id_tournoi = ".$_POST["idt"];
	$req = $pdo->query($sql);
	if($row = $req->fetch())
	echo "succès";
}
}
catch(Exception $e)
{
	echo "lol";
}
header("location:../tournoi.php?idt=".$_POST["idt"]);
?>