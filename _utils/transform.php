<?php

//igpseudo est le nom du joueur (en jeu), cette fonction transforme l'id du joueur en son pseudo ingame

function PlayerIdToigPseudo($idjoueur,$pdo)
{
	$sql = "select igPseudoJoueur from joueur where IDJoueur = '$idjoueur'";
	$req = $pdo->query($sql);
	if($row = $req->fetch())
		return $row["igPseudoJoueur"];
	return false;
}