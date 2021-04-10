<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 1) {
  header("location: LogIn.php");
  exit();
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link type="text/css" href="styles/postEditJob.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/Buttons.css" />
  <link type="text/css" href="styles/NavbarStyles.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/Notifications.css" />
  <link type="text/css" href="styles/Footer.css" rel="stylesheet" />
  <link rel="icon" href="img/icon.png" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <script src="js/Jquery.js"></script>
  <script src="js/PostAJob.js"></script>
  <title>Post A Job</title>
</head>

<body>
  <!-- trying -->
  <!-- trying -->
  <!-- trying -->
  <!-- trying -->
  <!-- trying -->
  <?php
  $major = isset($_POST['major']) ? $_POST['major'] : "";
  $position = isset($_POST['position']) ? $_POST['position'] : "";
  $jobDescription = isset($_POST['jobDescription']) ? $_POST['jobDescription'] : "";
  $requiredSkills = isset($_POST['requiredSkills']) ? $_POST['requiredSkills'] : "";
  $requiredQualifications = isset($_POST['requiredQualifications']) ? $_POST['requiredQualifications'] : "";
  $location = isset($_POST['location']) ? $_POST['location'] : "";
  $jobType = isset($_POST['jobType']) ? $_POST['jobType'] : "";
  $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
  $salary = isset($_POST['salary']) ? $_POST['salary'] : "";
  //end 

  //s
  $iserror = false;
  $formerrors =
    array(
      "majorError" => false, "positionError" => false,
      "jobDescriptionError" => false, "requiredSkillsError" => false,
      "requiredQualificationsError" => false, "locationError" => false, "jobTypeError" => false,
      "genderError" => false,   "salaryError" => false
    );
  //s

  //ss
  if (isset($_POST['postJob'])) {


    if (isset($_POST['major'])) {
      if ($major == "") {
        $formerrors["majorError"] = true;
        $iserror = true;
      }
    }


    if (isset($_POST['position'])) {
      if ($position == "") {
        $formerrors["positionError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['jobDescription'])) {
      if ($jobDescription == "") {
        $formerrors["jobDescriptionError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['requiredSkills'])) {
      if ($requiredSkills == "") {
        $formerrors["requiredSkillsError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['requiredQualifications'])) {
      if ($requiredQualifications == "") {
        $formerrors["requiredQualificationsError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['jobType'])) {
      if ($jobType == "") {
        $formerrors["jobTypeError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['gender'])) {
      if ($gender == "") {
        $formerrors["genderError"] = true;
        $iserror = true;
      }
    }

    if (isset($_POST['salary'])) {
      if ($salary == "") {
        $formerrors["salaryError"] = true;
        $iserror = true;
      }
    }
    //end checking errors

    //if its correct inert it

    if (!$iserror) {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "jobHunter";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!($database = mysqli_connect($servername, $username, $password,  $dbname)))
          die("<p>Could not connect to database</p>");

        if (!mysqli_select_db($database,  $dbname))
          die("<p>Could not open URL database</p>");
        $sessionEmail = $_SESSION['email'];
        $companyName = "SELECT name FROM employer where email='$sessionEmail'";
        $result2 = mysqli_query($database, $companyName);

        if ($result2) {
          while ($row = mysqli_fetch_array($result2)) {


            $result3 = $row['name'];
          }
        } else
          echo "An error occured while inserting into the job table.";

        // If we strip tags

        // $major=  $_POST['major'];
        // $position= $_POST['position'];
        // $jobDescription=  $_POST['jobDescription'];
        // $requiredSkills=  $_POST['requiredSkills'];
        // $requiredQualifications=  $_POST['requiredQualifications'];
        // $location= $_POST['location'];
        // $jobType= $_POST['jobType'];
        // $gender= $_POST['gender'];
        // $salary=$_POST['salary'];


        $query = "INSERT INTO `job`(`city`, `major`, `position`, `jobType`,
           `description`, `skills`, `qualifications`, `gender`, `salary`,`companyName`, `employer_email`) 
           VALUES (' $location','$major','$position','$jobType',
          '$jobDescription','$requiredSkills', '$requiredQualifications',
          '$gender','$salary','$result3','$sessionEmail')";
        $result = mysqli_query($database, $query);

        if ($result)
          header("location: jobLisiting.php");

        else
          echo "An error occured while inserting into the job table.";
      } //end if ($_SERVER["REQUEST_METHOD"] == "POST")

      header("location: JobListing.php");
      exit();
    } // end if(!$iserror)

  } // end if(isset($_POST['postJob']))


  ?>


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
  <span class="logo"><img src="img/logo.PNG" alt="logo" /></span>
  <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
  <div style="height: 150px; overflow: hidden">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
      <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8cb3f4"></path>
    </svg>
  </div>
  <header>
    <nav>
      <ul class="navLinks1">
        <li><a href="home.php">Home</a></li>
        <li><a href="jobSeekerSearch.html">Job Seekers</a></li>
        <li>
          <a href="#">My Jobs</a>
          <ul>
            <li><a href="JobListing.html">All Jobs</a></li>
            <li><a href="PostAJob.php">Post a Job</a></li>
          </ul>
        </li>

        <li><a href="myAdvices.html"> My Advices </a></li>
      </ul>
      <ul class="navLinks2">
        <li>
          <a href="#popup" class="notification"><i class="material-icons">notifications</i></a>
        </li>
        <li>
          <a href="#"><i class="material-icons">person</i></a>
          <ul>
            <li><a href="EmployerProfile.html">Profile</a></li>
            <li><a href="home.php">Log out</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <form action="PostAJob.php" method="post">
    <fieldset>
      <legend class="postLegend">Post A Job</legend>

      <div class="inputDiv">
        <label for="position">Job Position</label>
        <input autofocus required id="position" name="position" type="text" placeholder="e.g. Software Engineer, Sales Manager" />

        <?php


        if (isset($_POST['position']))
          if (empty($_POST["position"])) {
            echo "position is required";
          }
        ?>
      </div>

      <div class="inputDiv" id="majorDiv">
        <label for="major"> Major </label>
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
        <?php


        if (isset($_POST['major']))
          if ($_POST["major"] === "") {
            echo "<p style = style='margin-top: 4px; font-size: smaller; color:red;'>You need to select a major</p>";
          }



        ?>
      </div>



      <div class="inputDiv">
        <label for="jobDescription"> Job Description</label>
        <textarea required style="resize: none" name="jobDescription" id="jobDescription" placeholder="Describe the responsibilities for this job"></textarea>
        <?php
        if (isset($_POST['jobDescription']))
          if (empty($_POST["jobDescription"])) {
            echo "job Description is required";
          }
        ?>
      </div>

      <div class="inputDiv">
        <label for="requiredSkills"> Required Skills</label>
        <textarea required id="requiredSkills" name="requiredSkills" placeholder="Describe the skills required for this job"></textarea>
        <?php

        if (isset($_POST['requiredSkills']))
          if (empty($_POST["requiredSkills"])) {
            echo "required Skills field is required";
          }

        ?>
      </div>

      <div class="inputDiv">
        <label for="requiredQ"> Rrequired Qualifications</label>
        <textarea required id="requiredQ" name="requiredQualifications" placeholder="Describe the qualifications required for this job"></textarea>

        <?php


        if (isset($_POST['requiredQualifications']))
          if (empty($_POST["requiredQualifications"])) {
            echo "required Qualifications field is required";
          }
        ?>
      </div>

      <div class="inputDiv">
        <label for="location"> Location</label>
        <input required id="location" name="location" type="text" placeholder="Enter job location" />

        <?php
        if (isset($_POST['location']))
          if (empty($_POST["location"])) {
            echo "location is required";
          }

        ?>
      </div>

      <fieldset>
        <legend class="notFormHeader">Job Type</legend>

        <label class="rLabel">
          <input type="radio" name="jobType" required checked="checked" value="FullTime" />
          Full-time
        </label>

        <label class="rLabel">
          <input type="radio" name="jobType" required value="partTime" />
          Part-time
        </label>

        <?php
        if (isset($_POST['jobType']))
          if (empty($_POST["jobType"])) {
            echo "job Type is required";
          }

        ?>
      </fieldset>

      <fieldset>
        <legend>Gender</legend>

        <label class="rLabel">
          <input required type="radio" name="gender" value="Female" checked="checked" />
          Female
        </label>

        <label class="rLabel" id="Male">
          <input required type="radio" name="gender" value="Male" />
          Male
        </label>
        <?php
        if (isset($_POST['gender']))
          if (empty($_POST["gender"])) {
            echo "gender is required";
          }
        ?>
      </fieldset>

      <div class="inputDiv">
        <label for="salary" id="SalaryL"> Salary Starts From </label>
        <input required type="number" name="salary" min="0" id="salary" />
        <!--https://stackoverflow.com/questions/7372067/is-there-any-way-to-prevent-input-type-number-getting-negative-values -->

        <?php
        if (isset($_POST['salary']))
          if (empty($_POST["salary"])) {
            echo "salary Input is required";
          }

        ?>
      </div>

      <a href="JobListing.php"><input type="button" value="Cancel" name="cancel" /></a>
      <input type="submit" value="Post" id="postBtn" name='postJob' />

    </fieldset>
  </form>


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