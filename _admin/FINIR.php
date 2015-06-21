<?php
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

include("profil_tournoi.php");

include('arbre.php');

?>
<form method = "post" action = "creerMatch.php">
<p>

	<input type = "hidden" value = "<?php  echo $idt  ;?>" name = "id_tournoi"/>
	<label for = "winner">équipe vainqueur</label> : <input type = "text" name = "winner" id = "winner"/>
	<label for = "loser">équipe perdante</label> : <input type = "text" name = "loser" id = "loser"/>
	<input type = "submit" value = "clore le match" />
</p>
</form>

<form method = "post" action = "FINIR1.php">
<p> 
    <input type = "hidden" value = "<?php echo $idt ;?>"  name= "idt" />
    <input type = "submit" value = "FINIR LE TOURNOI" />
</p>
</form>


	</body>
</html>

