<?php
function connexion()
{
	try {
        $database = new PDO('mysql:host=localhost;dbname=paintfusion','root','');        
        $database -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return ($database);
    } catch(PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function nom_team($idteam)
{
	$database = connexion();
    $nomteam = $database->query('SELECT nom_team FROM team_t WHERE id_team = $idteam');
    echo $nomteam;
}

function mid($idteam)
{
	$database = connexion();
    $mid = $database->query('SELECT mid FROM team_t WHERE id_team = $idteam');
    echo '<p> Mid :', $mid ,'</p>';
}

function top($idteam)
{
	$database = connexion();
    $top = $database->query('SELECT top FROM team_t WHERE id_team = $idteam');
    echo '<p> Top :', $top,'</p>';
}

function jungle($idteam)
{
	$database = connexion();
    $jungle = $database->query('SELECT jungle FROM team_t WHERE id_team = $idteam');
    echo '<p> Jungler :', $jungle , '</p>';
}

function adc($idteam)
{
	$database = connexion();
    $adc = $database->query('SELECT adc FROM team_t WHERE id_team = $idteam');
    echo '<p> ADC :', $adc , '</p>';

function support($idteam)
{
	$database = connexion();
    $support = $database->query('SELECT support FROM team_t WHERE id_team = $idteam');
    echo '<p> Support :', $support , '</p>';
}

function slogan($idteam)
{
	$database = connexion();
    $support = $database->query('SELECT slogan FROM team_t WHERE id_team = $idteam');
    echo $slogan;
}

?>