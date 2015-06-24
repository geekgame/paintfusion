<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>PaintFusion</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">
            <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>

    	<?php
    		include("fonctions_team.php");
    		nom_team($_SESSION["idteam"]);
    		slogan($_SESSION["idteam"]);
    	?>

    	<strong>COMPOSITION</strong>

    	<?php
    		mid($_SESSION["idteam"]);
    		top($_SESSION["idteam"]);
    		jungle($_SESSION["idteam"]);
    		adc($_SESSION["idteam"]);
    		support($_SESSION["idteam"]);
    	?>

    	



    </body></html>