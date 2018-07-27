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



    <!-- BOOTSTRAP CDNs -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>



</body>

</html>