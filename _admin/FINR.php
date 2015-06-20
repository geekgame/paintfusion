<?php
include ("connect.php");
$idt = $_POST['idt'];
$sql = $pdo -> query("UPDATE etatTournoi FROM tournoi SET etatTournoi=3 WHERE IDTournoi=".$idt);
header('Location:ARCHIVER.php'	);  	
?>