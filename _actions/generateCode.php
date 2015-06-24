<?php
include("../_utils/lol.php");

$tournamentCode = new TournamentCode();
$gameConfig = GameConfig::Get($_SESSION["_nom"], $pass, "none", $number);
$retour =  $tournamentCode->Generate(
          TournamentCode::SUMMONERS_RIFT,
          TournamentCode::BLIND_PICK,
          3,
          TournamentCode::SPEC_FRIENDS,
          $gameConfig
);