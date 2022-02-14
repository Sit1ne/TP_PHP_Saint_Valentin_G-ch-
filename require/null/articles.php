<?php 

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

