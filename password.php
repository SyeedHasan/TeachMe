<?php

include "includes/header.php";

?>


<link rel="stylesheet" href="assets/css/settings.css">



<div class="mainClass">
    <ul class="contents">
        <li class="link linkBorderA">
            <p class="anchorTags">Account Settings</p>
        </li>
        <li class="link linkBorderA">
            <a class="anchorTags" href="settings.php">Personal Information
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="link linkBorderA">
            <a class="anchorTags" href="#">Password
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="link">
            <a class="anchorTags" href="notification.php">Notification
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
</div>


<div class="sClass">
    <p class="mainHeading">Password Settings
    <hr>
<form class="sectionHeader" action="#" method="POST">
    <p class="formLabels">Current Password </p>
    <input class="textField text" type="password" name="cpassword">
    <br>
    <p class="formLabels">New Password </p>
    <input class="textField text" type="password" name="npassword">
    <p class="formLabels">Confirm Password </p>
    <input class="textField text" type="password" name="password">
    <input class="submitBtn" type="submit" value="Change Password">
</form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
