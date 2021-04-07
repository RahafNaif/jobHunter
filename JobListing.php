<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("location: login.php");
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
            <li><a href="EmployerProfile.html">Profile</a></li>
            <li><a href="http:signout.php">logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <h1>All Posted Jobs</h1>
  <div class="line"></div>
  <main>
    <?php
    if (!($database = mysqli_connect("localhost", "root", "")))
      die("<p>Could not connect to database</p>");

    if (!mysqli_select_db($database, "JobHunter"))
      die("<p>Could not open URL database</p>");

    $name  = $_SESSION['name'];
    $query = "SELECT * FROM job WHERE companyName = " .$name. ";" ; //retreive all jobs for the current employer
    $result = mysqli_query($database, $query);

    if ($result) {
      print '<div class="lists">';
      while ($data = mysqli_fetch_row($result)) {
        print '<div class="list">';
        print '<div> <img src="img/company.svg" alt="company default logo" class="defaultCompany" /></div>';
        print '<div class="jobInfo"> <h2>' . $data[3] . '</h2> <i class="material-icons">location_on</i>';
        print '<h6 class="location"> ' . $data[1] . '</h6>';
        print '<i class="material-icons">book</i> <h6 class="major"> ' . $data[2] . '</h6>';
        print '<p class="jobDescription">' . $data[7] . '</p>';
        print '<h5>Starting salary <span class="salary">' . $data[12] . '</span></h5> <i class="material-icons">work</i>';
        print '<h6 class="work">' . $data[4] . '</h6>';
        print '/div>';
        print '<div class="buttons"> <a href="applicants.html"> <button class="applicants">Applicants</button></a> <a href="EditAJob.html"> <button class="edit">Edit</button></a></div>';
        print '/div>';
      }
      print '</div>';
    } else
      echo "There are no listed jobs.";
    ?>
  </main>
  <!--
  <main>
    <div class="lists">
      <div class="list">
        <div> <img src="img/company.svg" alt="company default logo" class="defaultCompany" /></div>
        <div class="jobInfo">
          <h2>Hiring Role</h2>
          <i class="material-icons">location_on</i>
          <h6 class="location">City, Country</h6>
          <i class="material-icons">book</i>
          <h6 class="major">Required Major, Degree</h6>
          <p class="jobDescription">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
            veritatis saepe cupiditate sequi beatae voluptate accusamus at.
            Pariatur, aperiam quaerat.
          </p>
          <h5>Starting salary <span class="salary"> $</span></h5>
          <i class="material-icons">work</i>
          <h6 class="work">Part-time/Full-time</h6>
        </div>
        <div class="buttons">
          <a href="applicants.html"> <button class="applicants">Applicants</button></a>
          <a href="EditAJob.html"> <button class="edit">Edit</button></a>
        </div>
      </div>
    </div>
  </main>
-->
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