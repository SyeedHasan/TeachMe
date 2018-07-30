<?php
    include "includes/header.php";
    include "includes/form_handlers/password_handler.php";
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
    <input class="textField text" type="password" name="cpassword" required>
    <span class="oldPwErr"></span>
    
    <br>
    
    <p class="formLabels">New Password </p>
    <input class="textField text" type="password" name="npassword" required>
    <span class="newPwErr"></span>

    <p class="formLabels">Confirm Password </p>
    <input class="textField text" type="password" name="npassword2" required>
    <span class="newPwErr"></span>


    <input class="submitBtn" name="changePassword" type="submit" value="Change Password">
</form>
</div>

<?php
include 'includes/footer.php';
?>