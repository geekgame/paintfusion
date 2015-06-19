<?php
session_start();
include("utils/utils.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bienvenue sur Paintfusion</title>
<link href="style/styleindex.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="header"><p class="headerText"><red>PF</red>    <?php include("_includes/header.php"); ?></p></div>

<div class="bd">
  <img alt="background" id="background" src="images/greyBg.jpg" />
  <img alt="character" id="shiroe" src="images/lhs.png" />
  <img alt="gogo" id="go" src="images/go.png" />
  <p class="title">PAINT<br />FUSION</p>
  <p class="citation">2 0 1 5  - VIDEOGAMES TOURNAMENT</p>
  <p class="title1">1) Inscrivez-vous sur paintfusion</p>
  <p class="text1">L’inscription est gratuite et se fait en quelques<br />minutes. Dès la confirmation de votre addresse<br />mail, vous êtes prêt pour vous lancer !</p>
  <p class="title2">2) Rejoignez une team et c’est parti</p>
  <p class="text2">Dès lors que vous avez un compte, vous êtes libre<br />de rejoindre une team ou de jouer un tournoi en tant<br />que joueur solo. Êtes-vous prêt à devenir une légende ?</p>
  <p class="register"><a href="register.php">inscription >></a><br /><a href="login.php">connexion >></a></p>
</div>
<div class="footer">
<p>CONNEXION | INSCRIPTION | QU'EST-CE QUE PF | A PROPOS | CONTACT</p>
<p class="footerLight"><a href="dons.php">Cliquez ici pour la meilleure page du monde</a></p>
<p>IG2I PAINTFUSION (paintfusion.ig2i.fr)</p>
<p>Centrale Lille / IG2I Lens, Mini projet multimedia, 2015</p>
</div>
</body>
</html>