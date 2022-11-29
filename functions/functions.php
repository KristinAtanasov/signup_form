<?php

//Sanitize the user input
function sanitize_input($input){
	$sanitized_input = trim($input);
	$sanitized_input = stripslashes($input);
	$sanitized_input = htmlspecialchars($input);
	return $sanitized_input;
}

function destroy_session(){
	session_unset();
	session_destroy();
	return;
}

?>
