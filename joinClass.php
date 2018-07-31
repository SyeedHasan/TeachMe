<?php
    include "includes/header.php";
    include "includes/form_handlers/class_handler.php";
    
    if($userLoggedIn->returnDesignation() == "Teacher"){
        header("Location: index.php");
    }
?>

<div>
<link rel="stylesheet" href="assets/css/class.css">
<div class="column">
    <h4>Join a Class</h4>
    <hr>

    <form action="joinClass.php" method="POST">
        <div class="qName">
            <p class="formLabels">Enter class code:</p>

        <input class="textField text" type="number" name="classID" id="classID" required>

        <input class="submitBtn" type="submit" name="joinClass" value="Join Class">
</div>
    </form>

</div>



<?php
    include 'includes/footer.php';
?>