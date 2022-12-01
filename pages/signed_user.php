<?php

session_start();

require "../functions/functions.php";


//Asign the values received from the user input
$user_email    = $_SESSION['email'];
$user_password = $_SESSION['pswd'];


$db_host       = "localhost";
$db_name       = "users";
$db_username   = "username";
$db_password   = "";

$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
        //Connect to the database using PDO interface object.
	$db_connection = new PDO($dsn, $db_username, $db_password);

        $sql           = 'INSERT INTO users_credentials(email, password) VALUES(:email, :password)';
	$statement     = $db_connection->prepare($sql);

	//Bind the query values to the user input
	$statement->bindValue(':email', $user_email);
	$statement->bindValue(':password', $user_password);

	//Execute the statement to the database
	$statement->execute();

} catch (\Throwable $e) {
	//Display the potential error message.
	echo $e->getMessage();
}

?>


<?php if(isset($_SESSION['email']) && isset($_SESSION['pswd'])):?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	</head>

	<body>

		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand">Company</a>
			<div class="container justify-content-end">
				<ul class="navbar-nav">
					<li class="nav-link">
						<a class="nav-link text-white" href="../about.php">About</a>
					</li>
					<li class="nav-link bg-primary rounded">
						<a class="nav-link text-white" href="../index.php">Log Out <?php destroy_session()?></a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container mt-5 mr-5">
			<h3>Hello <?= $user_email ?></h3>
			<h2>You have successfully sign in.</h2>
		</div>

		<?php else: ?>

		<?php include "error_page.php"; ?>

		<?php endif; ?>
