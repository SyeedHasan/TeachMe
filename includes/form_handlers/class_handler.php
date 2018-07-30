<?php 

// Teachers Version
if(isset($_POST['createClass'])){

    $className = $_POST['className'];
    $noOfStudents = 0;

    $teacherID = $user['id'];

    $classQuery = mysqli_query($con, "INSERT INTO classrooms VALUES('', '$className', '$noOfStudents')");

    $classID = mysqli_query($con, "SELECT classroomID FROM classrooms WHERE className='$className' ");

    $classID = mysqli_fetch_array($classID);

    $classroomID = $classID['classroomID'];

    // FIX THIS QUERY!
    $teacherQuery = mysqli_query($con, "INSERT INTO teacherClassroom VALUES((SELECT teacherID from teacherInfo WHERE teacherID='$teacherID'), (SELECT classroomID FROM classrooms WHERE classroomid='$classroomID'))");

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

    //Insert student in class
    $studentQuery = mysqli_query($con, "INSERT INTO classstudents VALUES((SELECT studentID from studentInfo WHERE studentId='$studentID'), (SELECT classroomID FROM classrooms WHERE classroomid='$classID'))");

    if($studentQuery){
        $str = "<span style='color:green; text-align:center; margin: 10px 0; display:block; font-size:22px; text-transform:uppercase;'>Inserted all data! You're now in a class!</span>";
        echo $str;        
    }


    // echo "THIS OESNT!";





    

}



?>