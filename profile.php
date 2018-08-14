<?php
  include 'includes/header.php';

  if(isset($_GET['id'])){
    $userid = $_GET['id'];
    $user_details_query = mysqli_query($con, "SELECT * FROM regUser WHERE id='$userid'");

    $user = mysqli_fetch_array($user_details_query);
    //Has an array of all user data.
    $userLoggedIn = new User($con, $user['username']);
  }

?>

<link rel="stylesheet" href="assets/css/profile.css">

<div class="cover">

</div>

<div class="mainBody">
    
    <!-- <div class="profilePic"></div>

    <div class="mainContent">
        <h4 class="profileName"><?php echo $user['fName'] . " " . $user['lName']; ?></h4>
        <hr>
    
    </div> -->
    
    <div class="intro-display-widget">
        <div class="card-display">
            <div class="face">

            </div>
            <div class="details">
                <h4 class="name"><?php echo $user['fName'] . " " . $user['lName']; ?></h4>
                <ul>
                    <li> <i class="fas fa-user-circle"> </i> Student </li>
                    <li> <i class="fas fa-map-marker-alt"> </i> Karachi, Pakistan </li>
                    <li> <i class="fas fa-university"> </i> NED University</li>
                </ul>
            </div>
        </div>
        <div class="desc">
            This user appears to keep a touch of mystery about them. Contact them on a given medium.
        </div>
    </div>

    <div class="moreInfo">
        <p class="header">About Me</p>
        <p class="data">The user appears to keep a touch of mystery about them.</p>
    
        <p class="header">Joined Classes</p>
        <p class="data"><ul><?php $userLoggedIn->returnClasses(); ?></ul></p>

        <p class="header">Recent Activity</p>

        <p class="header">Contact Information</p>
            <p class="data">Email Address: <?php echo $user['email']; ?></p>
            <p class="data">Phone Number: <?php
                if($user['phoneNumber'] == 0){
                    echo "No number provided"; 
                } 
                else {
                    echo $user['phoneNumber'];
                }    ?></p>

    </div>
    
</div>

<?php
    include 'includes/footer.php';
?>