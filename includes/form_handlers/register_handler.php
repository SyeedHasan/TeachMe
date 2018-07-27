<?php

$fname = ""; //first name
$lname = ""; //last name
$username = "";
$em = ""; //email
$password = "";
$date = ""; //Signup date
$error_array = array(); //holds all error messages

if(isset($_POST['registerButton'])){
    //Registration form values
    // $_POST means whatevers sent from the POST form.
    
    $fname = strip_tags($_POST['firstName']);
    $fname = str_replace(' ', '', $fname);     //Replace spaces by blanks
    $fname = ucfirst(strtolower($fname));
    $_SESSION['firstName'] = $fname;

    $lname = strip_tags($_POST['lastName']);
    $lname = str_replace(' ', '', $lname);     //Replace spaces by blanks
    $lname = ucfirst(strtolower($lname));
    $_SESSION['lastName'] = $lname;

    $uname = strip_tags($_POST['userName']);
    $uname = str_replace(' ', '', $uname);     //Replace spaces by blanks
    $_SESSION['userName'] = $uname;

    $em = strip_tags($_POST['signupEmail']);
    $em = str_replace(' ', '', $em);     //Replace spaces by blanks
    $em = ucfirst(strtolower($em));
    $_SESSION['signupEmail'] = $em;

    $password = strip_tags($_POST['signupPass']);

    $date = date("Y-m-d");

    //Email Validation
    if(filter_var($em, FILTER_VALIDATE_EMAIL)){
        //Give filtered version of email to 'em'
        $em = filter_var($em, FILTER_VALIDATE_EMAIL);
        
        //Check if email exists in the table
        $e_check = mysqli_query($con, "SELECT email FROM regUser WHERE email='$em' ");

        //Counts the number of rows returned
        $num_rows = mysqli_num_rows($e_check);

        if($num_rows > 0){
            array_push($error_array, "Email already in use. <br>");
        }

    }
    else {
        array_push($error_array, "Invalid format! <br>");
    }

    //Validate others
    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "Your first name must be between 2 and 25 characters.<br>");
    }

    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
    }
    
    if(strlen($uname) > 25 || strlen($uname) < 2) {
        array_push($error_array, "Your user name must be between 2 and 25 characters<br>");
    }

    $check_username_query = mysqli_query($con, "SELECT username FROM regUser WHERE username='$uname'");
    $num_rows = mysqli_num_rows($check_username_query);
    if($num_rows > 0){
        array_push($error_array, "Username already in use. <br>");
    }

    if(preg_match('/[^A-Za-z0-9]/', $password)){
        array_push($error_array, "Your password can only contain english characters or numbers<br>");
    }

    if(strlen($password) > 30 || strlen($password) < 5 ){
        array_push($error_array, "Your password must be between 5 and 25 characters<br>");
    }

    //If no errors
    if(empty($error_array)){
        $password = md5($password); //encrypted password

        $profile_pic = "assets/images/profile_pics/defaults/default.png";

        $query = mysqli_query($con, "INSERT INTO regUser VALUES('', '$uname', '$fname', '$lname', '$em', '$password', '', '$profile_pic') ");

        array_push($error_array, "<span style='color:#14C800'>You're all set! Go ahead and login!</span>");
        
        //Clear the session
        $_SESSION['firstName'] = "";
        $_SESSION['lastName'] = "";
        $_SESSION['userName'] = "";
        $_SESSION['signupEmail'] = "";

        // header("Location: login.php");

    }

}

?>