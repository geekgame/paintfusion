<?php
include '_utils/connect.php';
$sql = $pdo -> query('SELECT pseudo, poste, niveau,id_team FROM inscrit_t WHERE id_tournoi = '.$_POST["id_tournoi"].' ORDER BY niveau ');


echo "<table>";
echo "	<th>niveau</th>
		<th>pseudo</th>
		<th>poste</th>
		<th>id_team</th>";
while ($tab = $sql->fetch ())
{
echo'	<th></th>
	<tr>
		<td>'.$tab["niveau"].'</td>
		<td>'.$tab["pseudo"].'</td>
		<td>'.$tab["poste"].'</td>
		<td>'.$tab["id_team"].'</td>
	</tr>';
}
echo "</table>";
?>
