<?php


$sql = "INSERT INTO tournoi
	( 
		NomTournoi,	
		PrizePoolTournoi,	
		DateTournoi,	
		etatTournoi
	)
VALUES
	( 
		'".$_POST["nt"]."',	
		'".$_POST["ppt"]."',	
		'".$_POST["dtt"]."',	
		1
	 )";
	 
$req = $pdo->query($sql);
	if($row = $req->fetch())
	{
		header("location:index.php?r=1");
	}


?>