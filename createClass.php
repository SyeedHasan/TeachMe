<?php
    include "includes/header.php";
    include "includes/form_handlers/class_handler.php";
?>

<link rel="stylesheet" href="assets/css/class.css">
<div class="column">

    <h4>Create a Classroom</h4>
    <hr>
    <form action="createClass.php" method="POST">
    <div class="qName"><p class="formLabels">Enter a name</p>
            <input class="textField text" type="text" name="className" required>
            <input id="submitForm" name="createClass" class="submitBtn" type="submit" value="Create">
        </div>
    </form>

</div>

<?php
    include 'includes/footer.php';
?>