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


    <!-- BOOTSTRAP CDNs -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>





