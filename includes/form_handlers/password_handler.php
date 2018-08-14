<?php

if(isset($_POST['changePassword'])){

    $uName = $user['username'];

    $cPassword = $_POST['cpassword'];
    $nPassword = $_POST['npassword'];
    $password = $_POST['npassword2'];

    $dbPassword = $user['password'];
    $cPassword = md5($cPassword);

    $msg = "";
    //Validate the old password field    
    if(!($cPassword == $dbPassword)){
        $error = 0;
        header("Location: password.php?err=nomatch");
    }
    else {
        $error=1;
    }

    //Check to see if the new passwords match
    if(($nPassword == $password) && $error==1) {
        //Fields match
        $password = md5($password);
        //Change the password in the database
       $query = mysqli_query($con, "UPDATE regUser SET password='$password' WHERE username='$uName' ");

       header("Location:password.php?changed=changed");

    }
    else {
        header("Location:password.php?notchanged=err");

    }

}

?>