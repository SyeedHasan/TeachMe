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
                <li class="nav-item  ">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-home"></i>Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a class="nav-link" href="assignments.php">
                        <i class="fas fa-book"></i>Assignments</a>
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
                        <a class="dropdown-item" href="messages.php"><i class="fas fa-comments" style="margin-right:10px;"></i>Messages</a>
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

if(isset($_GET['currClass'])) {
        $selectedClass = $_GET['currClass'];
        $_SESSION['selectedClass'] = $selectedClass;
    }
    else {
        $_SESSION['selectedClass'] = $userLoggedIn->returnRecentClass();
    }

?>

<link rel="stylesheet" href="assets/css/class2.css">
<div class="leftDiv">
    <div class="scrollbar" id="style-11">
        <p class="head">Classes</p>
        <hr>
        <ul class="allClasses" >
            <?php $userLoggedIn->returnClasses(); ?>
        </ul>


        <a href="<?php
            
            if($userLoggedIn->returnDesignation() == "Student"){
                echo "joinClass.php?redirect=true"; 
            }
            else {
                echo "createClass.php?redirect=true";
            }
        
        ?>">
            <input type="submit" name="classOption" id="joinClass" value="<?php 
                if($userLoggedIn->returnDesignation() == "Student"){
                    echo "Join Class";
                }
                else {
                    echo "Create Class";
                }
            ?>">
        </a>
        
        
        <div class="force-overflow"></div>
    </div>
</div>

<div class="rightDiv">
    <div class="scrollbar2" id="style-11">
        <div class="main_column">
            <form class="post_form" action="class.php?currClass=<?php echo $selectedClass; ?>" method="POST">
                <textarea name="post_text" id="post_text" placeholder="Something to say"></textarea>
                <input type="submit" name="submitPost" id="post_button" value="Post">
                <input type="reset" name="cancelPost" id="cancel_button" value="Cancel">
                <select name="selectClass" id="selectClass">
                    <!-- Returns options containing all classes -->
                    <?php $userLoggedIn->returnJoinedClasses(); ?> 
                </select>
                <br>
                <div class="logos">
                    <i class="far fa-sticky-note"></i>
                    <i class="fas fa-link"></i>
                    <i class="fas fa-briefcase"></i>
                    <i class="fab fa-google-drive"></i>
                </div>
            </form>

            
            <?php 

                //SUBMIT A POST
                if(isset($_POST['submitPost'])){
                    $selectedClass = $_POST['selectClass'];
                    $body = $_POST['post_text'];
                    $userId = $user['id'];

                    $post = new Post($con, $user['username']);
                    $post->submitPost($selectedClass, $body, $userId);

                }            

            ?>

            <div class="posts_area" >
                <hr>
                <p>Latest Posts</p>    
            </div>
            <img id="loading" src="assets/images/gif/loading1.gif" width="100" >

        </div>

        
        <div class="force-overflow2"></div>
    </div>

</div>

<script src="assets/js/jqueryV3.js"></script>
<script>

    let userLoggedIn = '<?php echo $user['username']; ?>';
    let className1 = '<?php echo $_SESSION['selectedClass'];  ?>';

    $(document).ready(function(){
        $('#loading').show();
        
        //Original AJAX request for loading first posts
        $.ajax({
            url: "includes/handlers/ajax_load_class_posts.php",
            type: "POST",
            data: "userLoggedIn=" + userLoggedIn + "&className1=" + className1,
            cache:false,
            success: function(data){
                    //Returned with posts so hide loading
                    $('#loading').hide();
                    $('.posts_area').append(data);
            }
        });

        $('#selectClass option[value="<?php echo $_SESSION['selectedClass'];?>"]').prop('selected', true);

    });

</script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>



</body>

</html>