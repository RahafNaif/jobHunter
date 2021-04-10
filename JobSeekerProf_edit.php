
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link type="text/css" href="styles/ProfStylyLast.css" rel="stylesheet" />
    <link rel="icon" href="img/icon.png">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/Notifications.css" />
    <!-- <link rel="stylesheet" href="styles\JobListingStylesF.css" /> -->
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <!-- <link rel="stylesheet" href="styles\prostylee.css" /> -->
    <link rel="stylesheet" href="styles/Footer.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Job Details | Job Seeeker</title>
    <style>
        div.absolute {
            position: absolute;
            left: 30px;
            top: 80px;
            right: 0;


        }
    </style>

</head>


<body>


    <!-- popup for notifications -->
    <div class="popup" id="popup">
        <div class="popup-inner">
            <a href="#" id="closeIcon" class="closeIcon"><i class="material-icons">close</i></a>
            <div class="notificationList">
                <ul>
                    <li class="notificationRow">
                        <div class="notificationIcon">
                            <i class="material-icons">notifications_active</i>
                        </div>
                        <div class="content">
                            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h3>
                            <p class="date">
                                February 11th 2021
                            </p>
                        </div>
                    </li>
                    <li class="notificationRow">
                        <div class="notificationIcon">
                            <i class="material-icons">notifications_active</i>
                        </div>
                        <div class="content">
                            <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h3>
                            <p class="date">
                                February 11th 2021
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- header and logo -->
    <span class="logo"><img src="img/logo.PNG" alt="logo"></span>
    <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
    <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z"
                style="stroke: none; fill: #8CB3F4;"></path>
        </svg></div>
    <header>
        <nav>
            <ul class="navLinks1">
                <li><a href="home.html">Home</a></li>
                <li><a href="job-seeker.html">Job Seekers</a></li>
                <li><a href="#">My Jobs</a>
                    <ul>
                        <li><a href="JobListing.html">All Jobs</a></li>
                        <li><a href="PostAJob.php">Post a Job</a></li>
                    </ul>
                </li>

                <li><a href="myAdvices.html"> My Advices </a></li>
            </ul>
            <ul class="navLinks2">
                <li><a href="#popup" class="notification"><i class="material-icons">notifications</i></a></li>
                <li><a href="#"><i class="material-icons">person</i></a>
                    <ul>
                        <li><a href="EmployerProfile_Eidt.html">Profile</a></li>
                        <li><a href="home.html">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!--
        body
        header
            nav


        main
            .JobHeader
                svg #companySVG
                h1
                h5
            .details
                h4
                h6
                p
                    ol
                    li
                h4
                p
                    ul
                    li
            .sideBar
                h5
                p
        

    -->

    <nav></nav>



    <main>
        <div class="JobHeader">
            <!--from github-->
            <!-- Company svg -->

            <div class="companySVG">
         

                <g id="surface1">
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(16.862745%,27.45098%,54.509804%);fill-opacity:1;"
                        d="M 85.738281 52.195312 C 85.738281 31.246094 68.613281 14.261719 47.492188 14.261719 C 26.371094 14.261719 9.246094 31.246094 9.246094 52.195312 C 9.246094 73.144531 26.371094 90.125 47.492188 90.125 C 68.613281 90.125 85.738281 73.144531 85.738281 52.195312 Z M 85.738281 52.195312 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(96.862745%,69.019608%,46.27451%);fill-opacity:1;"
                        d="M 24.136719 40.28125 L 72.414062 40.28125 C 73.367188 40.28125 74.136719 41.054688 74.136719 42.007812 L 74.136719 73.039062 C 74.136719 73.992188 73.367188 74.765625 72.414062 74.765625 L 24.136719 74.765625 C 23.1875 74.765625 22.414062 73.992188 22.414062 73.039062 L 22.414062 42.007812 C 22.414062 41.054688 23.1875 40.28125 24.136719 40.28125 Z M 24.136719 40.28125 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(98.039216%,59.215686%,27.45098%);fill-opacity:1;"
                        d="M 74.136719 42.007812 L 74.136719 73.039062 C 74.136719 73.992188 73.367188 74.765625 72.414062 74.765625 L 48.277344 74.765625 L 48.277344 40.28125 L 72.414062 40.28125 C 73.367188 40.28125 74.136719 41.054688 74.136719 42.007812 Z M 74.136719 42.007812 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;"
                        d="M 67.242188 31.660156 L 67.242188 74.765625 L 29.308594 74.765625 L 29.308594 24.765625 C 29.3125 24.25 29.546875 23.761719 29.949219 23.4375 C 30.339844 23.097656 30.867188 22.949219 31.378906 23.039062 L 65.863281 29.9375 C 66.679688 30.105469 67.257812 30.828125 67.242188 31.660156 Z M 67.242188 31.660156 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;"
                        d="M 67.242188 31.660156 L 67.242188 74.765625 L 48.277344 74.765625 L 48.277344 26.488281 L 65.863281 29.9375 C 66.679688 30.105469 67.257812 30.828125 67.242188 31.660156 Z M 67.242188 31.660156 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;"
                        d="M 53.449219 59.246094 L 43.101562 59.246094 C 42.152344 59.246094 41.378906 60.019531 41.378906 60.972656 L 41.378906 74.765625 L 55.171875 74.765625 L 55.171875 60.972656 C 55.171875 60.019531 54.402344 59.246094 53.449219 59.246094 Z M 53.449219 59.246094 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;"
                        d="M 38.792969 33.386719 L 45.691406 33.386719 C 46.640625 33.386719 47.414062 34.15625 47.414062 35.109375 L 47.414062 42.007812 C 47.414062 42.957031 46.640625 43.730469 45.691406 43.730469 L 38.792969 43.730469 C 37.839844 43.730469 37.070312 42.957031 37.070312 42.007812 L 37.070312 35.109375 C 37.070312 34.15625 37.839844 33.386719 38.792969 33.386719 Z M 38.792969 33.386719 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;"
                        d="M 38.792969 45.453125 L 45.691406 45.453125 C 46.640625 45.453125 47.414062 46.226562 47.414062 47.179688 L 47.414062 54.074219 C 47.414062 55.027344 46.640625 55.800781 45.691406 55.800781 L 38.792969 55.800781 C 37.839844 55.800781 37.070312 55.027344 37.070312 54.074219 L 37.070312 47.179688 C 37.070312 46.226562 37.839844 45.453125 38.792969 45.453125 Z M 38.792969 45.453125 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(93.333333%,96.078431%,99.215686%);fill-opacity:1;"
                        d="M 50.863281 33.386719 L 57.757812 33.386719 C 58.710938 33.386719 59.484375 34.15625 59.484375 35.109375 L 59.484375 42.007812 C 59.484375 42.957031 58.710938 43.730469 57.757812 43.730469 L 50.863281 43.730469 C 49.910156 43.730469 49.136719 42.957031 49.136719 42.007812 L 49.136719 35.109375 C 49.136719 34.15625 49.910156 33.386719 50.863281 33.386719 Z M 50.863281 33.386719 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(93.333333%,96.078431%,99.215686%);fill-opacity:1;"
                        d="M 50.863281 45.453125 L 57.757812 45.453125 C 58.710938 45.453125 59.484375 46.226562 59.484375 47.179688 L 59.484375 54.074219 C 59.484375 55.027344 58.710938 55.800781 57.757812 55.800781 L 50.863281 55.800781 C 49.910156 55.800781 49.136719 55.027344 49.136719 54.074219 L 49.136719 47.179688 C 49.136719 46.226562 49.910156 45.453125 50.863281 45.453125 Z M 50.863281 45.453125 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;"
                        d="M 55.171875 60.972656 L 55.171875 74.765625 L 48.277344 74.765625 L 48.277344 59.246094 L 53.449219 59.246094 C 54.402344 59.246094 55.171875 60.019531 55.171875 60.972656 Z M 55.171875 60.972656 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;"
                        d="M 50.863281 33.386719 L 57.757812 33.386719 C 58.710938 33.386719 59.484375 34.15625 59.484375 35.109375 L 59.484375 42.007812 C 59.484375 42.957031 58.710938 43.730469 57.757812 43.730469 L 50.863281 43.730469 C 49.910156 43.730469 49.136719 42.957031 49.136719 42.007812 L 49.136719 35.109375 C 49.136719 34.15625 49.910156 33.386719 50.863281 33.386719 Z M 50.863281 33.386719 " />
                    <path
                        style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;"
                        d="M 50.863281 45.453125 L 57.757812 45.453125 C 58.710938 45.453125 59.484375 46.226562 59.484375 47.179688 L 59.484375 54.074219 C 59.484375 55.027344 58.710938 55.800781 57.757812 55.800781 L 50.863281 55.800781 C 49.910156 55.800781 49.136719 55.027344 49.136719 54.074219 L 49.136719 47.179688 C 49.136719 46.226562 49.910156 45.453125 50.863281 45.453125 Z M 50.863281 45.453125 " />
                </g>
                </svg>

            </div>

            <!-- end Company svg -->
            <?php
    if (!($database = mysqli_connect("localhost", "root", "")))
        die("<p>Could not connect to database</p>");

    if (!mysqli_select_db($database, "jobhunter"))
        die("<p>Could not open URL database</p>");


    $email = $_SESSION['email'];

    $query = "select * from joobseeker WHERE email='$email'";
    $result = mysqli_query($database, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        $firstName=$date['firstName'];
        $lastName=$data['lastName'];
        $email=$data ['email'];
        $password=$date['password'];
        $birthDate=$data['birthDate'];
        $gender=$data['gender'];
        $nationality=$data['nationality'];
        $city=$data['city'];
        $phone=$data['phone'];
        $major=$data['major'];
        $experince=$data['experince'];
        $skills=$data['skills'];
        $currentJob=$data['currentJob'];
    } else {
        echo "There are no info.";
        exit();
    }

    ?>
        </div>

