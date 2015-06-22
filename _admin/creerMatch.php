<?php

include("../_utils/utils.php");
include("../_utils/connect.php");

$winner	= $_GET['winner'];
$loser	= $_GET['loser'];
$id_tournoi = $_GET['id_tournoi'];

//nous utilisons winner et loser comme "team1" et "team2"

$pass = "ekvblkevlevi5erb5r6gt5b";
$number = rand();

include_once("../_utils/lol.php");

$tournamentCode = new TournamentCode();
//$gameConfig = GameConfig::Get("Paintfusion", "motdepasse", "http://myServer.com/report.php", "gameTestID");
$gameConfig = GameConfig::Get($winner." vs ".$loser, $pass, "none", $number);
$retour =  $tournamentCode->Generate(
          TournamentCode::SUMMONERS_RIFT, // Summoners rift as map
          TournamentCode::TOURNAMENT_DRAFT, // Blind pick as picktype
          3, // 5 players in each team
          TournamentCode::SPEC_ALL, // Allow only friends to spectate
          $gameConfig // Use the gameconfig we just created!
);

echo $retour;

//include_once("../_actions/generateCode.php");

$sql = "INSERT INTO `paintfusion`.`match_t` (`IDTournoi`, `nomTeam1`, `nomTeam2`, `codeMatch`) VALUES ('$id_tournoi', '$winner', '$loser', '$retour')";
	 
	 $req = $pdo->query($sql);
	 
	 header("location:index.php");