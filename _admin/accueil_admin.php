<?php
include("../_utils/connect.php");
session_start();
include 'check_admin.php';
?>

<!doctype HTML>
<html>
<head>
<title>liste tournois</title>
</head>

<body>
<?php 
$sql = ('SELECT IDTournoi, NomTournoi,DateTournoi,etatTournoi FROM tournoi WHERE etatTournoi <> 4 ');
$req = $pdo->query($sql);
while ($tournoi = $req -> fetch() )
{
	?> 
	<p>	
	<form method = "post" action = "redirect.php">
		<input type= "hidden" 	value = "<?php 	echo $tournoi['IDTournoi'] 	;?>" 	name = "id_tournoi"		/>
		<input type= "hidden" 	value = "<?php 	echo $tournoi['etatTournoi'];?>" 	name = "etat_tournoi"	/>
		<input type="submit"	value = "<?php 	echo $tournoi['NomTournoi'] ;
												echo ' etat= ';
//												echo $tournoi['DateTournoi'];
//												echo "<br />";
												echo $tournoi['etatTournoi'] ;?>"							/>
	</form>
	<?php
}
?>

	<form method = "post" action = "redirect.php">
		<input type= "hidden" 	value = "0" 	name = "id_tournoi"		/>
		<input type= "hidden" 	value = "4" 	name = "etat_tournoi"	/>
		<input type="submit"	value = "nouveau tournoi"							/>
	</form>


</body>
</html>