<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 2) {
  header("location: LogIn.php");
  exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
  die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "JobHunter"))
  die("<p>Could not open URL database</p>");

$jobSeekerEmail = $_SESSION['email'];
$_SESSION['jobID'] = $_GET['JOB_ID'];
$_SESSION['Page'] = $_GET['thePage'];
$jobID = $_SESSION['jobID'];
$Page = $_SESSION['Page'];


$query = "INSERT INTO jobseeker_apply_job (JobSeeker_email, JOB_ID) VALUES ('".$jobSeekerEmail."','".$_POST['JOB_ID']."');";
if (isset($_POST['Apply'])) {
  $result = mysqli_query($database, $query);
  if ($result) {
    header( 'location: Myapplicationlist.php');
    exit();
  } else {
    echo "An error occured while applying to the job.";
  }

} //end  if(isset($_POST['Apply']))

$query2 = "SELECT * FROM job WHERE ID = '$jobID'";
$result2 = mysqli_query($database, $query2);
if ($result2) {
  while ($data = mysqli_fetch_assoc($result2)) {

    $major = $data['major'];
    $position = $data['position'];
    $jobType = $data['jobType'];
    $companyName = $data['companyName'];
    $title = $data['title'];
    $description = $data['description'];
    $skills = $data['skills'];
    $qualifications = $data['qualifications'];
    $gender = $data['gender'];
    $salary = $data['salary'];
    $city = $data['city'];
    $emaillem=$data['employer_email'];

  }
}

include_once $Page . '.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles/JobDetailsPopUp.css" />
</head>

