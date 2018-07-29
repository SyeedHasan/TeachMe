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
            <a class="anchorTags" href="#">Personal Information
                <i class="fas fa-chevron-right"></i>
            </a>
        </li>
        <li class="link linkBorderA">
            <a class="anchorTags" href="#">Password
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
    <p class="mainHeading">Personal information
        <hr>
        <p class="sectionHeader" >Phone Number </p>
        
        <form class="sectionHeader" action="#" method="POST">
            <input id="phoneNum" type="text" name="usrtel" placeholder="Phone Number">
            <br>
            <br>
            <input class="submitBtn" type="submit" value="Save Phone Number">
        </form>
        
        <hr>
        <p class="sectionHeader" > Profile URL </p>
        
        <p id="urlInfo">Did you know you can change your PlenTree profile URL? You can set a unique name, so people can easily search
            and find your profile.</p>
        
        <form class="urlForm" action="#" method="POST">
            <input class="textField" type="text" name="url" placeholder="www.plentree.com/profile/abc1">
            <input class="submitBtn" type="submit" value="Save Profile URL">
        </form>
        
        <hr>
       
        <p class="sectionHeader" > Account </p>
        
        <form class="sectionHeader" action="#" method="POST">
            <div class="firstName">
                <p class="formLabels">First Name:</p>
                <input class="textField text" type="text" name="fname">      
            </div>
            <div class="lastName">
                <p class="formLabels">Last Name:</p>
                <input class="textField text" type="text" name="lname">
            </div>
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
