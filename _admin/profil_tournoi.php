
<!-- link href="styleProfil_tournoi.css" rel="stylesheet" type="text/css" media="all" -->

<?php
include ("check_admin.php");
$etat = $pdo -> query('SELECT etatTournoi FROM tournoi WHERE IDTournoi ='.$idt);
$tab_tournoi = $etat -> fetch();
$statut_tournoi =$tab_tournoi['etatTournoi'];


$sql1 = $pdo -> query(" SELECT id_joueur FROM inscrit_t WHERE id_tournoi=$idt ORDER BY id_team");
$sql  = $pdo -> query(" SELECT nom_team, id_team FROM team_t 	WHERE id_tournoi=$idt ");                            
$result=$pdo -> query(' SELECT COUNT(*) AS nb FROM team_t WHERE id_tournoi='.$idt);


$columns = $result->fetch();
$nb_team_bu = $columns['nb'];



$nb_team = $nb_team_bu;
// RECAP DES TEAMS
echo "<table  id= 'tableau' colspan = 3 >";

while ($nb_team>=1)
{
	echo "<tr>";
	$i=4;
	while ($i)
	{
		$info_team = $sql -> fetch();
		echo '	<th>';
		echo'	<FORM action="../profil_team.php?id='.$info_team["id_team"].'" method="post">
				<INPUT TYPE="submit"value="'.$info_team["nom_team"].'"></INPUT>
				</FORM>';
		echo'		</th>';
		$i --;
		$nb_team --;
	}
	echo "</tr>";
	$i=4;
	while ($i) 
	{
		echo "<td>";
		$compt = 0;
		while ($compt < 5) 
		{	
			$info_joueur= $sql1 -> fetch();
			$gertrude = $pdo -> query('SELECT pseudoJoueur, igPseudoJoueur FROM joueur WHERE IDJoueur="'.$info_joueur['id_joueur'].'"');
			$info_nom = $gertrude ->fetch();
			echo '	<form action="../profil_joueur.php" method="post">
			<input type= "hidden" 	value = "'.$info_joueur["id_joueur"].'" 	name = "id_joueur"		/>
			<input type="submit"  value=" '.$info_nom["pseudoJoueur"].'  ig:'.$info_nom["igPseudoJoueur"].' "/>
			</form>';
			$compt ++;
		}
		$i --;
		echo "</td>";
	}
}
echo "</table >";

echo "<br/><br/><br/>";


?>