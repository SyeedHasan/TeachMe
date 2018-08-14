<?php

require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
//  value="<?php echo $_REQUEST['lastName']; Way to access stuff

if(!isset($_GET['desg'])){
	header("Location: home.php?err=noselect");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Plentree - Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" 
	href="includes/css/bootstrap.min.css" 
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
					<p>Kindly fill the following information to get registered</p>
					<hr>

					<input type="hidden" name="firstName" value="<?php echo $_REQUEST['firstName']; ?>" >

					<input type="hidden" name="lastName" value="<?php echo $_REQUEST['lastName']; ?>" >

					<input type="hidden" name="userName" value="<?php echo $_REQUEST['userName']; ?>" >

					<input type="hidden" name="signupEmail" value="<?php echo $_REQUEST['signupEmail']; ?>" >

					<input type="hidden" name="signupPass" value="<?php echo $_REQUEST['signupPass']; ?>" >

					<input type="hidden" name="userDesg" value="<?php echo $_SESSION['desg']; ?>">

					<div class="student">

						<div class="inputWrapper">
							<input class="inputElement" type="number" name="rollNo" >
							<span class="focus-inputElement" data-placeholder="Roll Number"></span>
						</div> 

						 <div class="inputWrapper">
							<input class="inputElement" type="number" name="batchNo" >
							<span class="focus-inputElement" data-placeholder="Batch Number"></span>
						</div>

					</div>

					<div class="teacher">

						<div class="inputWrapper">
							<input class="inputElement" type="text" name="instName" >
							<span class="focus-inputElement" data-placeholder="Institute Name"></span>
						</div> 
				
					</div>

					<!-- WHAT FORM TO SELECT? BASED ON DESIGNATION -->
					<?php
					if(isset($_SESSION['desg'])){
						if($_SESSION['desg'] == "teacher"){
							echo '<style> 
								div.student {
									display:none;
								}
								</style>
							';
						}
						else {
							echo '<style> 
								div.teacher {
									display:none;
								}
								</style>
							';
						}
					}
					?>

					
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
								<input class="loginButton" name="registerButton" type="submit" value="Sign Up">
							</div>
					</div>

				</form>
			</div>
		</div>

	</div>

	<script src="assets/js/main.js"></script>
	<?php
    include 'includes/footer.php';
	?>