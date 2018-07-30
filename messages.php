<?php

include("includes/header.php");

?>

<link rel="stylesheet" href="assets/css/messages.css">
<div class="wrapper">

    <div class="leftContainer">
        <div class="profileInfo">
            <img class="userPic" src="<?php echo $user['pictureLink'] ?>" alt=""> 
            <p class="name"><?php echo $user['fName'] . " " . $user['lName']; ?></p>
        </div>

        <div class="messagesInfo">
            <p id="recent">Recent Messages</p>
            <hr>
                
                <!-- LOADED CONVOS HERE! -->

        </div>

    </div>

    <div class="rightContainer">
        <div class="selectedUserInfo">
            <img src="assets/images/profile_pics/defaults/default.png" alt="User's Image (From the database)"> 
            <p class="selectedUser">Username (From the database) </p>
        </div>

        <div class="chat">

        </div>

        <div class="chatOptions">
            <input type="text" name="messageBody" id="messageBody">
            <input type="submit" value="Send">
        </div>
        
    </div>

</div>


<?php
    include 'includes/footer.php';
?>





