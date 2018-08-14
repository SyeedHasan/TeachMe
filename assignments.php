<?php
    include 'includes/header.php';
?>

<link rel="stylesheet" href="assets/css/assignments.css">

<!-- What's Due Info  -->
<div class="dueInfo">
    <p class="dueHeader">
        What's Due
        <br>                    
        <select name="selectClass" id="allClasses">
            <!-- Returns options containing all classes -->
            <?php $userLoggedIn->returnJoinedClasses(); ?> 
        </select>
        
        <!-- <span class="dueFooter">
            All Classes
            <i class="fas fa-chevron-down"></i>
        </span> -->
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
    <p class="pHead">Following assignments are due: </p>
    <div class="allToDos">
        <input type="checkbox" name="" id=""><label>Complete SRE Assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id=""><label>Complete WE Assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id=""><label>Complete CAO assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id=""><label>Complete PL assignment &nbsp;&nbsp;</label>
    </div>
</div>

<div class="finished noDisplay">
    <p class="pHead">Finished assignments will be displayed here:</p>
    <div class="allFinished">
        <input type="checkbox" name="" id="" checked><label>Complete SRE Assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id="" checked><label>Complete WE Assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id="" checked><label>Complete CAO assignment &nbsp;&nbsp;</label>
        <input type="checkbox" name="" id="" checked><label>Complete PL assignment &nbsp;&nbsp;</label>
    </div>
</div>

<script src="assets/js/assignments.js"></script>
<?php
    include 'includes/footer.php';
?>