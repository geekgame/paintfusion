<?php
session_start();
include("_utils/utils.php");
include("_utils/connect.php");

if(isset($_GET["idt"]))
{
	$idt = $_GET["idt"];
}
else
{
	//header("location:index.php");
	//exit;//pas d'id tournoi, la page ne sert à rien
	$idt=1;
}

//Définir l'étât du visiteur de la page
if(!isset($_SESSION["pseudo"]))//non connecté
{
	$state = "nope";//Spectateur du tournoi
}
else
{
	$sql = "SELECT id_joueur FROM inscrit_t WHERE id_tournoi=".$idt." AND id_joueur=".$_SESSION["idJoueur"];
	$req = $pdo->query($sql);
	if($row = $req->fetch())
	{
		$state = "player";
	}
	else
	{
		$state = "spec";
	}
}

//Définir l'étât du tournoi visité
$sql = "SELECT * FROM tournoi WHERE IDTournoi=".$idt;
$req = $pdo->query($sql);
if($row = $req->fetch())
{
	$ok = true;
	$nomTournoi = $row["NomTournoi"];
	$prizePoolTournoi = $row["PrizePoolTournoi"];
	$dateTournoi = $row["DateTournoi"];
	$etatTournoi = $row["etatTournoi"];
}
else
{
	echo "non";
	//header("location:index.php");
	//exit;
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Details Tournoi</title>
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" type="text/css" href="style/tiles.css">

<!-- Bootstrap -->
            <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">            
            <!-- Main Style -->
            <link rel="stylesheet" type="text/css" href="style/tableauMatchs.css">
            <!--Icon Fonts-->
            <!--<link rel="stylesheet" media="screen" href="assets/fonts/font-awesome/font-awesome.min.css" />-->
</head>
<body>
<?php //<div class="header"><p class="headerText"><red>PF</red>    include("_includes/header.php"); ?></p></div>
<div class="Middle">
<h1><?php echo $nomTournoi ?></h1></p>
<?php

if($etatTournoi == 1)//si le tournoi a pas encore commencé
{
	if($state == "spec")
	{
		echo '<form id="green" method="post" action="_actions/inscriptionTournoi.php"><p>Poste préféré : <select name="poste"><option value="Top">Top</option>									<option value="Mid">Mid</option><Option value="Jungle">Jungle</Option><option value="ADC">ADC</option><option value="Sup">Support</option></select></p>';
		echo '<p><input type="hidden" name="idt" value="'.$idt.'"><input name="do" type="submit" value="Inscription"/></form></p>';
	}
	else if($state == "player")
		echo '<p><form id="red" method="post" action="_actions/inscriptionTournoi.php"><input type="hidden" name="idt" value="'.$idt.'"><input name="do" type="submit" 		value="Desinscription"/></form></p>';
	else
		echo '<p><form id="red" action="register.php"><input type="submit" value="Connexion/Inscription" /></form></p>';

	include ('inscrit.php');

}
else if($etatTournoi == 2)
{
	?>
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
    </div>
    <div class="content">
    <br /><br /><br /><br /><br />
    <h2>Matchs en cours :</h2>
    	<?php
		//afficher la liste des matchs en cours pour ce tournoi
		$sql = "SELECT IDMatch, nomTeam1, nomTeam2 FROM match_t WHERE IDTournoi = '$idt'";
        
				?>
		<section id="pricing-table">
            <div class="container">
                <div class="row">
                    <div class="pricing">
                    <!-- -->
                    
                    <?php
					
					$exists = false;
					
					$req = $pdo->query($sql);
					while($row = $req->fetch())
					{   
					$exists = true;                 
                    ?>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="pricing-table">
                                <div class="pricing-header">
                                    <p class="pricing-title">En cours</p>
                                    <p class="pricing-rate"><span><?php echo $row["nomTeam1"] ?></span> VS <span><?php echo $row["nomTeam2"] ?></span></p>
                                    <a href="match.php?idm=<?php echo $row["IDMatch"]."&idt=$idt" ?>" class="btn btn-custom">Accéder aux détails</a>
                                </div>
                            </div>
                        </div>
					<?php
					}
					
					if(!$exists)
					 echo "<h2>Aucun actuellement.</h2>";
					?>
						
                    </div>
                </div>
            </div>
        </section>
        

		<section class= "recap_team">
			<?php
			include ('profil_tournoi.php');
			?>
		</section>
		<section class="arbre">
			<?php
			include ('arbre.php');
			?>			
		</section>

		
    </div>    
        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ -->
   
    <?php
}
elseif ($etatTournoi==3 ) 
{		
	$winner = $pdo -> query('SELECT id_team FROM arbre_t ORDER BY round DESC');
	$zed = $winner -> fetch();
	$ahri = $pdo -> query('SELECT nom_team FROM team_t WHERE id_team='.$zed['0'].' AND id_tournoi ='.$idt);
	$win = $ahri -> fetch();
	echo "<div>";
		echo "Le vaiqueur est ".$win['0'];
	echo "</div>";
	echo '<section class="arbre">';
		include ('arbre.php');
	echo '</section>';
	echo "<br />";
	echo '<section class="recap_team">';
		include ('profil_tournoi.php');
	echo '</section>';

	echo "<div>";
		echo "INFO: Les récompenses n'ont pas encore été distribuées";
	echo "</div>";

}
elseif ($etatTournoi==4) 
{
	echo '<section class="arbre">';
		include ('arbre.php');		
	echo '</section>';
	echo "<br />";
	echo '<section class="recap_team">';
		include ('profil_tournoi.php');
	echo '</section>';
}
else 
	{	header('Location:index.php'	);	}

?>
</div>
</body>
</html>

<?php

function nomTeamFromID($idteam,$pdo)
{
	echo "SELECT 'nom_team' FROM 'team_t' WHERE 'IDteam_t' = '$idteam'";
	$sql = "SELECT 'nom_team' FROM 'team_t' WHERE 'IDteam_t' = '$idteam'";
	
	$req = $pdo->query($sql);
	if($row = $req->fetch())
		return $row["nom_team"];
	return false;
}
?>