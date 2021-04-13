<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 1) {
  header("location: LogIn.php");
  exit();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Employer | Posted Jobs</title>
  <meta lang="en" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="styles/JobListingStyles.css" />
  <link rel="stylesheet" href="styles/Notifications.css" />
  <link rel="stylesheet" href="styles/Buttons.css" />
  <link rel="stylesheet" href="styles/NavbarStyles.css" />
  <link rel="stylesheet" href="styles/Footer.css" />
  <script src="js/Notification.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
<?php include('./NavigationBar.php') ?>
  <h1>All Posted Jobs</h1>
  <div class="line"></div>
  <main>
    <?php
    if (!($database = mysqli_connect("localhost", "root", "")))
      die("<p>Could not connect to database</p>");

    if (!mysqli_select_db($database, "jobhunter"))
      die("<p>Could not open URL database</p>");

    $email = $_SESSION['email'];
    $query = "select * from job WHERE employer_email='$email'";
    $result = mysqli_query($database, $query);


    if ($result) {
      print '<div class="lists">';
      while ($data = mysqli_fetch_assoc($result)) {
        print '<div class="list">';
        print '<div> <img src="img/company.svg" alt="company default logo" class="defaultCompany" /></div>';
        print '<div class="jobInfo"> <h2>' . $data['position'] . '</h2> <i class="material-icons">location_on</i>';
        print '<h6 class="location"> ' . $data['city'] . '</h6>';
        print '<i class="material-icons">book</i> <h6 class="major"> ' . $data['major'] . '</h6>';
        print '<p class="jobDescription">' . $data['description'] . '</p>';
        print '<h5>Starting salary <span class="salary">' . $data['salary'] . '</span></h5> <i class="material-icons">work</i>';
        print '<h6 class="work">' . $data['jobType'] . '</h6>';
        print '</div>';
        print '<div class="buttons">';
        print '<form  action="Applicants.php" method="POST"> <input type="hidden" name="JOB_ID" value=' . $data['ID'] . '> ';
        print '<button class="applicants">Applicants</button></form>';
        print '<form  action="EditAJob.php" method="POST"> <input type="hidden" name="JOB_ID" value=' . $data['ID'] . '> ';
        print '<a href="EditAJob.php"> <button class="edit">Edit</button></a></div> </form>';
        print '</div>';
      }
      print '</div>';
    } else
      echo '<div class="lists"><h2>There are no listed jobs.</h2></div>';
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