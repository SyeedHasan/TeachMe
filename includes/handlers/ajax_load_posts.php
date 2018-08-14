<?php

include('../../config/config.php');
include('../classes/User.php');
include('../classes/Post.php');

$limit = 10; //Number of posts to be loaded per call

//Request is the data sent from the AJAX call
$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadPosts($limit);


?>