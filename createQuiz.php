
<?php
include "includes/header.php";

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
            <input class="textField text" type="text" name="qTime" required>
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
<<<<<<< HEAD

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
            <div class="quest" >
                <p class="quizlabels">Correct Answer</p>
                <input class="textField text" type="text" name="correctAnswer">
            </div>
        </div>

        <!-- On pressing this plus button, re-create the entire form -->

        <i class="fas fa-plus-circle"></i>

        <input id="submitQuest" class="submitBtn" type="submit" value="Save Changes">

    </form>
=======
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
>>>>>>> a202926a09f5c9c031150ffe17d6864c99d3f76a

<script src="assets/js/jqueryV3.js"></script>
<script>

<<<<<<< HEAD
</div>

=======
$('.fa-plus-circle').on("click", function(){
    $(".mainTemplate").append($("#qsTemplate").html());
});
</script>
>>>>>>> a202926a09f5c9c031150ffe17d6864c99d3f76a


<script src="assets/js/quiz.js"></script>
<?php
include 'includes/footer.php';
?>
