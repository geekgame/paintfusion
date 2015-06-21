<?php
if(!isset($_SESSION['admin']) || $_SESSION['admin'] != 1)
{
		echo "Try again";  
header('Location:../index.php'		);
die();
}

?>