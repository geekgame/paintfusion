<?php
include("../_utils/lol.php");

$nom=$_GET['name'];
$pass=$_GET['pass'];

$number=rand();

$tournamentCode = new TournamentCode();
//$gameConfig = GameConfig::Get("Paintfusion", "motdepasse", "http://myServer.com/report.php", "gameTestID");
$gameConfig = GameConfig::Get($nom, $pass, "none", $number);
print $tournamentCode->Generate(
          TournamentCode::SUMMONERS_RIFT, // Summoners rift as map
          TournamentCode::BLIND_PICK, // Blind pick as picktype
          3, // 5 players in each team
          TournamentCode::SPEC_FRIENDS, // Allow only friends to spectate
          $gameConfig // Use the gameconfig we just created!
);