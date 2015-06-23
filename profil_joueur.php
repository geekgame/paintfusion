<?php
session_start();
$nombre_de_champions  = 125;//donc 121 champions
/*
session_start();

if(isset($_GET["idt"]))
	$idt = "tournoi.php?idt=".$_GET["idt"];
	else
	$idt = "_includes/listTournois.php";
*/
//$id_joueur = 3;
$id_joueur = $_POST['id_joueur'];
include("_utils/connect.php");
	
			$info = $pdo -> query('SELECT pseudoJoueur, igPseudoJoueur FROM joueur WHERE IDjoueur ="'.$id_joueur.'"');
			$info1 = $info -> fetch();
			$pseudo = $info1['pseudoJoueur'];
			$igPseudo = $info1['igPseudoJoueur'];
$summoner = $igPseudo;
include('./riotAPI/api.php');
	/*variable:	$id 	l:118
	$img	l:121
	$api_stat[$id]	["lp"]
	["division"]
	["tier"]
	["level"]
*/
?>

<!doctype HTML>
<html>
	<head>
        <meta charset="utf-8" />
		<title>profil_joueur</title>
	</head>

	<body>



		<header >
			<p class="headerText"><red>PF</red>
			<?php include("_includes/header.php"); ?></p>
		</header>

		<section class="identifiants">
			<?php 
			echo "<p>";
			echo $pseudo;
			echo "<br />";
			echo $igPseudo;
			echo "</p>";
			
				echo "<img src= ".$img.">";
				echo "<br />";
				echo "<br />";

			?>
		</section>

		<section class="niveau">		
			<?php
			$rank_logo = "images/LoL/".$api_stat["tier"]."_".$api_stat["division"];

				echo "lvl:".$api_stat["level"];
				echo "<br />";
				echo "<img src= ".$rank_logo.".png>";
				echo $api_stat["tier"]." ".$api_stat["division"]." ".$api_stat["lp"]."LP";
			?>
		</section>
		
		<section class="champions">
  			<?php
			$lol_champ = array('Unknown',
					'Aatrox','Ahri','Akali','Alistar','Amumu','Anivia','Annie','Ashe','Azir',
					'Bard','Blitzcrank','Brand','Braum',
					'Caitlyn','Cassiopeia','ChoGath','Corki',
					'Darius','Diana','Draven','DrMundo',
					'Ekko','Elise','Evelynn','Ezreal',
					'Fiddlesticks','Fiora','Fizz',
					'Galio','Gankplank','Garen','Gnar','Gragas','Graves',
					'Hecarim','Heimerdinger',
					'Irelia',
					'Janna','JarvanIV','Jax',
					'Jayce','Jinx',
					'Kalista','Karma','Karthus','Kassadin','Katarina','Kayle','Kennen','KhaZix','KogMaw',
					'LeBlanc','LeeSin','Leona' ,'Lissandra','Lucian','Lulu','Lux',
					'Malphite','Malzahar','Maokai','MasterYi','MissFortune','Mordekaiser','Morgana',
					'Nami','Nasus','Nautilus','Nidalee','Nocturne','Nunu',
					'Olaf','Orianna',
					'Pantheon','Poppy',
					'Quinn',
					'Rammus',"Rek'Sai",'Renekton','Rengar','Riven','Rumble','Ryze',
					'Sejuani','Shaco','Shen','Shyvana','Singed','Sion','Sivir','Skarner','Sona','Soraka','Swain','Syndra',
					'Talon','Taric','Teemo','Thresh','Tristana','Trundle','Tryndamere','TwistedFate','Twitch',
					'Udyr','Urgot',
					'Varus','Vayne','Veigar',"Vel'Koz",'Viktor','Vi','Vladimir','Volibear',
					'Warwick','Wukong',
					'Xerath','Xinzhao',
					'Yasuo','Yorick',
					'Zac','Zed','Ziggs','Zilean','Zyra');
					$nb_champ = $nombre_de_champions; //donc 121 champ		

			if (isset($_POST['champ1']) ) 
			{
				$Rumble = $pdo -> query('UPDATE joueur SET champ1 = "'.$_POST['champ1'].'", champ2 = "'.$_POST['champ2'].'", champ3 = "'.$_POST['champ3'].'"  WHERE IDjoueur='.$id_joueur);
			}

			$Riven= $pdo -> query('SELECT champ1,champ2,champ3 FROM joueur WHERE IDjoueur="'.$id_joueur.'" ');
			$Azir=$Riven->fetch();
			$champ1 = $Azir['0'];
			$champ2 = $Azir['1'];
			$champ3 = $Azir['2'];
			if ($_SESSION['pseudo']==$pseudo) 
			{
				?>
				<form method="post" action="profil_joueur.php">
					<label for="champ1"></label>
					<select name="champ1" id="champ1">
						
						<?php
						echo  '<option value="'.$champ1.'" SELECTED>'.$champ1.'</option>' ;
						while ($nb_champ)
						{
							echo  '<option value="'.$lol_champ[$nb_champ].'">'.$lol_champ[$nb_champ].'</option>' ;
							$nb_champ --;
						}
						?>	
					</select>
					<br />
					<select name="champ2" id="champ2">
						<?php
						$nb_champ = $nombre_de_champions;
						echo  '<option value="'.$champ2.'" SELECTED>'.$champ2.'</option>' ;
						while ($nb_champ)
						{
							echo  '<option value="'.$lol_champ[$nb_champ].'">'.$lol_champ[$nb_champ].'</option>' ;
							$nb_champ --;
						}
						?>	
					</select>
					<br />
					<select name="champ3" id="champ3">
						<?php
						$nb_champ = $nombre_de_champions;
						echo  '<option value="'.$champ3.'" SELECTED>'.$champ3.'</option>' ;
						while ($nb_champ)
						{
							echo  '<option value="'.$lol_champ[$nb_champ].'">'.$lol_champ[$nb_champ].'</option>' ;
							$nb_champ --;
						}
						?>	
					</select>
					<input type= "hidden" 	value = "<?php echo $id_joueur; ?>" 	name = "id_joueur"		/>

					<INPUT TYPE="submit"value="Actualiser"></INPUT>
				</form>
				<?php 
			}
			echo '<img src="images/LoL/'.$champ1.'Square.png">';
			echo '<img src="images/LoL/'.$champ2.'Square.png">';
			echo '<img src="images/LoL/'.$champ3.'Square.png">'; 
			?>
		</section>

		<section class="description">
			<?php
				if (isset($_POST['description']) ) 
				{
					$UP_desc = $pdo -> query('UPDATE joueur SET description = "'.$_POST['description'].'" WHERE IDjoueur='.$id_joueur);
				}

				$descr = $pdo ->query('SELECT description FROM joueur WHERE IDjoueur ="'.$id_joueur.'"');
				$descrip= $descr -> fetch();
				$description = $descrip['description'];
				if ($_SESSION['pseudo']==$pseudo) 
				{	
				?>
					<form id="description" action ="profil_joueur.php" method="post">
						<label for="description">Description</label>
						<br />
						<textarea name="description" id ="description" rows="10" cols="35">
							<?php echo $description; ?>
						</textarea>
						<input type= "hidden" 	value = "<?php echo $id_joueur; ?>" 	name = "id_joueur"		/>
						<INPUT TYPE="submit"value="Ajouter"></INPUT>
					</form>
					<?php
				}
				else
				{
					echo "<p>".$description."</p>";
				}

				?>

		</section>	

	</form>
</body>
</html>
