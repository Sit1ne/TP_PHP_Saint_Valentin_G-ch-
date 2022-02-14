<?php 

function infos() {
	
	global $db;
	
	$user = NULL;
	
	$user = $db->prepare("SELECT pseudo, mail FROM members WHERE id = ?");
	$user->execute([$_SESSION["session"]]);
	$user = $user->fetch();
	
	return $user;
}