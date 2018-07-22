<?php

include("includes/header.php");
$currQuiz = new Quiz($con);

if(isset($_POST['selectedQuiz'])) {
    echo '
    <style> 
        div.column {
            display:none;
        }
    </style>';

    $userChoice = $_POST['quizName'];
    $currQuiz->returnQuizQuestions($userChoice);
}

if(isset($_POST['submitQuiz'])){
    // header("Location: quizResult.php");
}

?>
<link rel="stylesheet" href="assets/css/quiz.css">

<div class="column">
    <h4>Take a Quiz</h4>
    <hr>

    <p>Following are the quizzes that are available:- </p>
    <ul>
        <?php $currQuiz->returnAvailableQuizzes(); ?>
    </ul>

    <p>Which quiz would you like to take? Enter the Quiz ID and press 'Continue' to proceed.</p>
    
    <form action="quiz.php" method="post">
        <input type="text" name="quizName" id="quizName" required>
        <br>
        <input type="submit" value="Proceed" name="selectedQuiz">
    </form>

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