<form method="POST" action="JobSeekerProf_edit.php" > 
        <div class="details">
            <img src="img/person_JobDetails.svg" alt="Admin" class="circle" style="width:128px;height:128px;">
            <h4><?php echo $firstName ?> <?php echo $lastName ?></h4>
            <h4><?php echo  $currentJob ?></h4>
            <p><?php echo $city ?></p>
            <img style="transform:translateY(40%)" src="img/Screen Shot 1442-07-16 at 4.29.48 PM.png" alt="Admin"
                class="circle" width="50">
        </div>

        <div class="details1">

            <ul>
                <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                    <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-globe margin-right-2 icon-inline">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                        </svg>Website</h6>
                    <span class="gray-color">https://Rahaf.com</span>
                </li>
                <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                    <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-github margin-right-2 icon-inline">
                            <path
                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                            </path>
                        </svg>Github</h6>
                    <span class="gray-color">@Rahaf</span>
                </li>

                <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                    <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-instagram margin-right-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>Instagram</h6>
                    <span class="gray-color">@Rahaf</span>
                </li>
                <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                    <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-facebook margin-right-2 icon-inline text-primary">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>Facebook</h6>
                    <span class="gray-color">@Rahaf</span>
                </li>
            </ul>
        </div>
        </div>


<div class="sideBar">
<div class="titleAndValueDiv">
<h3>Full Name</h3>
<input type="text" name="jobseekername" value="<?php echo $firstName ?> <?php echo $lastName ?>" style="width:100%; height: 50%; font-size: medium;"></input></div>
            <div class="titleAndValueDiv">
