<?php
	if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) //test si l'utilisateur est admin
	{
		echo "Try again";  
		header('Location:../index.php');//s'il ne l'est pas il est redirigé
		die();//pour qu'il n'ai pas accès à la page
	}
?>