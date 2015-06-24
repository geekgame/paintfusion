<?php

//Remplir la page retour.php lorsque l'API de Riot renvoie les résultats d'un match.

$value = "LOL";
$value=file_get_contents("php://input");

$file="retour.txt";


file_put_contents($file,$value,FILE_APPEND);

?>