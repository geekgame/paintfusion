<?php

// Fichier de sortie en batch
header('Content-Type: application/bat');

// Il sera nommé spectateur.bat
header('Content-Disposition: attachment; filename="spectateur.bat"');

readfile("batchParts/1.txt");
echo '@start "" "League of Legends.exe" "8394" "LoLLauncher.exe" "" "spectator spectator.euw1.lol.riotgames.com:80 '.$_GET["encryptionKey"]." ".$_GET["matchId"]." EUW1";
readfile("batchParts/2.txt");


//Cette page génère un fichier batch qui lance League Of Legends ainsi que la sélection du mode spectateur et lance automatiquement la bonne partie pour permettre aux non-joueurs d'assister au match.
?>