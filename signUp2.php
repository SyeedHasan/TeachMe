<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Plentree - Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
	crossorigin="anonymous">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicons/icons.png">
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

</head>

<body>

	<div class="mainDiv">
		<div class="loginContainer">
			<div class="loginWrapper">
				<form class="loginForm" method="POST" action="signUp.php">
					<span class="loginForm-title p-b-26">
						Sign up
                    </span>


					<!-- <div class="inputWrapper">
						<input class="inputElement" type="email" name="signupEmail" required>
						<span class="focus-inputElement" data-placeholder="Email"></span>
					</div> -->

					<div class="cont-button">
						<div class="bg">
							<input class="loginButton" name="registerButton" type="submit" value="Sign Up">
						</div>
					</div>

					<div class="signupText">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="login.php" id="signupLink">
							Log In
						</a>
					</div>
					<!-- FIX THIS IF U WANT TO USE IT -->
					 <?php //  if(in_array("<span style='color:#14C800'>You're all set! Go ahead and login!</span>", $error_array)) echo "<span class='correctSignup'>You're all set! Go ahead and login!</span>"; ?> 

				</form>
			</div>
		</div>

	</div>

	<script src="assets/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>