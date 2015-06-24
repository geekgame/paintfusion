<?php

function PlayerIdToigPseudo($idjoueur,$pdo)
{
	$sql = "select igPseudoJoueur from joueur where IDJoueur = '$idjoueur'";
	$req = $pdo->query($sql);
	if($row = $req->fetch())
		return $row["igPseudoJoueur"];
	return false;
}