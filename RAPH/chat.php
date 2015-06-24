<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>PaintFusion</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta charset="UTF-8">
            <link href="style.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>

        


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

    $messages = $pdo->query('SELECT pseudo,time,texte FROM chat ORDER BY ID DESC LIMIT 0,10');

    while ($data = $messages->fetch())
    {
    echo '<p>('.$data['time'].') <strong>'.htmlspecialchars($data['pseudo']).'</strong> : '.htmlspecialchars($data['texte']).'</p>';
    }

    ?>

    <form method='post' action='post.php'>
            <p>
                <input type="text" name="message"/>
                <input type="submit" name="envoi" value="envoyer" />
            </p>
    </form>


    <script type='text/javascript'>
    function refresh() {
    location.reload();
    }
    window.setTimeout(refresh,10000);
    </script>


    

    </body></html>