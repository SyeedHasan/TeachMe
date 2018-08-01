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

    public function getRollNumber()
    {
        $userid = $this->user['id'];
        $row = mysqli_query($this->con, "SELECT rollNo from studentInfo WHERE studentID='$userid' ");
        $row = mysqli_fetch_array($row);
        return $row['rollNo'];
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

}
