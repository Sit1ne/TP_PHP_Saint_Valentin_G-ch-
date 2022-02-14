<?php 
session_start();

include_once "includes/header.php"; 

require_once "require/dbb.php";
$db = dbConnexion();

require_once "require/connexion.php";
connexion();

?>

<h1 class="h1_signin">BIENVENUE</h1>

