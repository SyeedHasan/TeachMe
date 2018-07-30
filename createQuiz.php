
<?php
    include "includes/header.php";
?>

<link rel="stylesheet" href="assets/css/quiz.css">

<div class="column">
    <h4>Create a Quiz</h4>
    <hr>

    <p>Fill the following fields:</p>
    
    <form action="createQuiz.php" class="createForm" method="post">
        <div class="qName"><p class="formLabels">Quiz Name</p>
            <input class="textField text" type="text" name="qName">
        </div>
        <div class="qTime">
            <p class="formLabels">Quiz Time</p>
            <input class="textField text" type="text" name="qTime">
        </div>
        
    </form>

</div>





<?php
    include 'includes/footer.php';
?>
