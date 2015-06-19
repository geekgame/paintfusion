<?php

if(isset($_SESSION["pseudo"]))
{
	echo(" Bonjour ".$_SESSION['pseudo']." <a href='user_dashboard.php'>[Mon compte]</a>    <a href='disconnect.php'>[Déconnexion]</a>");
	
	if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1)
	{
		echo(" <a href='_admin/index.php'>[ADMINISTRATION]</a>");
	}
}


?>