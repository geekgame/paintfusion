<?php
include("../_utils/utils.php");
include("../_utils/connect.php");

if(!checkPostEntry("login") || !checkPostEntry("iglogin") || !checkPostEntry("pass") || !checkPostEntry("email"))
	{
		//Manque d'informations ou infos vides.
		header("location:../register.php");
		exit;
	}
	
	if($_POST["pass"] != $_POST["pass2"])
	{
		//les mots de passe ne correspondent pas
		header("location:../register.php");
		exit;
	}
	
	$login = $_POST["login"];
	$iglogin = $_POST["iglogin"];
	$motdepasse = $_POST["pass"];
	
	//Requete d'inscription :
	$sql = "INSERT INTO joueur
	(
		pseudoJoueur,	
		igPseudoJoueur,	
		pass,	
		banned,	
		admin,	
		connected
	)
VALUES
	(
		'$login',	
		'$iglogin',	
		'$motdepasse',	
		0,	
		0,	
		0
	 )";
	 
	 $nb = $pdo->exec($sql);
	 
	if($nb == 1)
    	header("location:../index.php");
	else
    	echo("Problème avec la base de données.");
?>