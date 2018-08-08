
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>PlenTree</title>

    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/icons/favicons/icons.png">
    
    <link rel="stylesheet" href="assets/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">   
    <link rel="stylesheet" href="assets/css/home.css">

    <style>
    form {
        position:absolute;
        top:-4px;
    }

    </style>

</head>

<body>

<?php

require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");
include("includes/classes/Quiz.php");

if (isset($_SESSION['username'])) {
    //If user is logged in, it contains the username
    $loggedUser = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];

    $user_details_query = mysqli_query($con, "SELECT * FROM regUser WHERE username='$loggedUser'");

    $user = mysqli_fetch_array($user_details_query);
    //Has an array of all user data.
    $userLoggedIn = new User($con, $user['username']);

    $designation = $userLoggedIn->returnDesignation();

} else {
    header("Location: login.php");
}

?>

<?php


//Get id of post
if (isset($_GET['postID'])) {
    $postID = $_GET['postID'];
}


//Current user
$userID = $userLoggedIn->getUserID();

$get_likes = mysqli_query($con, "SELECT * FROM likes l JOIN likeUser lU ON lU.likeId=l.likeId WHERE
postId='$postID'");
$row = mysqli_fetch_array($get_likes);
$total_likes = mysqli_num_rows($get_likes);
$user_liked = $row['userId'];

//Like button
if (isset($_POST['like_button'])) {
    $total_likes++;
    $query = mysqli_query($con, "UPDATE post SET likes='$total_likes' WHERE postId='$postID'");
    $insertLikePost = mysqli_query($con, "INSERT INTO likes VALUES('', '$postID')");
    $insertLikePostID = mysqli_insert_id($con);
    $insertLikeUser = mysqli_query($con, "INSERT INTO likeUser VALUES('$insertLikePostID', '$userID')");

}

//Unlike button
if (isset($_POST['unlike_button'])) {
    $total_likes--;
    $query = mysqli_query($con, "UPDATE post SET likes='$total_likes' WHERE postId='$postID'");
    $likeID = mysqli_query($con, "SELECT l.likeId FROM likes l JOIN likeUser lU ON lU.likeId=l.likeId WHERE postId='$postID' AND userId='$userID'");
    $likeID = mysqli_fetch_array($likeID);
    $likeID = $likeID['likeId'];
    $deleteUser = mysqli_query($con, "DELETE FROM likeUser WHERE likeId='$likeID' ");
    $deleteLike = mysqli_query($con, "DELETE FROM likes WHERE likeId='$likeID' ");
}

//Check for previous likes
$newNumLikes = mysqli_query($con, "SELECT COUNT(*) FROM likes l JOIN likeUser lU ON lU.likeId=l.likeId WHERE postId='$postID'");
if(!$newNumLikes){
    echo '  <form action="like.php?postID=' . $postID . '" class="likeForm" method="POST">
                <input type="submit" class="comment_like" name="like_button" value="Like">
                <div class="like_value">
                    ' . $total_likes . ' Likes
                </div>
            </form>
        ';   
}
$newNumLikes = mysqli_fetch_array($newNumLikes);
$newNumLikes = $newNumLikes[0];

if ($newNumLikes > 0) {
    echo '<form action="like.php?postID=' . $postID . '" method="POST">
                <input type="submit" class="comment_like" name="unlike_button" value="Unlike">
                <div class="like_value">
                    ' . $total_likes . ' Likes
                </div>
            </form>
        ';
} else {
    echo '<form action="like.php?postID=' . $postID . '" class="likeForm" method="POST">
                <input type="submit" class="comment_like" name="like_button" value="Like">
                <div class="like_value">
                    ' . $total_likes . ' Likes
                </div>
            </form>
        ';
}

?>





</body>
</html>
