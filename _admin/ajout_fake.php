<?php
//cette page a besion de :$_POST["nom_team"] , $_POST["id_tournoi"] 
//cette page ajoute une fausse équipe au gré de l'admin
include '../_utils/connect.php';
session_start();
include 'check_admin.php';


    
 //   $place      = $_POST["place_team"]; 
    $nom_team   = $_POST["nom_team"];
    $idt        = $_POST["id_tournoi"];

//recuperation du nombre d'équipe 
    $req = "SELECT COUNT(*) AS nb FROM team_t WHERE id_tournoi= $idt ";                              
    $result = $pdo->query($req);
    $columns = $result->fetch();
    $nb_team = $columns['nb'];


//  echo "<br />";
//AJOUT DE FAKE TEAM

    //recuperation des donnée depuis le site :


    //deplacement de la team précédente
 

//!!!!!!!!!!!!!
// A COMPLETER !!!!!!!!!!!
//!!!!!!!!!!!
//    $depl_team = $pdo -> prepare("UPDATE team_t SET IDteam_t = :placeA WHERE IDteam = :placeZ AND id_tournoi = :idt");
//    $depl_team -> execute(array('placeA' => $nb_team+1,'placeZ' => $place, 'idt' => $idt) ); 



//création de équipes dans la bdd
$place = $nb_team+1;
$ajout_fake = $pdo -> query("INSERT INTO team_t (id_team, nom_team,id_tournoi) VALUES ('$place', '$nom_team', '$idt' )");
?>
<!--  button pour retourner valider l'ajout-->
 <form method = "post" action = "LANCER1.php"> 
    <p> 
        <input type = "hidden" value = "<?php echo $idt ?>"  name= "id_tournoi" />
        <input type = "submit" value = "LANCER" />
    </p>
</form>
