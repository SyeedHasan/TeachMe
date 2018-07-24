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
        <h5>YOU <?php $currQuiz->getStatus($userMarks, $qsNo); ?></h5>
        <small>Your records have been updated. Kindly check your marks in the most recent transcript.</small>
        <small>Press 'Return' to enter to the home page</small>
        <br>
        <input type="button" value="Return" onclick="location.href='index.php'">
    </div>
</div>


<link rel="stylesheet" href="assets/css/quiz.css">

<!-- BOOTSTRAP CDNs -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</body>

</html>
