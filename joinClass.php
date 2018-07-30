<?php
    include "includes/header.php";
    include "includes/form_handlers/class_handler.php";
?>

<div>

    <h1>Join a Class</h1>
    <form action="joinClass.php" method="POST">
        <p>Enter the class ID: </p>

        <input type="text" name="classID" id="classID" required>

        <input type="submit" name="joinClass" value="Join Class">

    </form>

</div>



<?php
    include 'includes/footer.php';
?>