<?php
session_start();

require "../functions/functions.php";


if(isset($_POST['email']) && isset($_POST['pswd'])){
	$email             = sanitize_input(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
	$password          = sanitize_input(filter_input(INPUT_POST, 'pswd', FILTER_DEFAULT));

	//Asign the session variables to the sanitized user input
    $_SESSION['email'] = $email;
	$_SESSION['pswd']  = $password;

	header("Location: ../pages/signed_user.php", true, 302);
} else {
    die();
}

?>
