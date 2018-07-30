<?php
    include "includes/header.php";
    include "includes/form_handlers/class_handler.php";
?>

<div>

    <h1>Create a Class</h1>
    <form action="createClass.php" method="POST">
        <p>Enter a name</p>
        <input type="text" name="className" id="className" required>
        <input type="submit" name="createClass" value="Create Class">
    </form>

</div>



<?php
    include 'includes/footer.php';
?>