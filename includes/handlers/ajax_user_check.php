<?php

include('../../config/config.php');
include('../classes/User.php');

$username = $_REQUEST['name'];

$query = mysqli_query($con, "SELECT username FROM regUser WHERE usename='$username'");

if(mysqli_num_rows($query) <= 0){ 
    echo "No such user exists.";
}
else {
    echo "You're good to go. Press Continue to send a message.";
}