<h3>Birth Date </h3>
<input type="text" value= "<?php echo $birthDate?>"  style="width:100%; height: 50%; font-size: medium;"></input>
</div>
 <div class="titleAndValueDiv">
<h3>Nationality</h3>
<input type="text" id="nationality" name= "JSnationality " value="<?php echo $nationality; ?> "style="width:100%; height: 50%; font-size: medium;"></input>
 </div>
<div class="titleAndValueDiv">
<h3>Phone</h3>
<input type="text" id = "phone" name = "JSphone" value="<?php echo $phone; ?> " style="width:100%; height: 50%; font-size: medium;"></input>
<div class="titleAndValueDiv">
 <h3>Gender</h3>
<input type="text" id = "gender" name = "JSgender"  value="<?php echo $gender; ?>" style="width:100%; height: 50%; font-size: medium;"></input>
</div>
<div class="titleAndValueDiv">
<h3>Current Job</h3>
<input type="text" id="currentJob" name= "JScurrentJob" value="<?php echo $currentJob ?> " style="width:100%; height: 50%; font-size: medium;"></input>
</div>
</div>
<div class="titleAndValueDiv">
 <h3>Major</h3>
 <script>
        $( document ).ready(function() {

          $("#major").val('<?php echo $major;?>');
        });
        </script>
        <select>
     
 <select id="major" required name="major">
