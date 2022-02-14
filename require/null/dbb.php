<?php 

// ------------------------------------------------------------------------------
// DATABASE CONNEXION's FUNCTION STARTS HERE 
function dbConnexion(){
	 try{    
      $db = new PDO("mysql:dbname=tp14;host=localhost", "root", "");
    }catch (PDOException $e){
	 echo 'Connexion échouée : ' . $e->getMessage();
    }
	
	return $db;
}

