<?php 

// Teachers Version
if(isset($_POST['createClass'])){

    $className = $_POST['className'];
    $noOfStudents = 0;

    $teacherID = $user['id'];

    $classQuery = mysqli_query($con, "INSERT INTO classrooms VALUES('', '$className', '$noOfStudents')");

    $classID = mysqli_insert_id($con);
    $teacherQuery = mysqli_query($con, "INSERT INTO teacherClassroom VALUES('$teacherID', '$classID')");

    header("Location: index.php");
}

//Students Version
if(isset($_POST['joinClass'])){

    $classID = $_POST['classID'];
    $studentID = $user['id'];
    $str = "";


    $checkClass = mysqli_query($con, "SELECT classroomID FROM classrooms WHERE classroomid='$classID'");
    if(mysqli_num_rows($checkClass) == 0){
    //     echo "HI!";
    // }

    // if($checkClass){
        //No such class found. Return an error.
        $str = "<p style='color:red; text-align:center; margin: 10px 0; display:block; font-size:22px; text-transform:uppercase;'>No such class exists!</p>";
        echo $str;        
    }

    $noOfStudents = mysqli_query($con, "SELECT numStudents from classrooms WHERE classroomId='$classId'");
    $noOfStudents = mysqli_fetch_array($noOfStudents);
    $noOfStudents = $noOfStudents['numStudents'];
    $noOfStudents++;


    //Insert student in class
    $studentQuery = mysqli_query($con, "INSERT INTO classstudents VALUES((SELECT studentID from studentInfo WHERE studentId='$studentID'), (SELECT classroomID FROM classrooms WHERE classroomid='$classID'))");
    $insertStudent = mysqli_query($con, "INSERT INTO classroom (numStudents) VALUES ('$noOfStudents') ");

    if($studentQuery){
        $str = "<span style='color:green; text-align:center; margin: 10px 0; display:block; font-size:22px; text-transform:uppercase;'>Inserted all data! You're now in a class!</span>";
        echo $str;        
    }

}



?>