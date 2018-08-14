<?php
    
?>

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
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>

    <nav class="navbar navbar-expand-xl navbar-dark bg-black">

        <a class="navbar-brand" href="home.php">
            <!-- Dont remove the spacing. It doesn't help with the logo -->
            <span class="firstLetter">P</span>len<span class="firstLetter">T</span>ree
            <!-- <img src="assets/images/logos/pl.png" width="30" height="30" alt=""> -->
        </a>

        <!-- These are the logos without the toggling effect applied to them -->
        <div class="d-flex order-lg-1 ml-auto pr-2">
            <ul class="navbar-nav flex-row">
                <li class="nav-item mx-2 mx-lg-0">
                    <a class="nav-link white" href="login.php">
                        Login
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link white hover-3" href="signup.php">Signup</a>
                </li> -->
            </ul>
        </div>

    </nav>

    <div class="mainHeader colorA">
        <h3 class="head">Teach More. Learn More.</h3>
        <p id='para'>Connect.Learn.Share</p>
        <p>Create an account on PlenTree today and join the community.</p>
        <?php if(isset($_GET['err'])){ 
            echo '<p style="color:red">Kindly select one of these signup options.</p>';
        } ?>
        <a href="signUp.php?desg=teacher" class="button">I'm a teacher</a>
        <a href="signUp.php?desg=student" class="button">I'm a student</a>
        <img class="colorA-img" src="assets/images/bgPictures/p.png" alt="">
    </div>

    <div class="mainHeader colorB">
        <!-- FEATURES -->

        <div class="content">
            <div class="imgContainer">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer">
                <h1>Effective Learning</h1>
                <p class="content-summary">With intuitive features enabling to grow more in 
                learning and adapt effective learning techniques such as e-quiz, 
                it helps you take quizzes created by teacher.</p>
            </div>
        </div>

        <div class="content">

            <div class="imgContainer-right">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer-left">
                <h1>Single Access Point</h1>
                <p class="content-summary"> A single gateway or logon to identify approved users, 
                making it unnecessary to sign onto each of the different systems that provide portal content, 
                for example, the e-learning facility, 
                or full- text content such as digital journals or other sources of information.</p>
            </div>

        </div>

        <div class="content">
            <div class="imgContainer">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer">
                <h1>Single Access Point</h1>
                <p class="content-summary"> A single gateway or logon to identify approved users, 
                making it unnecessary to sign onto each of the different systems that provide portal content, 
                for example, the e-learning facility, 
                or full- text content such as digital journals or other sources of information.</p>
            </div>
        </div>

        <div class="content">

            <div class="imgContainer-right">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer-left">
                <h1>Collaboration Tools</h1>
                <p class="content-summary">These include threaded discussions, chat, 
                and news board that offer a whole range of ways to communicate and share information. Plentree is a education network that helps connect all 
                learners with the people and resources needed to reach their full potential.</p>
            </div>

        </div>

        <div class="content">
            <div class="imgContainer">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer">
                <h1>Easy</h1>
                <p class="content-summary">It integrates/streamlines information and services, 
                improves service to students/ teacher, offers personalized/customized/targeted service,
                 improves administration efficiency, and attracts students..</p>
            </div>
        </div>

        <div class="content">

            <div class="imgContainer-right">
                <img src="assets/images/features/image_classroom.png" alt="">
            </div>
            <div class="contentContainer-left">
                <h1>Collaboration Tools</h1>
                <p class="content-summary">These include threaded discussions, chat, 
                and news board that offer a whole range of ways to communicate and share information, communicate and share information. communicate and share information.</p>
            </div>

        </div>

        <div class="footer">
            <div class="leftInfo">
                <h3>About Us</h3>
                <hr class="style1">
                <br>
                <p>
                    <i class="fas fa-map-marker-alt"></i> &nbsp; &nbsp;Head Office B-25, Clifton, Block-2, Karachi, Pakistan.</p>

                <p>
                    <i class="fas fa-phone-square"></i> &nbsp; &nbsp; (+0092-213) 4239945-30
                </p>

                <p>
                    <i class="fas fa-phone"></i> &nbsp; &nbsp; UAN: 111-294-521
                </p>

                <p>
                    <i class="fas fa-envelope"></i> &nbsp; &nbsp; info@plentree.com
                </p>

                <hr class="style1">

                <div class="socials">
                    <div style="color:white; margin-top: 0px">
                        <p>Please follow us on our socials: </p>
                        <p>
                            <i class="fab fa-facebook-f"></i> &nbsp; &nbsp; Facebook &nbsp; &nbsp;

                            <i class="fab fa-twitter"></i> &nbsp; &nbsp; Twitter &nbsp; &nbsp;

                            <i class="fab fa-linkedin-in"></i> &nbsp; &nbsp; LinkedIn &nbsp; &nbsp;

                            <i class="fab fa-youtube"></i> &nbsp; &nbsp; Youtube &nbsp; &nbsp;

                        </p>
                    </div>
                </div>

                <hr class="style1">

            </div>

            <div class="rightInfo">
                <h3>Our Location</h3>
                <hr class="style1">
                <br>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25266.484621605166!2d145.0933552408583!3d-37.665409384112046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad64a20a4d1d387%3A0x5045675218cd070!2sPlenty+VIC+3090%2C+Australia!5e0!3m2!1sen!2s!4v1531657430594"
                    width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>


        </div>

        <small style="background:black; display:block; width:100%; color:white; text-align:center;">All Rights Reserved - PlenTree (2018)</small>

    </div>

<?php
    include 'includes/footer.php';
?>