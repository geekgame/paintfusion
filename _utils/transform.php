<?php
include("_utils/connect.php");

function PlayerIdToPseudo($idjoueur)
{
	$sql = "select pseudoJoueur from joueur where IDJoueur = '$idjoueur'";
	$req = $pdo->query($sql);
	if($row = $req->fetch())
		return $row["pseudoJoueur"];
	return false;
}