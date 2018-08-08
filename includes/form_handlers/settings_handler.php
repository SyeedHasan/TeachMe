<?php

if(isset($_POST['savePhoneNum'])){
    $newNum = $_POST['usrtel'];
    $userN = $user['username'];
    
    //Update query 
    $query = mysqli_query($con, "UPDATE regUser SET phoneNumber='$newNum' WHERE username='$userN' ");
    echo '<script>
        bootbox.alert("Password Changed!");
    </script>';
}



?>