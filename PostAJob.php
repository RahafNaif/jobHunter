<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 1) {
  header("location: LogIn.php");
  exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
  die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "JobHunter"))
  die("<p>Could not open URL database</p>");
?>
<!DOCTYPE html>

<html lang="en">

<head>
<meta charset="utf-8" />
  <link rel="icon" href="img/icon.png" />
  <link rel="stylesheet" href="styles/Buttons.css" />
  <link rel="stylesheet" href="styles/Notifications.css" />
  <link rel="stylesheet" href="styles/NavbarStyles.css" />
  <link rel="stylesheet" href="styles/Footer.css" />
  <link type="text/css" href="styles/Forms.css" rel="stylesheet" />
  <script src="js/Notification.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Post A Job</title>
</head>

<body>

  <?php
  $major = isset($_POST['major']) ? $_POST['major'] : "";
  $jobTitle = isset($_POST['jobTitle']) ? $_POST['jobTitle'] : "";
  $position = isset($_POST['position']) ? $_POST['position'] : "";
  $jobDescription = isset($_POST['jobDescription']) ? $_POST['jobDescription'] : "";
  $requiredSkills = isset($_POST['requiredSkills']) ? $_POST['requiredSkills'] : "";
  $requiredQualifications = isset($_POST['requiredQualifications']) ? $_POST['requiredQualifications'] : "";
  $location = isset($_POST['location']) ? $_POST['location'] : "";
  $jobType = isset($_POST['jobType']) ? $_POST['jobType'] : "";
  $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
  $salary = isset($_POST['salary']) ? $_POST['salary'] : "";
  //end 
  if (isset($_POST['postJob'])) {


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $sessionEmail = $_SESSION['email'];
      $companyName = "SELECT name FROM employer where email='$sessionEmail'";
      $result2 = mysqli_query($database, $companyName);

      if ($result2) {
        while ($row = mysqli_fetch_array($result2)) {


          $result3 = $row['name'];
        }
      } else
        echo "An error occured while inserting into the job table.";


      $query = "INSERT INTO `job`(`city`, `major`, `position`, `jobType`,
           `description`, `skills`, `qualifications`, `gender`, `salary`,`companyName`, `employer_email`,title ) 
           VALUES (' $location','$major','$position','$jobType',
          '$jobDescription','$requiredSkills', '$requiredQualifications',
          '$gender','$salary','$result3','$sessionEmail','$jobTitle')";
      $result = mysqli_query($database, $query);

      if ($result)
        header("location: jobLisiting.php");

      else
        echo "An error occured while inserting into the job table.";
    } //end if ($_SERVER["REQUEST_METHOD"] == "POST")

    header("location: JobListing.php");
    exit();
  } // end if(isset($_POST['postJob']))


  ?>


  <?php include('./NavigationBar.php'); ?>

  <form action="PostAJob.php" method="post">
    <fieldset class=" left">
      <legend class="postLegend">Post A Job</legend>
      
      <div class="inputDiv">
        <label for="position">Job Position</label>
        <input autofocus required id="position" name="position" type="text" placeholder="e.g. Software Engineer, Sales Manager" />
      </div>
 
        <div class="inputDiv">
          <label class="theTitle" for="jobTitle"> Job Title </label>
          <input required id="jobTitle" type="text" name="jobTitle" placeholder="Add a descriptive job title"/>
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
      </div>

      <div class="inputDiv">
        <label for="location"> Location</label>
        <input required id="location" name="location" type="text" placeholder="Enter job location" />
      </div>
      <div class="inputDiv">
        <label for="salary" id="SalaryL"> Salary Starts From </label>
        <input required type="number" name="salary" min="0" id="salary" />
        <!--https://stackoverflow.com/questions/7372067/is-there-any-way-to-prevent-input-type-number-getting-negative-values -->
      </div>

      <label class="notFormHeader">Job Type</label>

      <label class="rLabel">
        <input type="radio" name="jobType" required checked="checked" value="Full Time" />
        Full-time
      </label>

      <label class="rLabel">
        <input type="radio" name="jobType" required value="Part Time" />
        Part-time
      </label>


      <label>Gender</label>

      <label class="rLabel">
        <input required type="radio" name="gender" value="Female" checked="checked" />
        Female
      </label>

      <label class="rLabel" id="Male">
        <input required type="radio" name="gender" value="Male" />
        Male
      </label>
    </fieldset>
    <fieldset class="right">
      <div class="inputDiv">
        <label for="jobDescription"> Job Description</label>
        <textarea required style="resize: none" name="jobDescription" id="jobDescription" placeholder="Describe the responsibilities for this job"></textarea>
      </div>

      <div class="inputDiv">
        <label for="requiredSkills"> Required Skills</label>
        <textarea required id="requiredSkills" name="requiredSkills" placeholder="Describe the skills required for this job"></textarea>
      </div>

      <div class="inputDiv">
        <label for="requiredQ"> Rrequired Qualifications</label>
        <textarea required id="requiredQ" name="requiredQualifications" placeholder="Describe the qualifications required for this job"></textarea>
      </div>
      <div class="buttons">


        <a href="JobListing.php"><input type="button" value="Cancel" id="deleteBtn" name="cancel" /></a>
        <input type="submit" value="Post" id="postBtn" name='postJob' />
      </div>
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

<script>
  window.onload = function() {
    if (!window.location.hash) {
      window.location = window.location + '#loaded';
      window.location.reload();
    }
  }
</script>
</html>