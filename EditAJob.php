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
  <link type="text/css" href="styles/forms.css" rel="stylesheet" />
  <script src="js/Notification.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <title>Edit A Job</title>
</head>

<body>
  <?php
  $jobID = $_POST['JOB_ID'];
  $query = "SELECT * FROM job WHERE ID = '$jobID' ";
  $result = mysqli_query($database, $query);

  if ($result) {
    while ($data = mysqli_fetch_assoc($result)) {
      //1
      //2
      $location = $data['city'];
      //3
      $major = $data['major'];
      //4
      $position = $data['position'];
      //5
      //6
      //7
      $jobType = $data['jobType'];
      //8
      $jobDescription = $data['description'];
      //9
      $requiredSkills = $data['skills'];
      //10
      $requiredQ = $data['qualifications'];
      //11
      $gender = $data['gender'];
      //12
      $salary = $data['salary'];
      //13
    } //end while ($data = mysqli_fetch_assoc($result))
  } //end if ($result)
  else
    echo "Query Error";

  if (isset($_POST['save'])) {
    $major =  $_POST['major'];
    $position = $_POST['position'];
    $jobDescription =  $_POST['jobDescription'];
    $requiredSkills =  $_POST['requiredSkills'];
    $requiredQ =  $_POST['requiredQualifications'];
    $location = $_POST['location'];
    $jobType = $_POST['jobType'];
    $gender = $_POST['gender'];
    $salary = $_POST['salary'];

    $myquery = "UPDATE `job` SET 
            city='$location',
            major='$major',
            position='$position',
            jobType='$jobType',
            description='$jobDescription',
            skills='$requiredSkills',
            qualifications='$requiredQ',
            gender='$gender',
            salary='$salary'
            WHERE ID='$jobID';
            ";
    $result = mysqli_query($database, $myquery);

    if ($result) {
      header("location: jobLisiting.php");
    } else
      echo "An error occured while updating the job.";

    header("location: JobListing.php");
    exit();
  } // end if(isset($_POST['save']))


  if (isset($_POST['delete'])) {
    $myquery = "DELETE FROM `job`
    WHERE ID='$jobID';
    ";
    $result = mysqli_query($database, $myquery);

    if ($result) {
      header("location: jobLisiting.php");
    } else
      echo "An error occured while updating the job.";

    header("location: JobListing.php");
    exit();
  } // end if(isset($_POST['delete']))
  ?>

<?php include('./NavigationBar.php'); ?>

  <form action="EditAJob.php" method="POST">
    <input type="hidden" name="JOB_ID" value='<?php echo $jobID; ?>' />
    <fieldset>
      <legend class="postLegend">Edit A Job</legend>
      <div class="inputDiv">
        <label for="position">Job Position</label>
        <input autofocus required id="position" name="position" type="text" value="<?php print $position; ?>" />
      </div>

      <div class="inputDiv" id="majorDiv">
        <label for="major">Major </label>
        <script>
          $(document).ready(function() {

            $("#major").val('<?php echo $major; ?>');
          });
        </script>
        <select id="major" required name="major">

          <option disabled value="">Select a major</option>
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
        <!--https://stackoverflow.com/questions/8763869/append-input-text-field-with-value-of-a-div  -->
      </div>

      <div class="inputDiv">
        <label for="location"> Location</label>
        <input required id="location" type="text" name="location" value=<?php echo $location; ?> />

      </div>
      <div class="inputDiv">
        <label for="salary" id="SalaryL"> Salary Starts From </label>
        <input required type="number" name="salary" min="0" id="salary" value=<?php echo $salary; ?> />
        <!--https://stackoverflow.com/questions/7372067/is-there-any-way-to-prevent-input-type-number-getting-negative-values -->
      </div>

      <label class="notFormHeader">Job Type</label>
      <script>
        $(document).ready(function() {
          if ('<?php echo $jobType; ?>' == "Full Time") {
            $('#Full_Time').attr('checked', 'checked');
          } else {
            $('#Part_Time').attr('checked', 'checked');
          }
        });
      </script>
      <label class="rLabel">
        <input type="radio" required name="jobType" id="Full_Time" value="Full Time" />
        Full-time
      </label>

      <label class="rLabel">
        <input type="radio" required name="jobType" id="Part_Time" value="Part Time" />
        Part-time
      </label>



      <label>Gender</label>
      <script>
        $(document).ready(function() {
          if ('<?php echo $gender; ?>' == "Female") {
            $('#Female').attr('checked', 'checked');
          } else {
            $('#Male').attr('checked', 'checked');
          }
        });
      </script>
      <label class="rLabel">
        <input required type="radio" required name="gender" value="Female" id="Female" />
        Female
      </label>

      <label class="rLabel">
        <input required type="radio" name="gender" id="Male" value="Male" />
        Male
      </label>



      <div class="inputDiv">
        <label for="jobDescription"> Job Description</label>
        <textarea required id="jobDescription" name="jobDescription" style="resize: none">
          <?php echo $jobDescription; ?></textarea>
      </div>

      <div class="inputDiv">
        <label for="requiredSkills"> Required Skills</label>
        <textarea required id="requiredSkills" name="requiredSkills" style="resize: none"><?php echo $requiredSkills; ?></textarea>
      </div>

      <div class="inputDiv">
        <label for="requiredQ"> Rrequired Qualifications</label>
        <textarea required id="requiredQ" name="requiredQualifications" style="resize: none"><?php echo $requiredQ; ?></textarea>
      </div>

      <div class="buttons">
        <form method="post" action="EditAJob.php" style="display: inline;">
          <input type="submit" value="Delete" id="deleteBtn" name="delete" />
        </form>

        <input type="submit" value="Save" name="save" />
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

</html>