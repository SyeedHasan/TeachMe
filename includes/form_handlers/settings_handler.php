<?php

$userN = $user['username'];

if(isset($_POST['savePhoneNum'])){
    $newNum = $_POST['usrtel'];
    
    //Update query 
    $query = mysqli_query($con, "UPDATE regUser SET phoneNumber='$newNum' WHERE username='$userN' ");
    echo '<script>
        bootbox.alert("Password Changed!");
    </script>';
}

if(isset($_POST['changeNameEmail'])){
    $newFirstName = $_POST['fname'];
    $newLastName = $_POST['lname'];
    $newEmail = $_POST['email'];

    //APPLY CHECKS TO THIS! (TIME PEY!!)

    //Update database
    $query = mysqli_query($con, "UPDATE regUser SET fName='$newFirstName' WHERE username='$userN'");
    $query = mysqli_query($con, "UPDATE regUser SET lName='$newLastName' WHERE username='$userN'");
    $query = mysqli_query($con, "UPDATE regUser SET email='$newEmail' WHERE username='$userN'");

    header("Location: settings.php");

}



?>