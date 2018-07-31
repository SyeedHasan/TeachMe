
<?php
    include "includes/header.php";
?>

<link rel="stylesheet" href="assets/css/class2.css">
<div="leftDiv">
    <div class="scrollbar" id="style-11">
            <div class="force-overflow"></div>
    </div>
</div>
<div class="rightDiv">
    <div class="scrollbar2" id="style-11">
        <div class="main_column">
    <form class="post_form" action="index.php" method="POST">
                    <textarea name="post_text" id="post_text" placeholder="Something to say"></textarea>
                    <input type="submit" name="post" id="post_button" value="Post">       
                    <input type="submit" name="post" id="cancel_button" value="Cancel"> 
                    <div class="logos">
                        <i class="far fa-sticky-note"></i>
                        <i class="fas fa-link"></i>
                        <i class="fas fa-briefcase"></i>
                        <i class="fab fa-google-drive"></i>
                    </div>
    </form>
</div>

                
        <div class="force-overflow2"></div>

    </div>
</div>


<?php
    include 'includes/footer.php';
?>