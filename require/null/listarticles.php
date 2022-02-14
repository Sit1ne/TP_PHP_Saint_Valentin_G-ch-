<?php 

function listArticles() {
	
	global $db;
	
	$articles = NULL;
	
	$articles = $db->query("SELECT id, nom, resume FROM articles ORDER BY id DESC");
	$articles = $articles->fetchAll();
	
	return $articles;
	
}


function articles() {
	
	global $db;
	
	$articles = $db->query("SELECT id, titre, accroche, publication, image FROM articles ORDER BY id DESC");
	$articles = $articles->fetchAll();
	
	return $articles;
	
}