<?php
$dsn =  'mysql:host=localhost;dbname=paintfusion';
$user = 'root';
$password = '';


    try {
        $pdo = new PDO($dsn,$user,$password);        //connection à la base de donnée
    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
    


    echo "ok";
    $insert = $pdo->prepare('INSERT INTO chat(pseudo,time,texte) VALUES (:Pseudo, :time, :texte )');
    $insert->execute(array(
        //'Pseudo'=>$_SESSION["idJoueur"]
        'Pseudo'=>'Aegolius',
        'time'=>date('H:i'),
        'texte'=>$_POST['message']
        ));

    header('location: chat.php');
    exit();
?>