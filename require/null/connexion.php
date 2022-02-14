<?php

function connexion() {
	
	$pseudo	= NULL;
	$password = NULL;
    
	global $db;
	
	extract($_POST);
    
    $error = "Les identifiants sont erronés";
    
    $connexion = $db->prepare("SELECT id, password FROM members WHERE pseudo = ?");
    $connexion->execute([$pseudo]);
    $connexion = $connexion->fetch();
    
    if($password) {
		$_SESSION["session"] = $connexion["id"];
         header("Location: session.php");
    } else
        return $error;
}