<?php
//necessite $_GET['id_joueur'] et/ou $_POST['id_joueur']
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

if(isset($_GET['id_joueur']))
{
	$id_joueur = $_GET['id_joueur'];
}
elseif (isset($_POST['id_joueur']) )
{
	$id_joueur = $_POST['id_joueur'];
}
else
{
	$id_joueur = 1;
	header('Location:index.php'	);
}
include("_utils/connect.php");
	
			$info = $pdo -> query('SELECT pseudoJoueur, igPseudoJoueur FROM joueur WHERE IDjoueur ="'.$id_joueur.'"');
			$info1 = $info -> fetch();
			$pseudo = $info1['pseudoJoueur'];
			$igPseudo = $info1['igPseudoJoueur'];
$summoner = $igPseudo;
include('./riotAPI/api.php');
	/*variable récupérée par l'API
				$id 	
				$img	
				$api_stat 	[$id]	
							["lp"]
							["division"]
							["tier"]
							["level"]
*/
?>

<!doctype HTML>
<html>
<!-- cette section affiche le pseudo du site(pseudoJoueur) et celui du jeu(igPseudoJoueur) de l'utilisateur et ll'icon associé à son compte LoL-->
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
<!-- affiche des variables récupérées par l'api -->
		<section class="niveau">		
			<?php
			$rank_logo = "images/LoL/".$api_stat["tier"]."_".$api_stat["division"];

				echo "lvl:".$api_stat["level"];
				echo "<br />";
				echo "<img src= ".$rank_logo.".png>";
				echo $api_stat["tier"]." ".$api_stat["division"]." ".$api_stat["lp"]."LP";
			?>
		</section>
		
<!-- ici l'utilisateur peut choisir d'afficher ses champion préféré parmis la liste -->
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
					'Janna','JarvanIV','Jax','Jayce','Jinx',
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
			echo '<img src="images/LoL/'.$champ1.'Square.png">';//affiche les iconnes des champions selectionnés
			echo '<img src="images/LoL/'.$champ2.'Square.png">';
			echo '<img src="images/LoL/'.$champ3.'Square.png">'; 
			?>
		</section>

<!-- ici le joueur peut écrire du texte -->
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

</html>
