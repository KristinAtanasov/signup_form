<?php

session_start();

?>

<?php include "./includes/header.php"; ?>

<div class="container  col-sm-4 mt-5 p-3 shadow-lg">
	<form action="./scripts/handle_login.php" method="POST">
		<h1>Sign up</h1>
		<div class="form-group mt-3">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="uname" placeholder="Enter Email" name="email" required>
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
		</div>
		<button type="submit" class="btn btn-primary">Sign Up</button>
	</form>
</div>

<?php include "./includes/footer.php"; ?>
