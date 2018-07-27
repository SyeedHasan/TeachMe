<?php

include("includes/header.php");

// ACCESSING INDIVIDUAL DB QUIZ
$row = mysqli_query($con, "SELECT * FROM quiz");
$row = mysqli_fetch_array($row);
echo $row['quizID'];
echo $row['assignedBy'];
echo $row['quizName'];

// ACCESSING QUESTIONS BASED ON QUIZ ID

// $row1 = mysqli_query($con, "SELECT questionDesc FROM questions q join quizQS QS on q.questionID = QS.questionID  join quiz qu on QS.quizID=2");
// $row1 = mysqli_query($con, "SELECT Q.questionDesc FROM questions Q join quizQS Qs on QS.questionID=q.questionID join quiz ON qs.quizID=2");
// $row2 = mysqli_fetch_array($row1);
// echo $row1[0];
// echo $row[1];

$row1 = mysqli_query($con, 
"   SELECT Q.questionDesc 
    FROM questions Q
    JOIN quizQs Qs ON Qs.questionID=Q.questionID
    JOIN quiz ON Qs.quizID=quiz.quizID AND quiz.quizID='1'
");
// while ($row = mysqli_fetch_assoc($row1)) {
//     print_r("<br>" . $row['questionDesc'] . "<br>");
// }

// ACCESSING PROPER ANSWERS AND OPTIONS BASED ON QUUIZ AND QUESTIONS
$row2 = mysqli_query($con, 
"   SELECT  O.opt1, O.opt2, O.opt3, O.corrAns
    FROM questions Q
    JOIN quizQs Qs ON Qs.questionID=Q.questionID
    JOIN quiz ON Qs.quizID=quiz.quizID AND quiz.quizID='2'
    JOIN options O ON Q.optionId=O.optionId
");

// echo '<pre>'; print_r($row2); echo '</pre>';
while ($row = mysqli_fetch_assoc($row2)) {
    print_r("<br>" .  $row['opt1']. "<br>");
    print_r("<br>" .  $row['opt2']. "<br>");
    print_r("<br>" .  $row['opt3']. "<br>");
    print_r("<br>" .  $row['corrAns']. "<br>");
}

?>

