<?php

include("../_utils/connect.php");
session_start();
include 'check_admin.php';

$winner	= $_POST['winner'];
$loser	= $_POST['loser'];
$id_tournoi = $_POST['id_tournoi'];

//echo "winner : ".$winner." loser : ".$loser." id : ".$id_tournoi;
//echo "<br />";
$coresp = $pdo -> query('SELECT id_team FROM team_t WHERE nom_team="'.$winner.'" AND id_tournoi='.$id_tournoi );
$cor 	= $coresp -> fetch();
$id_winner = $cor['id_team'];
$info   = $pdo -> prepare('SELECT * FROM arbre_t WHERE id_team=:id_winner AND IDtournoi=:id_tournoi ORDER BY round DESC');
$info   -> bindParam(':id_winner',$id_winner,PDO::PARAM_INT);
$info   -> bindParam(':id_tournoi',$id_tournoi,PDO::PARAM_INT);
$info 	-> execute();
$tab    = $info ->fetch();
//print_r($tab);
$round	=	$tab['round'];
$ligne_w=	$tab['ligne'];
$id_team=	$tab['id_team'];

$info 	->closecursor();
$coresp ->closecursor();

$coresp = $pdo -> query('SELECT id_team FROM team_t WHERE nom_team="'.$loser.'" AND id_tournoi='.$id_tournoi );
$cor 	= $coresp -> fetch();
$id_loser = $cor['id_team'];
$info 	= $pdo -> prepare('SELECT * FROM arbre_t WHERE id_team = :id_loser AND IDtournoi =:id_tournoi AND round = :round');
$info   -> bindParam(':id_loser',$id_loser,PDO::PARAM_INT);
$info   -> bindParam(':id_tournoi',$id_tournoi,PDO::PARAM_INT);
$info   -> bindParam(':round',$round,PDO::PARAM_INT);
$info 	-> execute();
$tab 	= $info ->fetch();
$ligne_l=	$tab['ligne'];

$info 	->closecursor();
$coresp ->closecursor();

$ligne = max($ligne_l,$ligne_w);
$round = $round + 1 ;
//echo "id_tournoi : ".$id_tournoi." winner : ".$winner." round : ".$round." ligne : ".$ligne_w."id_team : ".$id_team." loser : ".$loser." ligne : ".$ligne_l;

$win =$pdo -> prepare('INSERT INTO arbre_t (id_team,IDtournoi,ligne,round) VALUES (:id_team,:id_tournoi,:ligne,:round)  ') ;
$win   	-> bindParam(':id_team'		,$id_team	,PDO::PARAM_INT);
$win   	-> bindParam(':id_tournoi'	,$id_tournoi,PDO::PARAM_INT);
$win   	-> bindParam(':ligne'		,$ligne 	,PDO::PARAM_INT);
$win 	-> bindParam(':round'		,$round		,PDO::PARAM_INT);
$win 	-> execute();

header("Location:FINIR.php?id_tournoi=$id_tournoi");
?>