<?php



$dsn =  'mysql:host=localhost;dbname=paintfusion';
$user = 'root';
$password = '';


try {
    $pdo = new PDO($dsn,$user,$password);        //connection à la base de donnée
  $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo 'Erreur PDO : '.$e->getMessage();
}
?>