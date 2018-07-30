<?php

if(isset($_POST['changePassword'])){

    $uName = $user['username'];

    $cPassword = $_POST['cpassword'];
    $nPassword = $_POST['npassword'];
    $password = $_POST['npassword2'];

    $dbPassword = $user['password'];
    $dbPassword = md5($dbPassword);

    $msg = "";

    //Validate the old password field    
    if(!($cPassword == $dbPassword)){
        echo '<script>
            var pw = document.querySelector("oldPwErr");
            pw.innerHTML = "Password doesn\'t match!"; 
        </script>';
    
    }


    //Check to see if the new passwords match
    if($nPassword == $password) {
        //Fields match
        $password = md5($password);
        //Change the password in the database
        $query = mysqli_query($con, "UPDATE regUser SET password='$password' WHERE username='$uName' ");

    }




}

?>