<?php
function registration() {
    global $db;
    
    extract($_POST);
    
    $validation = true;
    $error = [];
    
    if(empty($pseudo) || empty($mail) || empty($password)) {
        $validation = false;
        $error[] = "Tous les champs sont obligatoires";
    }
    
    if(alreadyExist($pseudo)) {
        $validation = false;
        $error[] = "Ce pseudo est déjà pris";
    }
    
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $error[] = "L'adresse e-mail n'est pas valide";
    }
   
    
    if($validation) {
        $registration = $db->prepare("INSERT INTO members(pseudo, mail, password) VALUES(:pseudo, :mail, :password)");
        $registration->execute([
            "pseudo" => htmlentities($pseudo),
            "email" => htmlentities($mail),
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);
        
        unset($_POST["pseudo"]);
        unset($_POST["mail"]);
        unset($_POST["password"]);
    }
    
    return $error;
}

function alreadyExist($pseudo) {
    global $db;
    
    $result = $db->prepare("SELECT COUNT(*) FROM members WHERE pseudo = ?");
    $result->execute([$pseudo]);
    $result = $resultat->fetch()[0];
    
    return $result;
}
