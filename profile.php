<?php
  include 'includes/header.php';
?>

<link rel="stylesheet" href="assets/css/profile.css">

<div class="cover">

</div>

<div class="mainBody">
    
    <div class="profilePic">
    
    </div>

    <div class="mainContent">
        <h4 class="profileName"><?php echo $user['fName'] . " " . $user['lName']; ?></h4>
        <hr>
    
    </div>
    
</div>


<?php
    include 'includes/footer.php';
?>