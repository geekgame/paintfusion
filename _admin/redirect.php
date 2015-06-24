<?php
//c'est just une page qui sert à rediriger vert les bonnes page
//elle à besoin de $_POST['etat_tournoi'] , $_POST['id_tournoi'],
session_start();
$idt = $_POST['id_tournoi'];
$etat_tournoi = $_POST['etat_tournoi'];
include("../_utils/connect.php");
include 'check_admin.php';
//$sql = $pdo -> query ("SELECT etatTournoi FROM tournoi WHERE IDTournoi=".$idt);‏
//$etat_tournoi= $sql['etatTournoi'];

//$etat_tournoi = 1;
if ($etat_tournoi==4) { header("Location: DEMARER.php?id_tournoi=$idt")	;

//INSERER ICI DEMARER.HTML

}
elseif ($etat_tournoi==1) {	header("Location: LANCER.php?id_tournoi=$idt");

//INSERER ICI LANCER.HTML
}
elseif ($etat_tournoi==2) {	header("Location:FINIR.php?id_tournoi=$idt");

//INSERER ICI FINIR.HTML
}
elseif ($etat_tournoi==3) { header("Location:ARCHIVER.php?id_tournoi=$idt");

//INSERER ICI ARCHIVER.HTML
}
else{
	header('Location:accueil_admin.php'		);
	die();
}
?>