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
                    <a class="nav-link" href="quiz.php">
                        <i class="fas fa-list-ul"></i>Quiz</a>
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
                        <a class="dropdown-item" href="assignments.php"><i class="fas fa-book" style="margin-right:10px;"></i>Assignments</a>
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

if ($userLoggedIn->returnDesignation() == "Student") {
    header("Location: quiz.php");
}

if (isset($_POST['submitQuiz'])) {
    //These are all arrays! Treat them as such.
    $qName = $_POST['qName'];
    $qTime = $_POST['qTime'];
    $questions = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $correctAns = $_POST['correctAnswer'];

    $currQuiz = new Quiz($con);
    $quizID = $currQuiz->submitQuizInfo($qName, $qTime, $user['username']);

    for ($i = 0; $i < sizeof($questions); $i++) {
        
        $questionDesc = $questions[$i];
        $optionA = $option1[$i];
        $optionB = $option2[$i];
        $optionC = $option3[$i];
        $corrAns = $correctAns[$i];

        //Insert options
        $optionID = $currQuiz->submitQuizOptions($optionA, $optionB, $optionC, $corrAns);

        //Insert question
        $questionID = $currQuiz->submitQuizQuestion($questionDesc, $optionID);

        //Insert quiz and question
        $insertQuizQs = $currQuiz->submitQuiz($quizID, $questionID);
    }

}
?>

<link rel="stylesheet" href="assets/css/quiz.css">

<div class="column">
    <h4>Create a Quiz</h4>
    <hr>

    <p style="margin-left:40px">Fill the following fields:</p>

    <form action="createQuiz.php" class="createForm" method="post">
        
        <div class="qName"><p class="formLabels">Quiz Name</p>
            <input class="textField text" type="text" name="qName" required>
        </div>
        
        <div class="qTime">
            <p class="formLabels">Quiz Time</p>
            <input class="textField text" type="number" name="qTime" required>
        </div>
    <div class="mainTemplate">
        <div class="questionDiv">
            <div class="quest" >
                <p class="quizlabels">Question</p>
                <input class="textField text" type="text" name="question[]" required>
            </div>
                <div class="quizOpt">
                <p class="quizOptions">Option 1</p>
                <input class="textField text" type="text" name="option1[]" required>
            </div>
            <div class="quizOpt">
                <p class="quizOptions">Option 2</p>
                <input class="textField text" type="text" name="option2[]" required>
            </div>
            <div class="quizOpt">
            <p class="quizOptions">Option 3</p>
                <input class="textField text" type="text" name="option3[]" required>
            </div>
            <div class="quest" >
                <p class="quizlabels">Correct Answer</p>
                <input class="textField text" type="text" name="correctAnswer[]" required>
            </div>
        </div>
    </div>

    <i class="fas fa-plus-circle"></i>
    <p class="logoText">Add another Question</p>

    <input id="submitQuiz" name="submitQuiz" class="submitBtn" type="submit" value="Save Quiz">

    </form>

</div>

<!-- This is just for appending the template back in the questions div. Check line 85 for reference -->
<div class="hide" id="qsTemplate">
    <div class="questionDiv">
        <div class="quest" >
            <p class="quizlabels">Question</p>
            <input class="textField text" type="text" name="question[]" required>
        </div>
            <div class="quizOpt">
            <p class="quizOptions">Option 1</p>
            <input class="textField text" type="text" name="option1[]" required>
        </div>
        <div class="quizOpt">
            <p class="quizOptions">Option 2</p>
            <input class="textField text" type="text" name="option2[]" required>
        </div>
        <div class="quizOpt">
        <p class="quizOptions">Option 3</p>
            <input class="textField text" type="text" name="option3[]" required>
        </div>
        <div class="quest" >
            <p class="quizlabels">Correct Answer</p>
            <input class="textField text" type="text" name="correctAnswer[]" required>
        </div>
    </div>
</div>

<script src="assets/js/jqueryV3.js"></script>
<script>

$('.fa-plus-circle').on("click", function(){
    $(".mainTemplate").append($("#qsTemplate").html());
});
</script>


<script src="assets/js/quiz.js"></script>
<?php
include 'includes/footer.php';
?>
