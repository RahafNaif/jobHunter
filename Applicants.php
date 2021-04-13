<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
  exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
  die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "JobHunter"))
  die("<p>Could not open URL database</p>");
  
if(isset($_GET['reject'])){
      $apply_ID = $_GET['applyID'];
      $query = "DELETE FROM jobseeker_apply_job  WHERE applay_ID = '$apply_ID'";

      $result = mysqli_query($database, $query);
  if($result){ ?>
  <script>
  window.onload = function() {
    if(!window.location.hash) {
      window.location = window.location + '#loaded';
      window.location.reload();
    }
  }
  </script>
  <?php }
} 
else{
  $jobID = $_POST['JOB_ID'];
  $_SESSION['jobID'] = $jobID;
}
$job =  $_SESSION['jobID'];
$email  = $_SESSION['email'];
$query = "SELECT * FROM jobseeker_apply_job, jobseeker WHERE Job_ID = '$job' AND JobSeeker_email = email";
$result = mysqli_query($database, $query);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta lang="en" />
  <title>Employer | Applicants</title>
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="styles/JobListingStyles.css" />
  <link rel="stylesheet" href="styles/Notifications.css" />
  <link rel="stylesheet" href="styles/Buttons.css" />
  <link rel="stylesheet" href="styles/NavbarStyles.css" />
  <link rel="stylesheet" href="styles/Footer.css" />
  <script src="js/Notification.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
<?php include('./NavigationBar.php'); ?>
  <h1>All Applicants</h1>
  <div class="line"></div>
  <main>
    <?php
    if ($result) {
      print '<div class="lists">';
      while ($data = mysqli_fetch_assoc($result)) {
        print '<div class="list">';
        print '<div> <img style="width: 125px" src="img/person.svg" alt="person default logo" class="defaultCompany" /> </div>';
        print '<div class="jobInfo"> <h2>' . $data['firstName'] . $data['lastName'] . '</h2> <i class="material-icons">location_on</i>';
        print '<h6 class="location"> ' . $data['city'] . '</h6>';
        print '<i class="material-icons">book</i> <h6 class="major"> ' . $data['major'] . '</h6>';
        print '<p class="jobDescription">' . $data['experince'] . '</p>';
        print '<p class="jobDescription">' . $data['skills'] . '</p>';
        print '</div>';
        print '<div class="buttons">';
        print '<form  action="setAppointment.php" method="POST"><input type = "hidden" name = "applyID" value =' .$data['applay_ID']. '><input type = "hidden" name = "jobSeekerEmail" value =' .$data['email']. '><button class="accept">Accept</button></form>';
        print '<form  action="#" method="GET"><input type = "hidden" name = "applyID" value =' .$data['applay_ID']. '><button name = "reject" class="reject">Reject</button></form> </div>';
        print '</div>';
      }
      print '</div>';
    } else
      echo "There are no emplyees.";
    ?>
  </main>
  <!-- Footer -->
  <div class="footer">
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
</body>
</html>