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
            <a class="anchorTags" href="password.php">Password
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="link">
            <a class="anchorTags" href="#">Notification
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
</div>


<div class="sClass">
    <p class="mainHeading">Notification Settings
    <hr>
    <p class="sectionHeader"><b>An email notification to <?php echo $user['email'] ?> will be sent when:</b></p>
        <p class="sectionHeader" id="content">You have an assignment due </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<hr>
<p class="sectionHeader" id="content">You have a quiz due </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<hr>
<p class="sectionHeader" id="content">Your assignment is graded </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<hr>
<p class="sectionHeader" id="content">Your quiz is graded </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<hr>
<p class="sectionHeader" id="content">There is a note to your class </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>
<hr>
<p class="sectionHeader" id="content">Someone likes your note </p>
        <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>



</div>

<?php
include 'includes/footer.php';
?>