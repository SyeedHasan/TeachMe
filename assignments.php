<?php
    include 'includes/header.php';
?>

<link rel="stylesheet" href="assets/css/assignments.css">

<!-- What's Due Info  -->
<div class="dueInfo">
    <p class="dueHeader">
        What's Due
        <br>
        <span class="dueFooter">
            All Classes
            <i class="fas fa-chevron-down"></i>
        </span>
    </p>

    <!-- <p class="dueHeader dropdown">All Classes <i class="fas fa-chevron-down"></i></p> -->
    <ul class="rightAligned">

        <!-- CHANGE THESE VALUES FROM SERVER GENERATED VALUES -->

        <li><span id="quizCount">0</span>Quizzes</li>
        <li><span id="assignmentCount">0</span>Assignments</li>
    </ul>

</div>

<div class="tabs">
    <ul>
        <!-- USE JS TO SELECT AND DE-SELECT ONE TAB -->
        <li class="tab active">To-Do</li>
        <li class="tab">Finished</li>
    </ul>
</div>

<div class="to-do">
    <p id="dateLine" >Todays Date is <span id="insertDate"></span> </p>
</div>


<script src="assets/js/assignments.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>