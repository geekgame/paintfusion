<?php

include_once("utils.php");

function getGameInfos($idjoueur)
{
	
}

function pseudoToInfos($nomJoueur)
{	
	$request = "https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/$nomJoueur?api_key=3a9a818c-d165-4f0b-96ad-aee0d5f073e7";
	
	//echo $request;
	
	return getSource($request);
}