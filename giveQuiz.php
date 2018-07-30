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
<?php
    include 'includes/footer.php';
?>