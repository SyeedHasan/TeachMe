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

    public function getRollNumber()
    {
        $userid = $this->user['id'];
        $row = mysqli_query($this->con, "SELECT rollNo from studentInfo WHERE studentID='$userid' ");
        $row = mysqli_fetch_array($row);
        return $row['rollNo'];

    }
}
