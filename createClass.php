<?php
    include "includes/header.php";
    include "includes/form_handlers/class_handler.php";
?>
    <link rel="stylesheet" href="assets/css/class.css">
<div class="column">

<<<<<<< HEAD
<div>

    <h1>Create a Class</h1>
    <form action="createClass.php" method="POST">
        <p>Enter a name</p>
        <input type="text" name="className" id="className" required>
        <input type="submit" name="createClass" value="Create Class">
=======
    <h4>Create a Classroom</h4>
    <hr>
    <form action="createClass.php" method="POST">
    <div class="qName"><p class="formLabels">Enter a name</p>
            <input class="textField text" type="text" name="qName">
            <input id="submitForm" class="submitBtn" type="submit" value="Create">
        </div>
>>>>>>> 61b9a3ce75af0af3051547f83fec55cf2490434a
    </form>

</div>



<?php
    include 'includes/footer.php';
?>