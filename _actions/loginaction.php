<?php

include("../_utils/utils.php");
include("../_utils/connect.php");

if(!checkPostEntry("login") || !checkPostEntry("pw"))
{
	header("location:../login.php");
	exit;
}

$login = $_POST["login"];
$motdepasse = $_POST["pw"];

$sql = "SELECT * FROM joueur WHERE pseudoJoueur='".$login."' AND pass='".$motdepasse."'";

//Check si login existe
$req = $pdo->query($sql);

if($row = $req->fetch())
{
	session_start();
	$_SESSION["pseudo"] = $login;
	$_SESSION["idJoueur"] = $row["IDjoueur"];
	
	//Check si admin
    $sql = "SELECT * FROM joueur WHERE pseudoJoueur='".$_SESSION["pseudo"]."'";    
    $req = $pdo->query($sql);
    
    $row = $req->fetch();
    
    
    $_SESSION["admin"] = $row["admin"];
    //Fin check si admin
	header("location:../index.php");
}
else
{
	//Login incorrect
	header("location:../login.php");
	exit;
}

?>