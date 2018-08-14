<?php

class User
{
    //Only this class has access
    private $user;
    private $con;

    //Constructor
    public function __construct($con, $user)
    {
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM regUser WHERE username='$user' ");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    public function getUsername()
    {
        return $this->user['username'];
    }

    public function getFirstAndLastName()
    {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT fName, lName FROM regUser WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['fName'] . " " . $row['lName'];
    }

    public function getProfilePic()
    {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT pictureLink FROM regUser WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['pictureLink'];
    }

    public function getUserID()
    {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT id FROM regUser WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['id'];
    }

    public function getUserIDFromUserName($name){

        $query = mysqli_query($this->con, "SELECT id FROM regUser WHERE username='$name'");
        $query = mysqli_fetch_array($query);
        return $query['id'];
    }

    public function getUserNameFromUserID($id){
        $query = mysqli_query($this->con, "SELECT username FROM regUser WHERE id='$id'");
        $query = mysqli_fetch_array($query);
        return $query['username'];
    }

    public function getRollNumber()
    {
        $userid = $this->user['id'];
        $row = mysqli_query($this->con, "SELECT rollNo from studentInfo WHERE studentID='$userid' ");
        $row = mysqli_fetch_array($row);
        return $row['rollNo'];
    }

    public function getInstitueInfo()
    {
        $userid = $this->user['id'];
        $row = mysqli_query($this->con, "SELECT instituteName from teacherInfo WHERE teacherId='$userid' ");
        $row = mysqli_fetch_array($row);
        return $row['instituteName'];
    }

    public function getPhoneNumber()
    {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT phoneNumber FROM regUser WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['phoneNumber'];
    }

    public function returnDesignation()
    {
        // Get the ID of the user -> Search in DB -> Return the name of the table
        $userid = $this->user['id'];
        $str = "";
        $teacherQuery = mysqli_query($this->con, "SELECT teacherID FROM teacherInfo where teacherID='$userid' ");

        $teacherQuery = mysqli_fetch_array($teacherQuery);

        $teacherQuery = $teacherQuery['teacherID'];

        if($teacherQuery){
            $str = "Teacher";
        }
        else {
            $str = "Student";
        }

        return $str;
    
    }

    public function returnJoinedClasses()
    {
        $userID = $this->user['id'];
        $desg = $this->returnDesignation();

        //Get the classes the user has joined, else return none as an option.
        if($desg == "Student"){
            $checkDb = mysqli_query($this->con, "SELECT classroomID FROM classStudents WHERE studentID='$userID' ");
        }
        else {
            $checkDb = mysqli_query($this->con, "SELECT classroomID FROM teacherClassroom WHERE teacherID='$userID' ");
        }

        if(mysqli_num_rows($checkDb) != 0){

            while($row = mysqli_fetch_array($checkDb)){
                $classID = $row['classroomID'];

                $className = mysqli_query($this->con, "SELECT className FROM classrooms WHERE classroomID='$classID'");
                $className = mysqli_fetch_array($className);
                $className = $className['className'];

                $str = "<option value='".$classID."'>". $classID ." - ". $className ."</option>";
                
                echo $str;

            }

        }
        else {
            //No classes found!
            $str = "<option>No classes found!</option>";
            echo $str;
        }
    
    }

    public function returnClassCount()
    {
        $userID = $this->user['id'];
        $desg = $this->returnDesignation();

        //Get the classes the user has joined, else return none as an option.
        if($desg == "Student"){
            $checkDb = mysqli_query($this->con, "SELECT COUNT(classroomID) FROM classStudents WHERE studentID='$userID' ");
        }
        else {
            $checkDb = mysqli_query($this->con, "SELECT COUNT(classroomID) FROM teacherClassroom WHERE teacherID='$userID' ");
        }

        $checkDb = mysqli_fetch_array($checkDb);
        return $checkDb[0];

        
    }

    
    public function returnClasses()
    {
        $userID = $this->user['id'];
        $desg = $this->returnDesignation();

        //Get the classes the user has joined, else return none as an option.
        if($desg == "Student"){
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM classStudents WHERE studentID='$userID' ");
        }
        else {
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM teacherClassroom WHERE teacherID='$userID' ");
        }

        if(mysqli_num_rows($checkDb) != 0){

            while($row = mysqli_fetch_array($checkDb)){
                $classID = $row['classroomId'];

                $className = mysqli_query($this->con, "SELECT className FROM classrooms WHERE classroomID='$classID'");
                $className = mysqli_fetch_array($className);
                $className = $className['className'];

                $str = "<li value='".$classID."'><a href='class.php?currClass=". $classID ."'>". $className ."</a></li>";
                
                echo $str;

            }

        }
        else {
            //No classes found!
            $str = "<option>No classes found!</option>";
            echo $str;
        }
    
    }

    public function returnRecentClass() 
    {
        $userID = $this->user['id'];
        $desg = $this->returnDesignation();

        //Get the classes the user has joined, else return none as an option.
        if($desg == "Student"){
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM classStudents WHERE studentID='$userID' ");
        }
        else {
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM teacherClassroom WHERE teacherID='$userID' ");
        }

        if(mysqli_num_rows($checkDb) != 0){

            $row = mysqli_fetch_array($checkDb);
            $classID = $row['classroomId'];

            $className = mysqli_query($this->con, "SELECT className FROM classrooms WHERE classroomID='$classID'");
            $className = mysqli_fetch_array($className);
            $className = $className['className'];

            $str = $classID;

            return $str;
        }
        else {

            //No classes found!
            $str = null;
            return $str;
        }
    
    }

        
    public function returnClassIDs()
    {
        $userID = $this->user['id'];
        $desg = $this->returnDesignation();

        //Get the classes the user has joined, else return none as an option.
        if($desg == "Student"){
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM classStudents WHERE studentID='$userID' ");
        }
        else {
            $checkDb = mysqli_query($this->con, "SELECT classroomId FROM teacherClassroom WHERE teacherID='$userID' ");
        }

        $str = array();

        if(mysqli_num_rows($checkDb) != 0){

            while($row = mysqli_fetch_array($checkDb)){
                $classID = $row['classroomId'];
                
                array_push($str, $classID);

            }

        }
        else {
            //No classes found!
            return $str;
        }

        return $str;
    
    }


}
