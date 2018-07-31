<?php
    include 'includes/header.php';

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

                <p class="rollNumber"><label>Roll Number: <?php echo $userLoggedIn->getRollNumber(); ?></label> </p>
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
                    <!-- 
                <img id="loading" src="assets/images/icons/loading.gif" width="100" > -->

            </div>
            
        </div>

        <div class="classInfo">
            <p class="head">Assignment Center</p>
            <p>You have ___ assignments to turn in this week! </p>
            <hr>
            <p class="head">Classes</p>
            <p>Join a class? Enter the invite code here.</p>
            <input type="submit" name="post" id="joinClass" value="Join Class">       

        </div>

    </div>



    <!-- <script src="assets/js/main.js"></script> -->
    <?php 
        include 'includes/footer.php';
    ?>