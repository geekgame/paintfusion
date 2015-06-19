<?php

$value = "LOL";
$value=file_get_contents("php://input");

$file="retour.txt";


file_put_contents($file,$value,FILE_APPEND);

?>