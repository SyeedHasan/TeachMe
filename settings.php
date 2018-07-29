<?php

include("includes/header.php");

?>
    
<link rel="stylesheet" href="assets/css/settings.css">

<div class="mainClass">
    <ul class="contents">
    <li class="link linkBorderA"><p class="anchorTags">Account Settings</p></li>
    <li class="link linkBorderA" ><a class="anchorTags" href="#">Personal Information<i class="fas fa-chevron-right"></i></a></li>
    <li class="link linkBorderA"><a class="anchorTags" href="#">Password<i class="fas fa-chevron-right"></i></a></li>
    <li class="link"><a class="anchorTags" href="#">Notification<i class="fas fa-chevron-right"></i></a></li>
</div>
<div class="sClass">
<p id="p">Personal information <p>
    <hr>
<p id="a">Phone Number </p>
<form id="a"action="#" method="get">
    <input id="c" type="text" name="usrtel" placeholder="Phone Number">
    <br>
    <br>
    <input id="b" type="submit" value="Save Phone Number">
</form>
<hr>
<p id="a"> Profile Url </p>
<p id="d" >Did you know you can change your PlenTree profile url? You can set a unique name, so people can easily search and find your profile.</p>
<form id="p" action="#" method="get">
    <input id="e"type="text" name="url" placeholder="www.plentree.com/profile/abc1">
    <input id="b" type="submit" value="Save Profile URL">
</form>
<hr>
<p id="a"> Account </p>
<br>
<form id="a" action="#" method="get"><p id="f">First Name:</p>
    <input id="e" type="text" name="fname">
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