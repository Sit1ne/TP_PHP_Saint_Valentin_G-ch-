<?php

// ------------------------------------------------------------------------------
// LOGOUT FUNCTION STARTS HERE 
function logout() {
	unset($_SESSION["session"]);
	session_destroy();
	header("Location: index.php");
}
// ------------------------------------------------------------------------------
// LOGOUT FUNCTION ENDS HERE 
