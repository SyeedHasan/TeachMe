<?php
    include 'includes/header.php';

    if(isset($_POST['classOption'])){
        if($userLoggedIn->returnDesignation() == "Student"){
            header("Location: joinClass.php");
        }
        else {
            header("Location: createClass.php");
        }
    }

    // Set designation
    if($userLoggedIn->returnDesignation() == "Student"){
        $_SESSION['userDesg']  = "Student";
    }
    else {
        $_SESSION['userDesg'] = "Teacher";
    }

?>

    <style>
        body {
            min-width: 1350px;
            /* Tempo Soln */
        }
    </style>

    <!-- YOUR CODE HERE -->
    <div class="mainContainer">

        <div class="userInfo">

            <img class="userPic" src="<?php echo $user['pictureLink'] ?>" alt=""> 
            <hr>
            <p class="name"><?php echo $user['fName'] . " " . $user['lName']; ?></p>
            <hr>

            <div class="allInfo">

                <p class="rollNumber"><label>
                <?php if($_SESSION['userDesg'] == "Student"){
                    echo "Roll Number:</label>  ". $userLoggedIn->getRollNumber() ."";
                }
                else {
                    echo "Institute Name: </label> ". $userLoggedIn->getInstitueInfo() ."";
                }
                ?></p>
                <p class="emailAdd"><label>Email Address:</label> <?php echo $user['email']; ?></p>
                <p class="userName"><label>User Name:</label> <?php echo $user['username']; ?></p>
                <p></p>
                <p></p>
                <p></p>

            </div>

        </div>

        <div class="postArea">
            <div class="main_column column">
                <form class="post_form" action="index.php" method="POST">
                    <textarea name="post_text" id="post_text" placeholder="Something to say"></textarea>
                    <select name="selectClass" id="selectClass">
                        <!-- Returns options containing all classes -->
                        <?php $userLoggedIn->returnJoinedClasses(); ?> 
                    </select>
                    <br>
                    <div class="logos">
                        <i class="far fa-sticky-note"></i>
                        <i class="fas fa-link"></i>
                        <i class="fas fa-briefcase"></i>
                        <i class="fab fa-google-drive"></i>
                    </div>
                    
                    <input type="submit" name="submitPost" id="post_button" value="Post">       
                    <input type="reset" name="resetPost" id="cancel_button" value="Cancel">       
                
                </form>


                <?php 

                    //SUBMIT A POST
                    if(isset($_POST['submitPost'])){
                        $selectedClass = $_POST['selectClass'];
                        $body = $_POST['post_text'];
                        $userId = $user['id'];
                
                        $post = new Post($con, $user['username']);
                        $post->submitPost($selectedClass, $body, $userId);
                
                    }            

                ?>

                <div class="posts_area" >
                    <hr>
                    <p>Latest Posts</p>
                    
                </div>
                <p>Load More...</p>

                <img id="loading" src="assets/images/gif/loading1.gif" width="100" >

            </div>
            
        </div>

        <div class="classInfo">
            <p class="head">Assignment Center</p>
            <p>You have ___ assignments to turn in this week! </p>
            <hr>
            <p class="head">Classes</p>
            
            <p><?php 
                if($userLoggedIn->returnDesignation() == "Student"){
                   echo "Join a class? Enter the invite code here.";
                }
                else {
                    echo "Create a class for your students to join.";
                }
                ?>
            </p>
            <!-- FIX THIS FOR TEACHER! -->
            <a href="<?php 
                if($userLoggedIn->returnDesignation() == "Student"){
                    echo "joinClass.php?redirect=true"; 
                }
                else {
                    echo "createClass.php?redirect=true";
                }
        
            ?>">
            <input type="submit" name="classOption" id="joinClass" value="<?php 
                if($userLoggedIn->returnDesignation() == "Student"){
                    echo "Join Class";
                }
                else {
                    echo "Create Class";
                }
            ?>">
            </a>

        </div>

    </div>


<script src="assets/js/jqueryV3.js"></script>
<script>

    let userLoggedIn = '<?php echo $user['username']; ?>';

    $(document).ready(function(){
        $('#loading').show();
        
        //Original AJAX request for loading first posts
        $.ajax({
            url: "includes/handlers/ajax_load_posts.php",
            type: "POST",
            data: "userLoggedIn=" + userLoggedIn,
            cache:false,
            success: function(data){
                    //Returned with posts so hide loading
                    $('#loading').hide();
                    $('.posts_area').append(data);
            }
        });

    });

</script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>



</body>

</html>