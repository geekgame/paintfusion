<?php

// Vous voulez afficher un pdf
header('Content-Type: application/bat');

// Il sera nommé spectateur.bat
header('Content-Disposition: attachment; filename="spectateur.bat"');

readfile("batchParts/1.txt");
echo '@start "" "League of Legends.exe" "8394" "LoLLauncher.exe" "" "spectator spectator.euw1.lol.riotgames.com:80 '.$_POST["encryptionKey"]." ".$_POST["matchId"]." EUW1";
readfile("batchParts/2.txt");



?>