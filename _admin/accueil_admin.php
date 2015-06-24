<?php
//cette page n'a pas besoin de get ou de post ou d'autre variables défini en dehors de la page

// cette page sert de page d'acceuil pour l'administration des tournois
//pour cette page il manque le html et le css
include("../_utils/connect.php");	//connection a la bdd
session_start();					//pour avoir accès au variables de session
include 'check_admin.php';			//securité pour que l'utilisateur lambda ne puisse pas acceder à cette page
?>
<!doctype HTML>
<html>
<head>
	<title>liste tournois</title>	
</head>
<body>
	<?php 
		//recupération des tournois
		$sql = ('SELECT IDTournoi, NomTournoi,DateTournoi,etatTournoi FROM tournoi WHERE etatTournoi <> 4 '); 			
		$req = $pdo->query($sql);
		//affichage des tournois
		while ($tournoi = $req -> fetch() )
		{
			?> 
			<p>	
			<form method = "post" action = "redirect.php">
				<input type= "hidden" 	value = "<?php 	echo $tournoi['IDTournoi'] 	;?>" 	name = "id_tournoi"		/>
				<input type= "hidden" 	value = "<?php 	echo $tournoi['etatTournoi'];?>" 	name = "etat_tournoi"	/>
				<input type="submit"	value = "<?php 	echo $tournoi['NomTournoi'] ;
														echo ' etat= ';
														//echo $tournoi['DateTournoi'];
														//echo "<br />";
														echo $tournoi['etatTournoi'] ;?>"							/>
			</form>
			<?php
		}
	?>
	<!-- button pour créer un nouveau tournoi -->
	<form method = "post" action = "redirect.php">
		<input type= "hidden" 	value = "0" 	name = "id_tournoi"		/>
		<input type= "hidden" 	value = "4" 	name = "etat_tournoi"	/>
		<input type="submit"	value = "nouveau tournoi"				/>
	</form>
</body>
</html>