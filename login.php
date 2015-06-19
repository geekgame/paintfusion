<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Connexion</title>
<link rel="stylesheet" type="text/css" href="style/styleregister.css">
</head>

<body>
<form action="_actions/loginaction.php" method="post">
<div class="login">
<h2>connexion</h2>
<input name="login" placeholder="nom d'utilisateur" type="text">
<input id="pw" name="pw" placeholder="mot de passe" type="password">
<div class="agree" name="agree" type="checkbox">
</div>
<input class="animated" type="submit" value="Connexion">
<a class="forgot" href="register.php">Inscription</a>
</div>
</form>
</body>
</html>