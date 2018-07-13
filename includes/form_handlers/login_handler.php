<?php

$error_array = array(); //holds all error messages

if(isset($_POST['loginButton'])){

    //Checks if email in correct format
    $email = filter_var($_POST['loginEmail'], FILTER_SANITIZE_EMAIL);

    //Store email into session variable
    $_SESSION['loginEmail'] = $email;

    //Change to md5, then compare from db.
    $password = md5($_POST['loginPassword']);

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password' ");

    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1){
        //Login successfully
        $row = mysqli_fetch_array($check_database_query);
        $username = $row['username'];
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];

        $user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE EMAIL='$email' AND user_closed='yes' ");

        //Reopen account if closed
        if(mysqli_num_rows($user_closed_query) == 1){
            $reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email' ");
        }


        //New session for user
        $_SESSION['username'] = $username;
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;

        //After login, move to
        header("Location: index.php");

        exit();

    }
    else {
        array_push($error_array, "Email or password was incorrect.<br>");
    }

}

?>