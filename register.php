<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inscription</title>
<link rel="stylesheet" type="text/css" href="style/styleregister.css">
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.autocomplete.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.menu.min.css" rel="stylesheet" type="text/css">
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.autocomplete.min.js" type="text/javascript"></script>
</head>

<body>
<form action="_actions/registeraction.php" method="post">
<div class="login">
<h2>inscription</h2>
<input name="login" placeholder="nom d'utilisateur" type="text">
<input name="iglogin" placeholder="pseudo in-game(lol)" type="text">
<input id="pw" name="pass" placeholder="mot de passe" type="password">
<input id="pw" name="pass2" placeholder="répeter mot de passe" type="password">
<input name="email" type="text" placeholder="addresse mail">
<div class="agree" name="agree" type="checkbox">
  <input id="agree" name="agree" type="checkbox">
<label for="agree"></label>J'accepte les <a href="cgu.php"><u>CGU</u></a>
</div>
<input class="animated" type="submit" value="Inscription">
<a class="forgot" href="login.php">Connexion</a>
</div>
</form>
</body>
</html>