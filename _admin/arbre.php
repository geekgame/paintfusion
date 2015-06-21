<?php

include("../_utils/connect.php");
session_start();
include 'check_admin.php';

$result=$pdo -> query(' SELECT COUNT(*) AS nb FROM team_t WHERE id_tournoi='.$idt);
$columns = $result->fetch();
$nb_team = $columns['nb'];
$id_tournoi = $idt;
$req = $pdo->query("SELECT id_team,round,ligne FROM arbre_t WHERE IDtournoi=".$id_tournoi." ORDER BY ligne,round");
$trol=$req->fetch();
$nb_round = log($nb_team)/log(2) ;
$round = 0;
$ligne =0;
$nb_ligne = $nb_team;
$id_team=$trol['id_team'];
$id_teamA=0;
$id_teamB = 0;


//ARBRE
echo "<table id= 'arbre' >";
	while ($ligne<$nb_ligne) 
	{
		$ligne++;
		$round = 0;
		echo "<tr>";
		$rows=$round;
		while ($round<=$nb_round)
		{
			$round++;
			echo "<td >";
			if ($trol['round'] == $round && $trol['ligne'] == $ligne )
			{
				$gertrude = $pdo -> query('SELECT nom_team FROM team_t WHERE id_team='.$trol["id_team"].' AND id_tournoi='.$idt);
				$info_nom = $gertrude ->fetch();
				echo '	<form action="current_match.php?id='.$id_teamA.' " methode="post">
					<input type="submit"  value=" '.$info_nom['nom_team'].' "/>
					<input type="hidden" name='.$id_teamB.' value="valeur" />
					</form>';
				//echo " round : ".$round." ligne : ". $ligne." id_tournoi : ". $id_tournoi." id_team :". $id_team." nom team : ". $nom_team ;
				$trol=$req->fetch();
			}
			echo "</td>";			
			$rows=$rows*2;
		}
		echo "</tr>";
	}
echo "</table>";



?>






</body>
</html>

