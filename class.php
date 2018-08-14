
<?php
    include "includes/header.php";
    if(isset($_GET['currClass'])) {
        $selectedClass = $_GET['currClass'];
        $_SESSION['selectedClass'] = $selectedClass;
    }
    else {
        $_SESSION['selectedClass'] = null;
    }

?>

<link rel="stylesheet" href="assets/css/class2.css">
<div class="leftDiv">
    <div class="scrollbar" id="style-11">
        <p class="head">Classes</p>
        <hr>
        <ul class="allClasses" >
            <?php $userLoggedIn->returnClasses(); ?>
        </ul>


        <a href="<?php
            
            if($userLoggedIn->returnDesignation() == "Student"){
                echo "joinClass.php?redirect=true"; 
            }
            else {
                echo "createClass.php";
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
        
        
        <div class="force-overflow"></div>
    </div>
</div>

<div class="rightDiv">
    <div class="scrollbar2" id="style-11">
        <div class="main_column">
            <form class="post_form" action="class.php?currClass=<?php echo $selectedClass; ?>" method="POST">
                <textarea name="post_text" id="post_text" placeholder="Something to say"></textarea>
                <input type="submit" name="submitPost" id="post_button" value="Post">
                <input type="reset" name="cancelPost" id="cancel_button" value="Cancel">
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
            <img id="loading" src="assets/images/gif/loading1.gif" width="100" >

        </div>

        
        <div class="force-overflow2"></div>
    </div>

</div>

<script src="assets/js/jqueryV3.js"></script>
<script>

    let userLoggedIn = '<?php echo $user['username']; ?>';
    let className1 = '<?php echo $_SESSION['selectedClass'];  ?>';

    $(document).ready(function(){
        $('#loading').show();
        
        //Original AJAX request for loading first posts
        $.ajax({
            url: "includes/handlers/ajax_load_class_posts.php",
            type: "POST",
            data: "userLoggedIn=" + userLoggedIn + "&className1=" + className1,
            cache:false,
            success: function(data){
                    //Returned with posts so hide loading
                    $('#loading').hide();
                    $('.posts_area').append(data);
            }
        });

        $('#selectClass option[value="<?php echo $_SESSION['selectedClass'];?>"]').prop('selected', true);

    });

</script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootbox.min.js"></script>



</body>

</html>