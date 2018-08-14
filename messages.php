<?php

require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Quiz.php");

if (isset($_SESSION['username'])) {
    //If user is logged in, it contains the username
    $loggedUser = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];

    $user_details_query = mysqli_query($con, "SELECT * FROM regUser WHERE username='$loggedUser'");

    $user = mysqli_fetch_array($user_details_query);
    //Has an array of all user data.
    $userLoggedIn = new User($con, $user['username']);

    $designation = $userLoggedIn->returnDesignation();

} else {
    header("Location: login.php");
}

?>

<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>PlenTree</title>

    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicons/icons.png">
    
    <link rel="stylesheet" href="assets/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">   
    <link rel="stylesheet" href="assets/css/home.css">
    <script src="assets/js/bootbox.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-expand-xl navbar-dark bg-black">

        <!-- <a class="navbar-brand" href="index.php">
            <img src="assets/images/logos/pl.png" width="30" height="30" alt="">
        </a> -->
        <a class="navbar-brand" href="home.php">
            <!-- Dont remove the spacing. It doesn't help with the logo -->
            <span class="firstLetter">P</span>len<span class="firstLetter">T</span>ree
            <!-- <img src="assets/images/logos/pl.png" width="30" height="30" alt=""> -->
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>


        <!-- These are the logos without the toggling effect applied to them -->
        <div class="d-flex order-lg-1 ml-auto pr-2">
            <ul class="navbar-nav flex-row">
                <li class="nav-item mx-2 mx-lg-0">
                    <!-- Edit this later to accomodate all users profiles by editing the link -->
                    <a class="nav-link white" href="profile.php"><?php echo $firstName . " " . $lastName; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link white" href="includes/handlers/logout.php">Log Out</a>
                </li>
            </ul>
        </div>

        <!-- Icons to be toggled -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i>Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="
                    <?php
                    if($designation == "Teacher"){ 
                        echo "createClass.php";
                    } 
                    else {
                        echo "joinClass.php";
                    }
                     
                    ?>">
                    <i class="fas fa-graduation-cap"></i>Classes</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="messages.php">
                        <i class="fas fa-comments"></i>Messages</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-list-ul"></i>To-Do</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-chevron-down"></i>More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="assignments.php"><i class="fas fa-book" style="margin-right:10px;"></i>Assignments</a>
                        <a class="dropdown-item" href="settings.php"><i class="fas fa-cog" style="margin-right:10px;"></i>Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="quiz.php"><i class="fas fa-list-ul" style="margin-right:10px;"></i>Quiz</a>
                    </div>
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>


<?php


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
            <?php echo $messageObj->getConvos(); ?>

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