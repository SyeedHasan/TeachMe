<?php

include "includes/header.php";
$currQuiz = new Quiz($con);

$userMarks = $_SESSION['userMarks'];
$GLOBALS['quizNo'] = $_SESSION['quizName'];

$qsNo = $currQuiz->returnNoOfQuestions($GLOBALS['quizNo']);

?>

<div class="column">
    <div class="data">
        <h4>Quiz Name: <?php echo $currQuiz->getQuizName($GLOBALS['quizNo']); ?> </h4>
        <h4>Result Page</h4>
        <hr>
        <h5>Marks Obtained: <?php echo $userMarks; ?> out of <?php echo $qsNo; ?></h5>
        <!-- FIX THE DB PART IN THE FUNCTION LINE 122 (FINAL DB BUILD!!) -->
        <h5>YOU <?php echo $currQuiz->getStatus($userMarks, $qsNo); ?>ED!</h5>
        <small>Your records have been updated. Kindly check your marks in the most recent transcript.</small>
        <small>Press 'Return' to enter to the home page</small>
        <br>
        <input type="button" value="Return to Home" onclick="location.href='index.php'">
    </div>
</div>


<link rel="stylesheet" href="assets/css/quiz.css">

<?php
    include 'includes/footer.php';
?>
-