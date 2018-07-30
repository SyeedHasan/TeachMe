<?php
    include "includes/header.php";
?>
    <link rel="stylesheet" href="assets/css/class.css">
<div class="column">

    <h4>Create a Classroom</h4>
    <hr>
    <form action="createClass.php" method="POST">
    <div class="qName"><p class="formLabels">Enter a name</p>
            <input class="textField text" type="text" name="qName">
            <input id="submitForm" class="submitBtn" type="submit" value="Create">
        </div>
    </form>

</div>



<?php
    include 'includes/footer.php';
?>