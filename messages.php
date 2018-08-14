<?php

include("includes/header.php");

$messageObj = new Message($con, $user['username']);

if(isset($_GET['user'])){
    //Messaging a user
    $sendTo = $_GET['user'];
}
else {
    // Not messaging anyone
    // $sendTo = $messageObj->getMostRecentUser();
    $sendTo = false;
    //If no message is sent till now,
    if($sendTo == false){
        $sendTo = 'new';
    }
}
if($sendTo != "new")
    $sendToObj = new User($con, $sendTo);

if(isset($_POST['sendMessage'])){

    if(isset($_POST['messageBody'])) {
        $body = mysqli_real_escape_string($con, $_POST['messageBody']);
        $date = date("Y-m-d H:i:s");
        $messageObj->sendMessage($sendTo, $body, $date);
    }

}    
    
?>

<link rel="stylesheet" href="assets/css/messages.css">
<div class="wrapper">

    <div class="leftContainer">
        <div class="profileInfo">
            <img class="userPic" src="<?php echo $user['pictureLink'] ?>" alt=""> 
            <p class="name"><?php echo $user['fName'] . " " . $user['lName']; ?></p>
        </div>

        <div class="messagesInfo">
            <p id="recent">Recent Conversations</p>
            <hr>
                <?php //$messageObj->getMessages($sendTo); ?>
                <!-- RUN THE FUNCTION FROM CLASS -->
                <!-- LOADED CONVOS HERE! -->

            <a id="newMessage" name="newMessage" href="messages.php?user=new">New Message</a>
        </div>

    </div>

    <div class="rightContainer">
        <div class="selectedUserInfo">
            <img src="assets/images/profile_pics/defaults/default.png" alt="User's Image (From the database)"> 
            <p class="selectedUser"><!--Insert user's name (the selected one) --> </p>
        </div>

        <div class="chat">

        </div>

        <div class="chatOptions">
            <form action="messages.php?user=NilaNi" method="POST">
                <input type="text" name="messageBody" id="messageBody">
                <input type="submit" name="sendMessage" value="Send">
            </form>
        </div>
        
    </div>

</div>


<?php
    include 'includes/footer.php';
?>