<body>


  <div class="jobDeatailsContainer">
    <div class="closeBtn">

      <a class="closeIcon" href="<?php echo $Page . '.php'; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="30">
          <g>
            <path d="M0,0h24v24H0V0z" fill="none" />
          </g>
          <g>
            <g>
              <path d="M18.3,5.71L18.3,5.71c-0.39-0.39-1.02-0.39-1.41,0L12,10.59L7.11,5.7c-0.39-0.39-1.02-0.39-1.41,0l0,0 c-0.39,0.39-0.39,1.02,0,1.41L10.59,12L5.7,16.89c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0L12,13.41l4.89,4.89 c0.39,0.39,1.02,0.39,1.41,0l0,0c0.39-0.39,0.39-1.02,0-1.41L13.41,12l4.89-4.89C18.68,6.73,18.68,6.09,18.3,5.71z" />
            </g>
          </g>
        </svg></a>

    </div>

    <div class="JobHeader">
      <!--from github-->
      <!-- Company svg -->

      <div class="companySVG">
        <?xml version="1.0" encoding="UTF-8"?>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100pt" height="116pt" viewBox="0 0 100 116" version="1.1">
          <g id="surface1">
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(16.862745%,27.45098%,54.509804%);fill-opacity:1;" d="M 92.710938 60.355469 C 92.710938 36.054688 73.011719 16.355469 48.710938 16.355469 C 24.410156 16.355469 4.710938 36.054688 4.710938 60.355469 C 4.710938 84.65625 24.410156 104.355469 48.710938 104.355469 C 73.011719 104.355469 92.710938 84.65625 92.710938 60.355469 Z M 92.710938 60.355469 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;" d="M 60.371094 40.015625 C 60.371094 46.640625 54.996094 52.015625 48.371094 52.015625 C 41.742188 52.015625 36.371094 46.640625 36.371094 40.015625 C 36.371094 33.386719 41.742188 28.015625 48.371094 28.015625 C 54.996094 28.015625 60.371094 33.386719 60.371094 40.015625 Z M 60.371094 40.015625 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(63.529412%,75.686275%,93.72549%);fill-opacity:1;" d="M 48.371094 56.015625 C 36.21875 56.015625 26.371094 65.863281 26.371094 78.015625 L 26.371094 82.015625 C 26.371094 85.328125 29.054688 88.015625 32.371094 88.015625 L 64.371094 88.015625 C 67.683594 88.015625 70.371094 85.328125 70.371094 82.015625 L 70.371094 78.015625 C 70.371094 65.863281 60.519531 56.015625 48.371094 56.015625 Z M 48.371094 56.015625 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;" d="M 70.371094 78.015625 L 70.371094 82.015625 C 70.371094 85.328125 67.683594 88.015625 64.371094 88.015625 L 48.371094 88.015625 L 48.371094 56.015625 L 49.710938 56.015625 C 50.269531 56.015625 50.808594 56.015625 51.328125 56.175781 L 52.507812 56.375 L 53.53125 56.59375 L 54.230469 56.773438 L 55.128906 57.035156 L 56.390625 57.492188 C 57.214844 57.808594 58.015625 58.183594 58.789062 58.613281 C 65.929688 62.453125 70.378906 69.90625 70.371094 78.015625 Z M 70.371094 78.015625 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(96.862745%,69.019608%,46.27451%);fill-opacity:1;" d="M 55.210938 79.253906 L 50.210938 67.253906 C 49.894531 66.515625 49.171875 66.039062 48.371094 66.039062 C 47.566406 66.039062 46.84375 66.515625 46.53125 67.253906 L 41.53125 79.253906 C 41.261719 79.925781 41.375 80.691406 41.828125 81.253906 L 46.828125 87.253906 C 47.210938 87.710938 47.773438 87.976562 48.371094 87.976562 C 48.964844 87.976562 49.53125 87.710938 49.910156 87.253906 L 54.910156 81.253906 C 55.363281 80.691406 55.480469 79.925781 55.210938 79.253906 Z M 55.210938 79.253906 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(98.039216%,59.215686%,27.45098%);fill-opacity:1;" d="M 54.910156 81.292969 L 49.910156 87.292969 C 49.527344 87.75 48.964844 88.015625 48.371094 88.015625 L 48.371094 66.015625 C 49.175781 66.019531 49.902344 66.507812 50.210938 67.253906 L 50.667969 68.375 L 55.210938 79.253906 C 55.496094 79.9375 55.378906 80.722656 54.910156 81.292969 Z M 54.910156 81.292969 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(91.764706%,95.294118%,98.039216%);fill-opacity:1;" d="M 58.789062 58.652344 C 52.289062 55.132812 44.449219 55.132812 37.949219 58.652344 L 46.949219 69.433594 C 47.324219 69.8125 47.835938 70.027344 48.371094 70.027344 C 48.902344 70.027344 49.414062 69.8125 49.789062 69.433594 Z M 58.789062 58.652344 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.901961%,70.196078%,94.901961%);fill-opacity:1;" d="M 60.371094 40.015625 C 60.371094 46.640625 54.996094 52.015625 48.371094 52.015625 L 48.371094 28.015625 C 54.996094 28.015625 60.371094 33.386719 60.371094 40.015625 Z M 60.371094 40.015625 " />
            <path style=" stroke:none;fill-rule:nonzero;fill:rgb(84.313725%,88.627451%,94.901961%);fill-opacity:1;" d="M 58.789062 58.652344 L 50.667969 68.375 L 49.789062 69.433594 C 49.410156 69.808594 48.902344 70.015625 48.371094 70.015625 L 48.371094 56.015625 L 49.710938 56.015625 C 50.269531 56.015625 50.808594 56.015625 51.328125 56.175781 L 52.507812 56.375 L 53.53125 56.59375 L 54.230469 56.773438 L 55.128906 57.035156 L 56.390625 57.492188 C 57.210938 57.832031 58.015625 58.21875 58.789062 58.652344 Z M 58.789062 58.652344 " />
          </g>
        </svg>


      </div>

      <!-- end Company svg -->
      <h1 style="font-weight :bolder"> <?php
                                        echo '' . $position; ?></h1>
      <h5> <form action="EmployerProfile.php" method="post" style="display: inline;">
      <input type="hidden" name="viewinfo" value="<?php echo $emaillem ?> ">
        <button name="viewi" style="outline: none; background-color:transparent; border: none; padding: 0;width:fit-content;cursor:pointer;color: #192d50; display: inline;" > 
        <?php echo '' . $companyName; ?></button></form> | <?php
                echo '' . $city; ?>
      </h5>
    </div>


    <div class="details">
      <h4 style="font-weight:bolder ;">Job Description</h4>
      <p>
        <?php
        echo '' . $description; ?>
      </p>
      <h6 style="font-weight: bold;">Required Skills</h6>
      <p>
        <?php
        echo '' . $skills; ?>
      </p>
      <h6 style="font-weight: bold;">Rrequired Qualifications</h6>
      <p id="QualificationsP">
        <?php
        echo '' . $qualifications; ?>
      </p>
      <!-- apply Buttton -->

      <form action="JobDetailsPopUp.php" method="POST">
        <input type="hidden" name="JOB_ID" value="<?php
                                                  echo '' . $jobID; ?>">
        <div class="applyBtn">
          <input name="Apply" value="Apply" type="submit" />
      </form>
    </div>
  </div>


  <div class="sideBar">
    <div class="titleAndValueDiv">
      <h5>Job Type</h5>
      <p><?php
          echo '' . $jobType; ?></p>
    </div>
    <div class="titleAndValueDiv">
      <h5>Gender</h5>
      <p><?php
          echo '' . $gender; ?></p>
    </div>
    <div class="titleAndValueDiv">
      <h5>Location</h5>
      <p><?php
          echo '' . $city; ?></p>
    </div>
    <div class="titleAndValueDiv">
      <h5>Salary Starts From</h5>
      <p> <?php
          echo '' . $salary; ?> SR</p>
    </div>

  </div>

  </div>
  <div class="overlay"></div>

</body>

</html>