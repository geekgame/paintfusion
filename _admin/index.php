<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administration</title>
</head>

<body>
<?php
include("../_utils/connect.php");

session_start();
if(!isset($_SESSION["admin"]) || !$_SESSION["admin"])
{
	header("location:../index.php");
	exit;
}


if(isset($_GET["r"]) && $_GET["r"] == 1)
{
	echo "Le tournoi a bien été ajouté";
}

?>
<p><h1>Ajouter un nouveau tournoi</h1></p>
<form method="post" action="ajoutTournoi.php">
<input type="text" name="nt" /><br />
<input type="text" name="ppt" /><br />
<input type="date" name="dtt" /><br />
<button type="submit" name="add">creer tournoi</button>
</form>

</body>
</html>