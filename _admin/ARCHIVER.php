<?php
//sur cette page il faut avoir avoir defini $_GET['id_tournoi'];
    include '../_utils/connect.php';
    session_start();
	include 'check_admin.php';
?>


<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PaintFusion</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">
    </head>
    <body>
		<?php
			$idt = $_GET['id_tournoi'];
			include("../profil_tournoi.php");
			include("../arbre.php");
		?>
		<form method = "post" action = "ARCHIVER1.php">
		<p> 
		    <input type = "submit" value = "ARCHIVER" />
		    <input type = "hidden" value = "<?php echo $idt ;?>"  name= "idt" />
		</p>
		</form>
	</body>
</html>