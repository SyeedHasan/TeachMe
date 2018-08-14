<?php

include("includes/header.php");

$messageObj = new Message($con, $user['username']);

if(isset($_GET['user'])){
    //Messaging a user
    $sendTo = $_GET['user'];
}
else {
    // Not messaging anyone
    $sendTo = $messageObj->getMostRecentUser();

    //If no message is sent till now,
    if($sendTo == false){
        $sendTo = 'new';
    }
    else {
        $query = mysqli_query($con, "SELECT username FROM regUser WHERE id='$sendTo'");
        $query = mysqli_fetch_array($query);
        $sendTo = $query['username'];
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
<script src="assets/js/jqueryV3.js"></script>
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
<<<<<<< HEAD
                <?php //$messageObj->getMessages($sendTo); ?>
                <!-- RUN THE FUNCTION FROM CLASS -->
                <!-- LOADED CONVOS HERE! -->
=======
            <?php echo $messageObj->getConvos(); ?>
>>>>>>> a202926a09f5c9c031150ffe17d6864c99d3f76a

                <!-- RUN THE FUNCTION FROM CLASS -->
                <!-- LOADED CONVOS HERE! messages.php?user=new is the href for the anchor for newMessage -->
            
            <a id="newMessage" name="newMessage" href="#">New Message</a>
        </div>

    </div>

    <div class="rightContainer">
        <div class="selectedUserInfo">
            <img src="assets/images/profile_pics/defaults/default.png" alt="User's Image (From the database)"> 
            <p class="selectedUser"><?php if($sendTo != "new") { echo $sendTo; } ?></p>
        </div>

        <div class="chat">        
                <?php echo $messageObj->getMessages($sendTo); ?>            
        </div>

        <div class="chatOptions">
            <form action="messages.php?user=<?php echo $sendTo; ?>" method="POST">
                <input type="text" name="messageBody" id="messageBody">
                <input type="submit" class="postSubmitBtn" name="sendMessage" value="Send">
            </form>
        </div>
        
    </div>

</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>Send Message</h2>
      <span class="close">&times;</span>

    </div>
    <div class="modal-body">
        <form action="messages.php">
            <p>Enter the username of the user you wish to message:</p>
            <input type="text" name="user" id="sendMsgTo" required>
            <span class="userErr"></span>
            <input type="submit" onfocusout="checkUser()" name="userSearch" class="postSubmitBtn" value="Continue">
        </form>

        <script>
            // IDENTIFY CORRECT AND INCORRECT USERS SOMEHOW. 
            // $inp = document.querySelector("#sendMsgTo");
            // $inp.addEventListener("focusout", function(){ 
            //     alert("Tjis");
            //     $val = $('#sendMsgTo');
            //     $.ajax({
            //         url:"includes/handlers/ajax_user_check.php",
            //         type: "get", //request type,
            //         data: { name: $val },
            //         success:function(result){
            //             console.log(result);
            //         },
            //         error: function (request, error) {
            //             console.log(arguments);
            //             alert(" Can't do because: " + error);
            //         }
            //     });
            // });

        </script>


    </div>
    <div class="modal-footer">
    </div>
  </div>

</div>

<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("newMessage");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<!-- <script src="assets/js/jquery-slim.min.js"></script> -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


</body>

</html>




        <?php
        // if(isset($_POST['userSearch'])){
        //     $username = $_POST['user'];
        //     $query = mysqli_query($con, "SELECT username FROM regUser WHERE username='$username'");

        //     if(mysqli_num_rows($query) <= 0){
        //         echo '<script>
        //             alert("THIS WAS FOUND!");
        //             var sp = document.querySelector(".userErr");
        //             sp.innerHTML = "No such user found!";
                
        //         </script>';
        //     }

        // }
        ?>