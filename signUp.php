<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';

if(!isset($_GET['desg'])){
	header("Location: home.php?err=noselect");
}
else {
	$_SESSION['desg'] = $_GET['desg'];
}

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
				<form class="loginForm" method="POST" action="signUp2.php?desg=something">
					<span class="loginForm-title p-b-26">
						Sign up
					</span>
					<div class="inputWrapper">
						<input class="inputElement" type="text" name="firstName" required>
						<span class="focus-inputElement" data-placeholder="First Name"></span>
					</div>

					<div class="inputWrapper">
						<input class="inputElement" type="text" name="lastName" required>
						<span class="focus-inputElement" data-placeholder="Last Name"></span>
					</div>
					
					<div class="inputWrapper">
						<input class="inputElement" type="text" name="userName" required>
						<span class="focus-inputElement" data-placeholder="User Name"></span>
					</div>

					<div class="inputWrapper">
						<input class="inputElement" type="email" name="signupEmail" required>
						<span class="focus-inputElement" data-placeholder="Email"></span>
					</div>

					<div class="inputWrapper" id="lastInput">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="inputElement" type="password" minlength="5" maxlength="25" name="signupPass" required>
						<span class="focus-inputElement" data-placeholder="Password"></span>
					</div>

					<!-- Check for every error in the list -->
					<?php if(in_array("Your first name must be between 2 and 25 characters.<br>", $error_array)) echo "<p class='errors'>Your first name must be between 2 and 25 characters</p>" ?>
			        <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "<p class='errors'>Your last name must be between 2 and 25 characters</p>" ?>
					<?php if(in_array("Your user name must be between 2 and 25 characters<br>", $error_array)) echo "<p class='errors'>Your user name must be between 2 and 25 characters</p>" ?>
					<?php if(in_array("Username already in use. <br>", $error_array)) echo "<p class='errors'>Username already in use</p>" ?>

					<?php if(in_array("Email already in use. <br>", $error_array)) echo "<p class='errors'>Email already in use</p>";
					if(in_array("Invalid format! <br>", $error_array)) echo "<p class='errors'>Invalid format!</p>"; ?>

					<?php
					if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "<p class='errors'>Your password can only contain english characters or numbers</p>";
					if(in_array("Your password must be between 5 and 25 characters<br>", $error_array)) echo "<p class='errors'>Your password must be between 5 and 25 characters</p>" ?>

					<div class="cont-button">
						<div class="bg">
							<input class="loginButton" name="regButton" type="submit" value="Proceed">
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
					 <?php 
						// Redirect using this maybe? To the next page with the data from this page.  
					 	 if(in_array("<span style='color:#14C800'>You're all set! Go ahead and login!</span>", $error_array)){
							   echo "<span class='correctSignup'>You're all set! Go ahead and login!</span>"; 
							   header("Location: index.php");
						  }
					 	
						?> 

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