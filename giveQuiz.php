<?php

include("includes/header.php");
$currQuiz = new Quiz($con);
// Continues from the page 'quiz.php' by serving the user with the questions of the test
$currQuiz->returnQuizQuestions($_SESSION['quizName']);

// This button is present in the quiz returned by the Quiz class
if(isset($_POST['submitQuiz'])){

    // echo '
    // <style> 
    //     form.column2 {
    //         display:none;
    //     }
    // </style>';

    // foreach ($_POST['option1'] as $select)
    // {
    //     echo "You have selected :" .$select; // Displaying Selected Value
    // }

    $userMarks = $currQuiz->checkAnswers();
    $_SESSION['userMarks'] = $userMarks;
    header("Location: quizResult.php");

}

?>

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
