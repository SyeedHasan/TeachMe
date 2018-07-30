<?php
    include "includes/header.php";
?>

<div>

    <h1>Create a Class</h1>
    <form action="createClass.php" method="POST"></form>
    <p>Enter a name</p>
    <input type="text" name="className" id="className">
    <input type="submit" name="createClass" value="Create Class">
    </form>

</div>



<?php
    include 'includes/footer.php';
?>