
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
            <form class="post_form" action="index.php" method="POST">
                <textarea name="post_text" id="post_text" placeholder="Something to say"></textarea>
                <input type="submit" name="submitPost" id="post_button" value="Post">
                <input type="reset" name="cancelPost" id="cancel_button" value="Cancel">
                <div class="logos">
                    <i class="far fa-sticky-note"></i>
                    <i class="fas fa-link"></i>
                    <i class="fas fa-briefcase"></i>
                    <i class="fab fa-google-drive"></i>
                </div>
            </form>

            <div class="posts_area" >
                <hr>
                <p>Latest Posts</p>    
            </div>
        </div>

        
        <div class="force-overflow2"></div>
    </div>

</div>

<?php
    include 'includes/footer.php';
?>