<option value="">Select a major</option>
<option value="Accounting & Finance">Accounting & Finance</option>
<option value="Agriculture & Forestry">Agriculture & Forestry</option>
<option value="Archaeology">Archaeology</option>
<option value="Architecture">Architecture</option>
<option value="Art">Art</option>
<option value="Biological Sciences">Biological Sciences</option>
<option value="Business & Management">Business & Management</option>
<option value="Chemical Engineering">Chemical Engineering</option>
<option value="Chemistry">Chemistry</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Communication & Media Studies">Communication & Media Studies</option>
<option value="Computer Science">Computer Science</option>
<option value="Economics & Econometrics">Economics & Econometrics</option>
<option value="Education">Education</option>
<option value="Electrical & Electronic Engineering">Electrical & Electronic Engineering</option>
<option value="General Engineering">General Engineering</option>
<option value="Geography">Geography</option>
<option value="Geology, Environmental, Earth & Marine Sciences">Geology, Environmental, Earth & Marine Sciences</option>
<option value="Law">Law</option>
<option value="Mathematics & Statistics">Mathematics & Statistics</option>
<option value="Mechanical & Aerospace Engineering">Mechanical & Aerospace Engineering</option>
<option value="Medicine & Dentistry">Medicine & Dentistry</option>
</select>

 </div></div></div>
 <div class="sideBar1">
<div class="row gutters-sm">
<div class="column-6 margin-bottom-3">
<div class="card h-100">
<div class="card-body">
<h3 class="display-flex align-center  margin-bottom-3"><i
class="material-icons text-info margin-right-2"> </i>Exprince <span
 style="position: absolute;left: 90%;top:2%;cursor: pointer;"><br>
/////////<h3>+</h3>
</span></h3><span style="position: absolute;left: 90%;top:2%;cursor: pointer;"></span>
<h4>Chief Technology Officer </h4>
<h5>Tweeq Full-Time </h5>
<small>Jul 2020- Present </small>
<div class="progress margin-bottom-3" style="height: 5px">
</div>
<h4>Advisor</h4>
<h5>Tamkeen Technology </h5>
 <small>Dec 2017 - May 2020 </small>
<div class="progress margin-bottom-3" style="height: 5px">
 </div>
<h4>Cloud Services </h4>
<h5>STC Solution</h5>
<small>Mar 2015- Nov 2017</small>
 <div class="progress margin-bottom-3" style="height: 5px">
 </div></div></div>
 <div class="column-5 margin-bottom-3">
<div class="card h-100">
 <div class="card-body">
<h4 class="display-flex align-center  margin-bottom-3"><i
 class="material-icons text-info margin-right-2"> </i> Skills <span
 style="position: absolute;left: 90%;top:2%;cursor: pointer;"><br>
////////<h3>+</h3>
 </span></h4><span
style="position: absolute;left: 90%;top:2%;cursor: pointer;"></span>
 <small>Web Design</small>
 <div class="progress margin-bottom-3" style="height: 5px">
 <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
 </div>
 <small>Mobile Template</small>
<div class="progress margin-bottom-3" style="height: 5px">
 <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
 </div>
 <small>Backend API</small>
<div class="progress margin-bottom-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
 aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
 </div> </div> </div> </div> </div> </div>
<button class="applyBtn" style="transform: translateX(220%);">Save <input type= "submit"name = "update"></button>
</form>
 </main>


</body>

</html>

<?php
if (isset($_POST['update'])) {
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $birthDate=$_POST['birthDate'];
    $gender=$_POST['gender'];
    $nationality=$_POST['JSnationality'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    $major=$_POST['major'];
    $currentJob=$_POST['currentJob'];

    $query = "UPDATE jobseeker SET name = '$$firstName', address = '$employerAddress', email = '$employerEmail', phone = '$employerPhone', scope = '$employerScope', description = '$employerDescription', mission = '$employerMission', vision = '$employerVision' WHERE email = '$email'";
    $result = mysqli_query($database, $query);

    if ($result) {
?>
        <script>
            window.location = "JobSeekerViewProf.php";
        </script>
<?php
    } else {
        print 'Error';
        exit();
    }
}

