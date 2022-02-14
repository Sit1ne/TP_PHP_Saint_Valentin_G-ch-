<?php

// ------------------------------------------------------------------------------
// LOGOUT FUNCTION STARTS HERE 
function registration() {
	
	$mail = NULL;
	                               
	global $db;
	
	extract($_POST);
	
	
	
	$validation = true;
	$error = [];
	
	if(empty($pseudo) || empty($mail) || empty($password) ) {
		$validation = false;
		$error[] = "Tous les champs sont obligatoires"; 
	}
	
	/*if(alreadyExists($pseudo)) {
		$validation = false;
		$error[] = "Ce pseudo est déjà pris";
	}*/
	
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$validation = false;
		$error[] = "L\'adresse email n'est pas valide";
	}
	
	if($validation) {
		$registration = $db->prepare("INSERT INTO members(pseudo, mail, password) VALUES(:pseudo, :mail, :password)");
		$registration->execute([
		       "pseudo" => htmlentities($pseudo),
		       "mail" => htmlentities($mail),
		       "password" => password_hash($password, PASSWORD_DEFAULT)
		]);
		
		unset($_POST["pseudo"]);
		unset($_POST["mail"]);
		unset($_POST["password"]);
	}
	
	return $error;
}