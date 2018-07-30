
<?php
    include "includes/header.php";
?>

<link rel="stylesheet" href="assets/css/quiz.css">

<div class="column">
    <h4>Create a Quiz</h4>
    <hr>

    <p style="margin-left:40px">Fill the following fields:</p>
    
    <form action="createQuiz.php" class="createForm" method="post">
        <div class="qName"><p class="formLabels">Quiz Name</p>
            <input class="textField text" type="text" name="qName">
        </div>
        <div class="qTime">
            <p class="formLabels">Quiz Time</p>
            <input class="textField text" type="text" name="qTime">
        </div>
    <div class="questionDiv">
        <div class="quest" >
            <p class="quizlabels">Question</p>
            <input class="textField text" type="text" name="question">
        </div>
            <div class="quizOpt">
            <p class="quizOptions">Option 1</p>
            <input class="textField text" type="text" name="option1">
        </div>
        <div class="quizOpt">
            <p class="quizOptions">Option 2</p>
            <input class="textField text" type="text" name="option2">
        </div>
        <div class="quizOpt">
        <p class="quizOptions">Option 3</p>
            <input class="textField text" type="text" name="option3">
        </div>
        <div class="quizOpt">
        <p class="quizOptions">Option 4</p>
            <input class="textField text" type="text" name="option4">
        </div>
        <div class="quest" >
            <p class="quizlabels">Correct Answer</p>
            <input class="textField text" type="text" name="correctAnswer">
        </div>
        <i class="fas fa-plus-circle"></i>
    </div>
    <input id="submitQuest" class="submitBtn" type="submit" value="Save Changes">

    </form>

</div>





<?php
    include 'includes/footer.php';
?>
