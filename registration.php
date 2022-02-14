<?php 
session_start();
include_once "includes/header.php"; 

require_once "require/dbb.php";
$db = dbConnexion();

require_once "require/registration.php";
registration();


?>

<h1 class="h1_signup">INSCRIPTION</h1>

<form class="form_site" method="POST" action="">
	<input type="text" name="pseudo" placeholder="Veuillez entrez votre pseudo" value="<?php if(isset($_POST["pseudo"])) echo $_POST["pseudo"] ?>"  /> <br />
    <input type="text" placeholder="Veuillez entrez votre mail" name="mail" value="<?php if(isset($_POST["mail"])) echo $_POST["mail"] ?>" /> <br />
    <input type="password" placeholder="Veuillez entrez votre mot de passe" name="password" value="<?php if(isset($_POST["password"])) echo $_POST["password"] ?>" /> <br />
    <input type="submit" value="Inscription" />
</form> 