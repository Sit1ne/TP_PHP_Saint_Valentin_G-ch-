<?php 
session_start();

include_once "includes/header.php"; 

require_once "require/dbb.php";
$db = dbConnexion();

require_once "require/connexion.php";
connexion();

?>

<h1 class="h1_signin">CONNEXION</h1>

<form class="form_site" method="POST" action="">
    <input type="text" placeholder="Veuillez entrez votre pseudo" name="pseudo" /><br />
    <input type="password" placeholder="Veuillez entrez votre mot de passe" name="password" /> <br />
    <input type="submit" value="Connexion" />
</form> 