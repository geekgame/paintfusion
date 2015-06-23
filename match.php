<!doctype HTML>
<html>
	<head>
	</head>

<?php

include_once("_utils/connect.php");
include_once("_utils/transform.php");

$idt = $_GET["idt"];

//recuperer id game et encryptionKey

//trouver le nom du premier joueur de la première team.

//Sélectionner la première team

$sql = "SELECT nomTeam1, nomTeam2 FROM match_t WHERE IDMatch = '$_GET[idm]'";

$req = $pdo->query($sql);

if($row = $req->fetch())
{
	$nomTeam1 = $row["nomTeam1"];
	$nomTeam2 = $row["nomTeam2"];
}
else
die();

//recuperer l'id de la team 1
$sql = "select id_team from team_t where nom_team = '$nomTeam1' AND id_tournoi = '$idt'";
$req = $pdo->query($sql);
if($row = $req->fetch())
{
	$idTeam1 = $row["id_team"];
}
else
die();

//recuperer l'id de la team 2

$sql = "select id_team from team_t where nom_team = '$nomTeam2' AND id_tournoi = '$idt'";

$req = $pdo->query($sql);
if($row = $req->fetch())
{
	$idTeam2 = $row["id_team"];
}
else
die();

//recupérer l'id du premier joueur de cette team (on en profite pour tous les joeurs)

$sql = "select id_joueur from inscrit_t where id_tournoi = '$idt' and id_team = '$idTeam1'";
echo $sql;
$req = $pdo->query($sql);
$i = 0;
while($row = $req->fetch())
{
	$idJoueurT1[$i] = $row["id_joueur"];
	$i++;
}

$sql = "select id_joueur from inscrit_t where id_tournoi = '$idt' and id_team = '$idTeam2'";
echo $sql;
$req = $pdo->query($sql);
$i = 0;
while($row = $req->fetch())
{
	$idJoueurT2[$i] = $row["id_joueur"];
	$i++;
}

/*
echo "<pre>";
var_dump($idJoueurT1);
echo "</pre>";

echo "<pre>";
var_dump($idJoueurT2);
echo "</pre>";
*/



echo($_GET["idt"]."-".$_GET["idm"]);

$retour = '{
   "gameLength": -142,
   "gameMode": "CLASSIC",
   "mapId": 11,
   "bannedChampions": [
      {
         "pickTurn": 1,
         "championId": 119,
         "teamId": 100
      },
      {
         "pickTurn": 3,
         "championId": 39,
         "teamId": 100
      },
      {
         "pickTurn": 5,
         "championId": 127,
         "teamId": 100
      }
   ],
   "gameType": "CUSTOM_GAME",
   "gameId": 2165826460,
   "observers": {"encryptionKey": "BnRr8xIiav6aySyZoF9uk2WCsZK91Kft"},
   "gameStartTime": 1434987745857,
   "participants": [{
      "masteries": [
         {
            "rank": 4,
            "masteryId": 4112
         },
         {
            "rank": 1,
            "masteryId": 4114
         },
         {
            "rank": 3,
            "masteryId": 4122
         },
         {
            "rank": 1,
            "masteryId": 4124
         },
         {
            "rank": 1,
            "masteryId": 4132
         },
         {
            "rank": 3,
            "masteryId": 4134
         },
         {
            "rank": 3,
            "masteryId": 4142
         },
         {
            "rank": 1,
            "masteryId": 4151
         },
         {
            "rank": 3,
            "masteryId": 4152
         },
         {
            "rank": 1,
            "masteryId": 4162
         },
         {
            "rank": 1,
            "masteryId": 4211
         },
         {
            "rank": 2,
            "masteryId": 4212
         },
         {
            "rank": 2,
            "masteryId": 4213
         },
         {
            "rank": 3,
            "masteryId": 4222
         },
         {
            "rank": 1,
            "masteryId": 4232
         }
      ],
      "bot": false,
      "runes": [
         {
            "count": 9,
            "runeId": 5245
         },
         {
            "count": 5,
            "runeId": 5277
         },
         {
            "count": 4,
            "runeId": 5289
         },
         {
            "count": 9,
            "runeId": 5317
         },
         {
            "count": 3,
            "runeId": 5335
         }
      ],
      "spell2Id": 7,
      "profileIconId": 657,
      "summonerName": "Preaestiva",
      "championId": 24,
      "teamId": 100,
      "summonerId": 68378991,
      "spell1Id": 4
   }],
   "platformId": "EUW1"
}';

$var = json_decode($retour);

//echo "<pre>";
//print_r($var);
//echo "</pre>";

$gameID = $var->gameId;
$encryptionKey = $var->observers->encryptionKey;

//echo $gameID." ".$encryptionKey;


/*
$sql = "SELECT inscrit_t.id_joueur AS id_joueur FROM inscrit_t WHERE inscrit_t.id_tournoi = {idtournoi} AND (inscrit_t.id_team = {idteam1} OR inscrit_t.id_team = {idteam2})";
*/

?>

<a href="_utils/genererBatch.php?encryptionKey=<?php echo $encryptionKey ?>&matchId=<?php echo $gameID ?>">Spectate Game</a>