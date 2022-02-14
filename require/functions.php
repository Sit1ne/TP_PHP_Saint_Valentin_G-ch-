<?php 

// Function for the DataBase Connexion
function dbConnexion(){
	 try{    
      $db = new PDO("mysql:dbname=tp14;host=localhost", "root", "");
    }catch (PDOException $e){
	 echo 'Connexion échouée : ' . $e->getMessage();
    }
	
	return $db;
}

// ------------------------------------------------------------------------------
// CONNEXION FUNCTION STARTS HERE 
function connexion() {
	global $db;
	
	extract($_POST);
	
	$error = [];
	
	$connexion = $db->prepare("SELECT id, password FROM members WHERE pseudo = ?");
	$connexion->execute([$pseudo]);
	$connexion = $connexion->fetch();
	
	if(empty($pseudo) || empty($password)) {
		$validation = false;
		$error[] = "Tous les champs sont obligatoires";
	}
	
	if(password_verify($password, $connexion["password"])) {
		$_SESSION["session"] = $connexion["id"];
		header("Location: session.php");
	} else {
		return $error[] = "Les identifiants sont erronés";
	}

}
// ------------------------------------------------------------------------------
// CONNEXION ENDS STARTS HERE 




// ------------------------------------------------------------------------------
// LOGOUT FUNCTION STARTS HERE 
function logout() {
	unset($_SESSION["session"]);
	session_destroy();
	header("Location: index.php");
}
// ------------------------------------------------------------------------------
// LOGOUT FUNCTION ENDS HERE 



// Function for the registration of an user
function registration() {
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

/*function alreadyExists() {
	global $db;
	
	$result = $db->prepare("SELECT COUNT(*) FROM members WHERE pseudo = ?");
	$result->execute([$pseudo]);
	$result = $result->fetch()[0];
	
	return $result;
	
}*/

function saveArticles() {
	global $db;
	
	$nom = NULL;
	$resume = NULL;
	$prix = NULL;
	
	extract($_POST);
	
	$articles = $db->prepare("INSERT INTO articles(nom, resume, prix) VALUES(:nom, :resume, :prix)");
	$articles->execute([
		       "nom" => $nom,
		       "resume" => $resume,
		       "prix" => $prix
		]);
		
		unset($_POST["nom"]);
		unset($_POST["resume"]);
		unset($_POST["prix"]);
}




function listArticles() {
	
	global $db;
	
	$articles = NULL;
	
	$articles = $db->query("SELECT id, nom, resume FROM articles ORDER BY id DESC");
	$articles = $articles->fetchAll();
	
	return $articles;
	
}


function infos() {
	
	global $db;
	
	$user = NULL;
	
	$user = $db->query("SELECT pseudo, mail FROM members WHERE id = ?");
	$user->execute([$_SESSION["session"]]);
	$user = $user->fetch();
	
	return $user;
}