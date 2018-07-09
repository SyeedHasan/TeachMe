
<?php

ob_start(); //This turns on output buffering

//Start a session to store values of a form
session_start();

$timezone = date_default_timezone_set("Asia/Karachi");

$con = mysqli_connect("localhost", "root", "", "projectPortal");
//Connection variable used everywhere in the project

if(mysqli_connect_errno()){
    echo "Failed to connect!" . mysqli_connect_errno();
}

?>