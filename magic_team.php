<?php

$idt = 1;

include '_utils/connect.php';

// calcul du nombre de premade
    $sql = 'SELECT id_team FROM inscrit_t WHERE id_team IS NOT NULL GROUP BY id_team ORDER BY id_team DESC';                              
    $premade = $pdo->query($sql);
    $columns = $premade->fetch();
    $nb_premade = $columns['id_team'];


//echo "<br />";

//calcul du nombre de team

    $sql = 'SELECT COUNT(*) AS nb FROM inscrit_t';                              
    $result = $pdo->query($sql);
    $columns = $result->fetch();
    $nb_inscrit = $columns['nb'];
    $nb_inscrit = $nb_inscrit - $nb_inscrit%5 ;
    $nb_team = $nb_inscrit/5 -$nb_premade;
    
 // echo 'Il y a '.$nb_inscrit.' inscrit(s) et '.$nb_team.' team(s)';


//echo "nb_premade : ".$nb_premade."nb team".$nb_team;
try {//suppression de team_t
    $pdo->query('DROP TABLE team_t');

    } catch(Exception $e) {
        echo 'Erreur PDO : '.$e->getMessage();
    } 



try {//création de team_t
  
   $pdo->query('CREATE TABLE team_t
    (
        id_team     INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        nom_team    VARCHAR(32) NOT NULL DEFAULT "Sans_nom",
        Top         TINYINT(1) NULL DEFAULT NULL,
        Jungle      TINYINT(1) NULL DEFAULT NULL,
        Mid         TINYINT(1) NULL DEFAULT NULL,
        ADC         TINYINT(1) NULL DEFAULT NULL,
        Supp        TINYINT(1) NULL DEFAULT NULL
    )');

    } catch(Exception $e) {
        echo 'Erreur PDO : '.$e->getMessage();
    }




//création des team
 $i=$nb_team+$nb_premade;
 while ($i>0) 
 {
 	$nom = "equipe_".$i;
     $pdo->query("INSERT INTO team_t (nom_team, id_tournoi) VALUES ('$nom','$idt');");  //création des lignes des teams
     $i=$i-1;
 }

$var_team=$nb_team;
$i=$nb_team;   //le n° de l'équipe
$indice=0;
    
    $tri_niv = $pdo->prepare("   SELECT niveau,id_joueur,poste,id_team FROM inscrit_t ORDER BY niveau");             //liste es info par niveaux dans l'ordre

//    $majT = $pdo->prepare("  UPDATE team_t SET :poste = 1 WHERE id_team = :var_team");
    $majJ = $pdo->prepare("  UPDATE inscrit_t SET id_team = :var_teamaze WHERE id_joueur = :id_joueur AND id_tournoi = $idt");

    $tri_niv->execute();                //création de info
   $info=$tri_niv->fetch();     //liste des info par lvl successifs

while ( $indice<$nb_inscrit)
{
 //   echo "info_team".$info['id_team'];
 //   echo "<br />";

    if ($info['id_team']== NULL ) {
 

    //création de var_team
        $i=($i+1)%(2*$nb_team+1);                                                               //successions des équipes
        if (abs($i-$nb_team)==0)                                                                //
            $i=($i+1)%(2*$nb_team+1);                                                           //
        $var_team=abs($i-$nb_team);
        $var_team=$var_team + $nb_premade;

//echo "var_team : ".$var_team;

//    $requete = $pdo->query('UPDATE team_t SET ADC = 1 WHERE id_team = 2');
//$requete->closeCursor();


if ($info['poste']=='Top') {
  //  echo "string";
$req = $pdo->prepare('UPDATE team_t SET Top = 1 WHERE id_team = ? ');
$req->execute(array($var_team));
}
elseif ($info['poste']=='Jungle') {
$req = $pdo->prepare('UPDATE team_t SET Jungle = 1 WHERE id_team = ? ');
$req->execute(array($var_team));
}
elseif ($info['poste']=='Mid') {
$req = $pdo->prepare('UPDATE team_t SET Mid = 1 WHERE id_team = ? ');
$req->execute(array($var_team));
}
elseif ($info['poste']=='ADC') {
$req = $pdo->prepare('UPDATE team_t SET ADC = 1 WHERE id_team = ? ');
$req->execute(array($var_team));
}
elseif ($info['poste']=='Supp') {
$req = $pdo->prepare('UPDATE team_t SET Supp = 1 WHERE id_team = ? ');
$req->execute(array($var_team));
}

        $majJ->execute(array('var_teamaze' => $var_team, 'id_joueur' => $info['id_joueur'] ) );
        $majJ -> closeCursor();  
 
                                                                 //pour la condition d'arrêt

        //echo $var_team."----".$info['id_joueur'];
     
        //echo $info['poste']."----".$var_team;
//        $majT->execute(array('poste' => $info['poste'] , 'var_team'  => $var_team ) );
//        echo $majT->queryString;
//        $majT -> closeCursor();

//echo " lvl:".$info['niveau']." team:".$var_team . " id joueur : " .$info['id_joueur']." poste :".$info['poste'] ;
//echo "<br />";
}
   $info=$tri_niv->fetch();     //liste des info par lvl successifs
$indice=$indice+1; 
}


$tri_niv->closeCursor();


/*

$sql1 = $pdo -> query("   SELECT pseudo FROM inscrit_t ORDER BY id_team");
$sql = $pdo -> query(" SELECT nom_team FROM team_t ");

while ($info_team = $sql -> fetch())
{
    echo "<br /><br /><br /><br />";
	echo "Equipe : ".$info_team['nom_team']; 
	echo "<br />";
	$i = 0;
	while ($i < 5) 
	{
		$info_joueur= $sql1 -> fetch();
		echo $info_joueur['pseudo'];
		echo "<br />";
		$i ++ ;
	}

}



*/





// REMPLISSAGE DE LA PREMIERE COLONNE D'ARBRE_T

//PLACAGE DES TEAMS DANS L'ARBRE

    //recuperation des info 
    $info = $pdo -> query("SELECT id_team, nom_team FROM team_t");
    $matricage= $pdo -> prepare("INSERT INTO arbre_t (round,ligne,id_tournoi, id_team,nom_team) VALUES (1,:ligne,:id_tournoi,:id_team,:nom_team) ");
    


while ($team_Tab = $info->fetch()) 
{
    $ligne ++ ;

    $matricage -> execute(array( 'ligne' => $ligne , 'id_tournoi' => $id_tournoi , 'id_team' => $team_Tab['id_team'], 'nom_team' => $team_Tab['nom_team'] ));

    echo $team_Tab['nom_team'];
    echo "<br />";
}







?>
