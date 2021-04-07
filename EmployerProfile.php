<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location: LogIn.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/EmployerProfile.css" />
    <link rel="stylesheet" href="styles/Notifications.css" />
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <!--<link rel="stylesheet" href="styles/Footer.css" />-->
    <script src="js/Notification.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script type="text/javascript" src="https://kit.fontawesome.com/b6f67b378e.js"></script>
    <link rel="icon" href="img/icon.png" />
    <title>Employer | Profile</title>
</head>

<body>
    <!-- popup for notifications -->
    <div class="popup" id="popup">
        <div class="popup-inner" id="popup-inner">
            <a href="#" id="closeIcon" class="closeIcon" onclick="hideNotification()"><i class="material-icons">close</i></a>
            <div class="notificationList">
                <ul>
                    <li class="notificationRow">
                        <div class="notificationIcon">
                            <i class="material-icons">notifications_active</i>
                        </div>
                        <div class="content">
                            <h3>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            </h3>
                            <p class="date">February 11th 2021</p>
                        </div>
                    </li>
                    <li class="notificationRow">
                        <div class="notificationIcon">
                            <i class="material-icons">notifications_active</i>
                        </div>
                        <div class="content">
                            <h3>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            </h3>
                            <p class="date">February 11th 2021</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header and logo -->
    <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
    <span class="logo"><img src="img/logo.PNG" alt="logo" /></span>
    <div style="height: 150px; overflow: hidden">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
            <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8cb3f4"></path>
        </svg>
    </div>
    <header>
        <nav>
            <ul class="navLinks1">
                <li><a href="home.html">Home</a></li>
                <li><a href="jobSeekerSearch.html">Job Seekers</a></li>
                <li>
                    <a href="#">My Jobs</a>
                    <ul>
                        <li><a href="JobListing.html">All Jobs</a></li>
                        <li><a href="PostAJob.html.html">Post a Job</a></li>
                    </ul>
                </li>

                <li><a href="myAdvices.html"> My Advices </a></li>
            </ul>
            <ul class="navLinks2">
                <li>
                    <a href="#" id="notification" class="notificationIcon" onclick="showNotifications()"><i class="material-icons">notifications</i></a>
                </li>
                <li>
                    <a href="#"><i class="material-icons">person</i></a>
                    <ul>
                        <li><a href="EmployerProfile_Eidt.html">Profile</a></li>
                        <li><a href="home.html">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="company-card">
            <img class="company-logo" src="img/company.svg">
            <div class="company-account">
                <h2><?php echo $_SESSION['name'] ?> </h2>
                <h5><?php echo $_SESSION['address'] ?></h5>
                <h5><?php echo $_SESSION['scope'] ?></h5>
                <div class="socials">
                    <br>
                    <a href="mailto: <?php echo $_SESSION['email'] ?>"> <i class="material-icons">email</i> </a>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-linkedin"></i>
                </div>
            </div>
            <div class="buttons">
                <button>edit</button>
                <button>delete</button>
            </div>
        </div>
        <div class="company-info-card">
            <h3>Phone</h3>
            <p><?php echo $_SESSION['phone'] ?></p>
            <h3>Descripition of Company</h3>
            <p><?php echo $_SESSION['description'] ?></p>
            <h3>Mission</h3>
            <p><?php echo $_SESSION['mission'] ?></p>
            <h3>Vision</h3>
            <p><?php echo $_SESSION['vision'] ?></p>
        </div>
    </main>
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>Contact us</p>
            <span class="material-icons">facebook</span>
            <a href="mailto:jobhunter@ksu.com"><span class="material-icons">email</span></a>
        </div>
        <div class="shape-footer" style="height: 150px; overflow: hidden">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
                <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8cb3f4"></path>
            </svg>
        </div>
        </div>
    </footer>
</body>

</html>