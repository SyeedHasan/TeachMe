<?php

require 'config/config.php';
require 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Log In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicons/icons.png">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

	<div class="mainDiv">
		<div class="loginContainer">
			<div class="loginWrapper">
				<form class="loginForm" action="login.php" method="POST">
					<span class="loginForm-title p-b-26">
						Log In
					</span>
					<!-- <span class="loginForm-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span> -->

					<div class="inputWrapper">
						<input class="inputElement" type="email" name="loginEmail">
						<span class="focus-inputElement" data-placeholder="Email"></span>
					</div>

					<div class="inputWrapper">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="inputElement" type="password" name="loginPassword">
						<span class="focus-inputElement" data-placeholder="Password"></span>
					</div>

					<?php if(in_array("Email or password was incorrect.<br>", $error_array)) echo "<p class='error'>Email or password was incorrect</p><br>"; ?>

					<div class="cont-button">
						<div class="bg">
							<input class="loginButton" name="loginButton" type="submit" value="Log In">
						</div>
					</div>

					<div class="signupText">
						<span class="txt1">
							Don't have an account?
						</span>

						<a class="txt2" href="signUp.php" id="signupLink">
							Sign Up
						</a>
					</div>



				</form>
			</div>
		</div>

	</div>

	<script src="assets/js/main.js"></script>

</body>

</html>