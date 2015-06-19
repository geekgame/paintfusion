<?php
session_start();

if(isset($_GET["idt"]))
	$idt = "tournoi.php?idt=".$_GET["idt"];
	else
	$idt = "_includes/listTournois.php";

?>
<!doctype HTML>
<html>
<head>
<link href="style/styleDashboard.css" rel="stylesheet" type="text/css">
<link href="style/tiles.css" rel="stylesheet" type="text/css">
<title>Administration user</title>
</head>

<body>
<div class="header"><p class="headerText"><red>PF</red>    <?php include("_includes/header.php"); ?></p></div>
<?php
if(!isset($_SESSION['pseudo']))
{
	echo $_SESSION["pseudo"];
	header("location:login.php");
	exit;
}
?>
<div class="leftpanel">
<div class="name"><red>PF</red> <?php

//Afficher logo "SU" si utilisateur est admin
echo("<a href='user_dashboard.php'>".$_SESSION["pseudo"]."</a>");
if($_SESSION["admin"] == 1)
echo(' <img src="images/Rounded_Rectangle_1.png" />')
?>

<div class="disconnect"><a href="disconnect.php">Deconnexion</a><br /><p><red>Notifications</red></p></div>
<div class="tournois">
<p><titre>Tournois en cours</titre><?php
//récupérer la liste des tournois en cours
include("_utils/connect.php");
$sql="SELECT * FROM tournoi where etatTournoi = 2";//etatTournoi = 2 <=> tournoi en cours
$req = $pdo->query($sql);
while($row = $req->fetch())
    {
        echo"<br />   <a href='user_dashboard.php?idt=".$row['IDTournoi']."'>-> ".$row["NomTournoi"]."</a>";//pour décaler, on ne peut pas utiliser des espaces. Alt+255 marche par contre.
    }
?></p>
</div>
</div>
</div>
<div class="middle">
<div><title>Liste des tournois : </title></div>
<?php //include("_includes/listTournois.php"); ?>
<iframe src="<?php echo($idt); ?>" id="frame" scrolling="no" frameborder="0" style="height: 100%; width: 100%"></iframe>
</div>
</body>
</html>