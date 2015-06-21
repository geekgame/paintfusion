<?php
include '../_utils/connect.php';
session_start();
include 'check_admin.php';
$idt = $_GET['id_tournoi'];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>PaintFusion</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">
    </head>
    <body>


<!--##################### PARTIE LISTE INSCRIT ##################-->
<?php
$sql = $pdo -> query('SELECT id_joueur, poste, niveau,id_team FROM inscrit_t WHERE id_tournoi = '.$idt.' ORDER BY niveau ');
$req = $pdo -> prepare('SELECT pseudoJoueur,igPseudoJoueur FROM joueur WHERE IDjoueur =:id_joueur');

echo "<table>";
echo "  
		<th>n°</th>
		<th>niveau</th>
        <th>pseudo</th>
        <th>pseudo ig</th>
        <th>poste</th>
        <th>id_team</th>";
$i=0;

while ($tab = $sql->fetch ())
{
	$i ++;
   $req -> execute(array(':id_joueur' => $tab['id_joueur']) );
   $pseudo = $req ->fetch();

echo'   <th></th>
    <tr>
		<td>'.$i.'</td>
        <td>'.$tab["niveau"].'</td>
        <td>'.$pseudo["pseudoJoueur"].'</td>
        <td>'.$pseudo["igPseudoJoueur"].'</td>
        <td>'.$tab["poste"].'</td>
        <td>'.$tab["id_team"].'</td>
    </tr>';
}
echo "</table>";
?>
<br /><br />
<!--#############################################################-->


<form method = "post" action = "LANCER1.php">
<p> 
    <input type = "hidden" value = "<?php echo $idt ?>"  name= "id_tournoi" />
    <input type = "submit" value = "LANCER" />
</p>
</form>

	</body>
</html>