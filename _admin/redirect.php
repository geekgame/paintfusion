<?php
$idt = $_POST['id_tournoi'];
$etat_tournoi = $_POST['etat_tournoi'];
//$sql = $pdo -> query ("SELECT etatTournoi FROM tournoi WHERE IDTournoi=".$idt);‏
//$etat_tournoi= $sql['etatTournoi'];

//$etat_tournoi = 1;
if ($etat_tournoi==4) { header("Location: DEMARER.php?id_tournoi=$idt")	; // mettre $idt	

//INSERER ICI DEMARER.HTML

}
elseif ($etat_tournoi==1) {  header("Location: LANCER.php?id_tournoi=$idt");

//INSERER ICI LANCER.HTML
}
elseif ($etat_tournoi==2) { // header('Location:FINIR.php'		);  	mettre $idt

//INSERER ICI FINIR.HTML
}
elseif ($etat_tournoi==3) { // header('Location:ARCHIVER.php'	);  	mettre $idt

//INSERER ICI ARCHIVER.HTML
}
else{
	header('Location:../index.php'		);
	die();
}
?>