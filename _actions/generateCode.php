<?php
include("../_utils/lol.php");

$tournamentCode = new TournamentCode();
//$gameConfig = GameConfig::Get("Paintfusion", "motdepasse", "http://myServer.com/report.php", "gameTestID");
$gameConfig = GameConfig::Get($_SESSION["_nom"], $pass, "none", $number);
$retour =  $tournamentCode->Generate(
          TournamentCode::SUMMONERS_RIFT, // Summoners rift as map
          TournamentCode::BLIND_PICK, // Blind pick as picktype
          3, // 5 players in each team
          TournamentCode::SPEC_FRIENDS, // Allow only friends to spectate
          $gameConfig // Use the gameconfig we just created!
);