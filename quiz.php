<?php

include("includes/header.php");
$currQuiz = new Quiz($con);

if(isset($_POST['selectedQuiz'])) {
    
    $userChoice = $_POST['quizName'];
    $_SESSION['quizName'] = $userChoice;
    header("Location: giveQuiz.php");
    // $currQuiz->returnQuizQuestions($userChoice);
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
<?php
    include 'includes/footer.php';
?>
