<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 2) { //i edit this one to restrict jobsseker from enter the emplyer page
    header("location: logIn.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "jobhunter"))
    die("<p>Could not open URL database</p>");

$email  = $_SESSION['email'];
$query = "SELECT * FROM job WHERE ID = '$email' ";
$result = mysqli_query($database, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = explode(" ", $_POST['fullName']);
    $firstName = $fullName[0];
    $lastName = $fullName[1];
    print_r($fullName);
    $password = $_POST['password'];
    $birthDate = $_POST['birthDate'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $major = $_POST['major'];
    $experince = $_POST['experince'];
    $currentJob = $_POST['currentJob'];
    $Website = $_POST['Website'];
    $Github = $_POST['Github'];
    $Instagram = $_POST['Instagram'];
    $Faceboock = $_POST['Facebook'];

    $query = "UPDATE `jobseeker`
              SET
                firstName = '$firstName',
                lastName = '$lastName', 
                email = '$email',
                password='$password',
                birthDate = '$birthDate', 
                gender = '$gender',
                nationality = '$nationality',
                city = '$city',
                phone = '$phone',
                major = '$major',
                experince = '$experince',
                currentJob = '$currentJob',
                Website='$Website',
                Github='$Github',
                Instagram='$Instagram',
                Facebook='$Faceboock'
            WHERE jobseeker.email = '$email' ";

    if (mysqli_query($database, $query)) {
        header("Location: JobSeekerViewProf.php");

        exit();
    } else {
        echo $query;
        echo " $database->error";
        exit();
    }
}


if (isset($_GET['skillName'])) {

    $skillName = $_GET['skillName'];
    $email = $_SESSION['email'];
    $query = "INSERT INTO skills (skillName, JobSeeker_email) VALUE ('$skillName', '$email')";

    if (mysqli_query($database, $query)) {
        header("Location: JobSeekerViewProf.php");
    } else {
        echo $query;
        echo " $database->error";
        exit();
    }
}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <link type="text/css" href="styles/ProfStylyLast.css" rel="stylesheet" />
    <link rel="icon" href="img/icon.png">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/Notifications.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <link rel="stylesheet" href="styles/Footer.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Profile | Job Seeker</title>


</head>


<body>

    <?php include('./NavigationBar.php') ?>



    <main>
        <div class="JobHeader">
            <div class="companySVG">
                <g id="surface1">
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(16.862745%,27.45098%,54.509804%);fill-opacity:1;" d="M 85.738281 52.195312 C 85.738281 31.246094 68.613281 14.261719 47.492188 14.261719 C 26.371094 14.261719 9.246094 31.246094 9.246094 52.195312 C 9.246094 73.144531 26.371094 90.125 47.492188 90.125 C 68.613281 90.125 85.738281 73.144531 85.738281 52.195312 Z M 85.738281 52.195312 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(96.862745%,69.019608%,46.27451%);fill-opacity:1;" d="M 24.136719 40.28125 L 72.414062 40.28125 C 73.367188 40.28125 74.136719 41.054688 74.136719 42.007812 L 74.136719 73.039062 C 74.136719 73.992188 73.367188 74.765625 72.414062 74.765625 L 24.136719 74.765625 C 23.1875 74.765625 22.414062 73.992188 22.414062 73.039062 L 22.414062 42.007812 C 22.414062 41.054688 23.1875 40.28125 24.136719 40.28125 Z M 24.136719 40.28125 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(98.039216%,59.215686%,27.45098%);fill-opacity:1;" d="M 74.136719 42.007812 L 74.136719 73.039062 C 74.136719 73.992188 73.367188 74.765625 72.414062 74.765625 L 48.277344 74.765625 L 48.277344 40.28125 L 72.414062 40.28125 C 73.367188 40.28125 74.136719 41.054688 74.136719 42.007812 Z M 74.136719 42.007812 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;" d="M 67.242188 31.660156 L 67.242188 74.765625 L 29.308594 74.765625 L 29.308594 24.765625 C 29.3125 24.25 29.546875 23.761719 29.949219 23.4375 C 30.339844 23.097656 30.867188 22.949219 31.378906 23.039062 L 65.863281 29.9375 C 66.679688 30.105469 67.257812 30.828125 67.242188 31.660156 Z M 67.242188 31.660156 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;" d="M 67.242188 31.660156 L 67.242188 74.765625 L 48.277344 74.765625 L 48.277344 26.488281 L 65.863281 29.9375 C 66.679688 30.105469 67.257812 30.828125 67.242188 31.660156 Z M 67.242188 31.660156 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;" d="M 53.449219 59.246094 L 43.101562 59.246094 C 42.152344 59.246094 41.378906 60.019531 41.378906 60.972656 L 41.378906 74.765625 L 55.171875 74.765625 L 55.171875 60.972656 C 55.171875 60.019531 54.402344 59.246094 53.449219 59.246094 Z M 53.449219 59.246094 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;" d="M 38.792969 33.386719 L 45.691406 33.386719 C 46.640625 33.386719 47.414062 34.15625 47.414062 35.109375 L 47.414062 42.007812 C 47.414062 42.957031 46.640625 43.730469 45.691406 43.730469 L 38.792969 43.730469 C 37.839844 43.730469 37.070312 42.957031 37.070312 42.007812 L 37.070312 35.109375 C 37.070312 34.15625 37.839844 33.386719 38.792969 33.386719 Z M 38.792969 33.386719 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;" d="M 38.792969 45.453125 L 45.691406 45.453125 C 46.640625 45.453125 47.414062 46.226562 47.414062 47.179688 L 47.414062 54.074219 C 47.414062 55.027344 46.640625 55.800781 45.691406 55.800781 L 38.792969 55.800781 C 37.839844 55.800781 37.070312 55.027344 37.070312 54.074219 L 37.070312 47.179688 C 37.070312 46.226562 37.839844 45.453125 38.792969 45.453125 Z M 38.792969 45.453125 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(93.333333%,96.078431%,99.215686%);fill-opacity:1;" d="M 50.863281 33.386719 L 57.757812 33.386719 C 58.710938 33.386719 59.484375 34.15625 59.484375 35.109375 L 59.484375 42.007812 C 59.484375 42.957031 58.710938 43.730469 57.757812 43.730469 L 50.863281 43.730469 C 49.910156 43.730469 49.136719 42.957031 49.136719 42.007812 L 49.136719 35.109375 C 49.136719 34.15625 49.910156 33.386719 50.863281 33.386719 Z M 50.863281 33.386719 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(93.333333%,96.078431%,99.215686%);fill-opacity:1;" d="M 50.863281 45.453125 L 57.757812 45.453125 C 58.710938 45.453125 59.484375 46.226562 59.484375 47.179688 L 59.484375 54.074219 C 59.484375 55.027344 58.710938 55.800781 57.757812 55.800781 L 50.863281 55.800781 C 49.910156 55.800781 49.136719 55.027344 49.136719 54.074219 L 49.136719 47.179688 C 49.136719 46.226562 49.910156 45.453125 50.863281 45.453125 Z M 50.863281 45.453125 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;" d="M 55.171875 60.972656 L 55.171875 74.765625 L 48.277344 74.765625 L 48.277344 59.246094 L 53.449219 59.246094 C 54.402344 59.246094 55.171875 60.019531 55.171875 60.972656 Z M 55.171875 60.972656 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;" d="M 50.863281 33.386719 L 57.757812 33.386719 C 58.710938 33.386719 59.484375 34.15625 59.484375 35.109375 L 59.484375 42.007812 C 59.484375 42.957031 58.710938 43.730469 57.757812 43.730469 L 50.863281 43.730469 C 49.910156 43.730469 49.136719 42.957031 49.136719 42.007812 L 49.136719 35.109375 C 49.136719 34.15625 49.910156 33.386719 50.863281 33.386719 Z M 50.863281 33.386719 " />
                    <path style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;" d="M 50.863281 45.453125 L 57.757812 45.453125 C 58.710938 45.453125 59.484375 46.226562 59.484375 47.179688 L 59.484375 54.074219 C 59.484375 55.027344 58.710938 55.800781 57.757812 55.800781 L 50.863281 55.800781 C 49.910156 55.800781 49.136719 55.027344 49.136719 54.074219 L 49.136719 47.179688 C 49.136719 46.226562 49.910156 45.453125 50.863281 45.453125 Z M 50.863281 45.453125 " />
                </g>
                </svg>
            </div>
            <?php
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "jobhunter"))
                die("<p>Could not open URL database</p>");

            $email = $_SESSION['email'];
            $query = "select * from jobseeker WHERE email='$email'";
            $result = mysqli_query($database, $query);

            if ($result) {
                $data = mysqli_fetch_assoc($result);
                $firstName = $data['firstName'];
                $lastName = $data['lastName'];
                $email = $data['email'];
                $password = $data['password'];
                $birthDate = $data['birthDate'];
                $gender = $data['gender'];
                $nationality = $data['nationality'];
                $city = $data['city'];
                $phone = $data['phone'];
                $major = $data['major'];
                $experince = $data['experince'];
                $skills = $data['skills'];
                $currentJob = $data['currentJob'];
                $Website = $data['Website'];
                $Github = $data['Github'];
                $Instagram = $data['Instagram'];
                $Facebook = $data['Facebook'];
            } else {
                echo "There are no info.";
                exit();
            }

            ?>
            <?php

            $email = $_SESSION['email'];
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "jobhunter"))
                die("<p>Could not open URL database</p>");
            if (isset($_POST['saveSkills'])) {
                $skillName = $_POST['skillName'];
                $query = "INSERT INTO skills (JobSeeker_email,skillName) VALUES ('$email', '$skillName')";
                $result = mysqli_query($database, $query);
            }
            ?>
        </div>
        <form action="JobSeekerProf_edit.php" method="POST" name='editProf'>
            <div class="details">
                <img src="img/person_JobDetails.svg" alt="Admin" class="circle" style="width:128px;height:128px;">
                <h4><?php echo $firstName . " " . $lastName; ?></h4>
                <h4><?php echo $currentJob ?></h4>
                <p><?php echo $city ?></p>
                <img style="transform:translateY(40%)" src="img/Screen Shot 1442-07-16 at 4.29.48 PM.png" alt="Admin" class="circle" width="50">
            </div>
            <div class="details1">
                <ul>
                    <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                        <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github margin-right-2 icon-inline">
                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>Github</h6>
                        <span class="gray-color"><input type="text" id="Github" name="Github" value=<?php echo $Github; ?>></input></span>
                    </li>
                    <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                        <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram margin-right-2 icon-inline text-danger">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>Instagram</h6>
                        <span class="gray-color"><input type="text" id="Instagram" name="Instagram" value=<?php echo $Instagram; ?>></input></span>
                    </li>
                    <li class="group-list-item display-flex justify-between align-center  flex-wrap">
                        <h6 class="margin-bottom-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook margin-right-2 icon-inline text-primary">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>Facebook</h6>
                        <span class="gray-color"><input type="text" id="Faceboock" name="Facebook" value=<?php echo $Facebook; ?>></input></span>
                    </li>
                </ul>
            </div>
            </div>

            <div class="sideBar">
                <div class="titleAndValueDiv">
                    <h3>Full Name</h3>
                    <input type="text" name="fullName" value="<?php echo $firstName . " " . $lastName; ?>" style="width:100%; height: 50%; font-size: medium;"></input>
                </div>
                <div class="titleAndValueDiv">
                    <h3>Birth Date</h3>
                    <input Required type="date" name="birthDate" value="<?php echo $birthDate; ?>" style="width:100%; height: 50%; font-size: medium;" Required></input>
                </div>
                <div class="titleAndValueDiv">
                    <h3>Nationality </h3>
                    <input Required type="text" name="nationality" style="width:100%; height: 50%; font-size: medium;" value=<?php echo $nationality; ?>> </input>
                </div>
                <div class="titleAndValueDiv">
                    <h3>City</h3>
                    <input Required type="text" name="city" value=<?php echo $city; ?> style="width:100%; height: 50%; font-size: medium;"> </input>
                </div>
                <div class="titleAndValueDiv">
                    <h3>Phone</h3>
                    <input Required type="text" id="phone" name="phone" pattern="[0]{1}[5]{1}[0-9]{8}" value=<?php echo $phone; ?> style="width:100%; height: 50%; font-size: medium;"></input>

                    <div class="titleAndValueDiv">
                        <h3>Current Job</h3>
                        <input Required type="text" name="currentJob" style="width:100%; height: 50%; font-size: medium;" value=<?php echo $currentJob ?>></input>
                    </div>
                </div>
                <div class="titleAndValueDiv">
                    <h3>Major</h3>
                    <input Required type="text" id="major" name="major" value=<?php echo $major; ?> style="width:100%; height: 50%; font-size: medium;"></input>
                </div>
            </div>


            <div class="sideBar1">
                <div class="row gutters-sm">
                    <div class="column-6 margin-bottom-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3>Update password</h3>
                                <input Required type="text" id="password" name="password" value=<?php echo $password; ?> style="width:100%; height: 50%; font-size: medium;"></input>
                                <br><br><br>
                                <h3> Experience </h3>
                                <textarea style="width:100%; height: 200%; font-size: medium;" id="vision" name="experince"><?php echo $experince; ?> </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="column-6 margin-bottom-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3> Skills </h3>
                                <input type="text" id="skillName" style="width:100%; height: 50%; font-size: medium;"></input>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" onclick=addskill()> +</button>
                <button type="submit" value="updateProfile" name="editProf"> UPDATE </button>
            </div> <br>

        </form>
    </main>


    <script>
        function addskill() {
            skillName = document.getElementById("skillName").value;
            window.location = "JobSeekerProf_edit.php?skillName=" + skillName;
        }
    </script>
</body>

</html>