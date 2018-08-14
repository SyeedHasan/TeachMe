<?php

include("includes/header.php");
$currQuiz = new Quiz($con);
// Continues from the page 'quiz.php' by serving the user with the questions of the test
$currQuiz->returnQuizQuestions($_SESSION['quizName']);

// This button is present in the quiz returned by the Quiz class
if(isset($_POST['submitQuiz'])){

    $GLOBALS['quizNo'] = $_SESSION['quizName'];
    $quizNo = $GLOBALS['quizNo'];

    $userID = $userLoggedIn->getUserID();

    $userMarks = $currQuiz->checkAnswers($quizNo, $userID);
    $_SESSION['userMarks'] = $userMarks;
    header("Location: quizResult.php");

}

?>

<link rel="stylesheet" href="assets/css/quiz.css">
<?php
    include 'includes/footer.php';
?>