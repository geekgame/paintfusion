<?php

session_start();
include ("check_admin.php");

// calcul du nombre de premade
    $sql = "SELECT id_team FROM inscrit_t WHERE  id_team IS NOT NULL AND id_tournoi = ".$idt." GROUP BY id_team ORDER BY id_team DESC";                              
    $premade = $pdo->query($sql);
    $columns = $premade->fetch();
    $nb_premade = $columns['id_team'];

//calcul du nombre de team
    $sql = 'SELECT COUNT(*) AS nb FROM inscrit_t WHERE id_tournoi = '.$idt  ;
    $result = $pdo->query($sql);
    $columns = $result->fetch();
    $nb_inscrit = $columns['nb'];
    $nb_inscrit = $nb_inscrit - $nb_inscrit%5 ;
    $nb_team = $nb_inscrit/5 -$nb_premade;
    
//création des team
 	$i=$nb_team-$nb_premade;
 	while ($i>0) 
 	{
 		$nom = "equipe_".$i;
 	    $pdo->query("INSERT INTO team_t (nom_team,id_tournoi,id_team) VALUES ('$nom',".$idt.",".$i.")");  //création des lignes des teams
 	    $i--;
	}


	$var_team= $nb_team;
	$i 		= $nb_team;   //le n° de l'équipe
	$indice = 0;

//liste les infos par niveaux dans l'ordre
	$tri_niv = $pdo->prepare("   SELECT niveau,id_joueur,id_inscrit_t,poste,id_team FROM inscrit_t WHERE id_tournoi=:idt ORDER BY niveau");
	$tri_niv->execute(array('idt' => $idt ) );		//création de info
	$info=$tri_niv->fetch();						//liste des info par lvl successifs

//association d'une équipe à un joueur
	$majJ = $pdo->prepare("  UPDATE inscrit_t SET id_team = :var_teamaze WHERE id_inscrit_t = :id_inscrit ");

	while ( $indice<$nb_inscrit)		//tant qu'il y a des joueurs
	{
		if ($info['id_team']== NULL ) 	//si le joueur n'a pas déja une team
		{

		//création de var_team
	        $i=($i+1)%(2*$nb_team+1);																
    	    if (abs($i-$nb_team)==0)
            	$i=($i+1)%(2*$nb_team+1);
        	$var_team=abs($i-$nb_team);
        	$var_team=$var_team + $nb_premade;

		//remplissage de l'id_team pour l'inscrit
			$majJ->execute(array('var_teamaze' => $var_team, 'id_inscrit' => $info['id_inscrit_t'] ) );
			$majJ-> closeCursor();  

		}
	$info=$tri_niv->fetch();     //liste des info par lvl successifs
	$indice++; 
	}

	$tri_niv->closeCursor();

// REMPLISSAGE DE LA PREMIERE COLONNE D'ARBRE_T

//recuperation des info 
	$info = $pdo -> query("SELECT id_team, nom_team FROM team_t WHERE id_tournoi=$idt");

//préparation au plaçage des team dans l'arbre
	$matricage= $pdo -> prepare("INSERT INTO arbre_t (round,ligne,IDtournoi, id_team) VALUES (1,:ligne,:id_tournoi,:id_team) ");

	$ligne = 0;
	while ($team_Tab = $info->fetch()) 
	{
		$ligne ++ ;
		$matricage -> execute(array( 'ligne' => $ligne , 'id_tournoi' => $idt, 'id_team' => $team_Tab['id_team']));
	}

?>