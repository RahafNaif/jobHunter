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

$email  = $_SESSION['email'];
if(isset($_POST['JOB_ID']))
$jobID = $_POST['JOB_ID'];
$query = "SELECT * FROM job WHERE ID = '$jobID' ";
$result = mysqli_query($database, $query);

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <link type="text/css" href="styles/postEditJob.css" rel="stylesheet" />
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
            <li><a href="PostAJob.php">Post a Job</a></li>
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
    <?php
      //1
      //2
      $location='';
      //3
      $major='';
      //4
      $position='';
      //5
      //6
      //7
      $jobType='';
      //8
      $jobDescription='';
      //9
      $requiredSkills='';
      //10
      $requiredQ='';
      //11
      $gender='';
      //12
      $salary='';
      //13
if ($result) {
  while ($data = mysqli_fetch_assoc($result)) {
      //1
      //2
      $location = $data ['city'];
      //3
      $major = $data ['major'];
      //4
      $position = $data ['position'];
      //5
      //6
      //7
      $jobType = $data ['jobType'];
      //8
      $jobDescription = $data ['description'];
      //9
      $requiredSkills = $data ['skills'];
      //10
      $requiredQ = $data ['qualifications'];
      //11
      $gender = $data ['gender'];
      //12
      $salary = $data ['salary'];
      //13
    }//end while ($data = mysqli_fetch_assoc($result))
  }//end if ($result)
    else
      echo "Query Error";

    
    $iserror=false;
    $formerrors =
    array( "majorError"=> false, "positionError"=> false, 
    "jobDescriptionError"=> false, "requiredSkillsError"=> false, 
    "requiredQualificationsError"=> false, "locationError"=> false, "jobTypeError"=> false,
    "genderError"=> false,   "salaryError"=> false);
    //s
  
    //ss
    if(isset($_POST['save'])) {
  
  
      if(isset($_POST['major'])){
        if($major=="Select a major" ){
          $formerrors["majorError"]=true;
          $iserror =true;
        }}
    
    
      if(isset($_POST['position'])){
      if($position==""){
        $formerrors["positionError"]=true;
        $iserror =true;
      }
      }
    
      if(isset($_POST['jobDescription'])){
        if($jobDescription==""){
          $formerrors["jobDescriptionError"]=true;
          $iserror =true;
        }
    
      }
    
      if(isset($_POST['requiredSkills'])){
        if($requiredSkills==""){
          $formerrors["requiredSkillsError"]=true;
          $iserror =true;
        }
      }
    
      if(isset($_POST['requiredQualifications'])){
        if($requiredQ==""){
          $formerrors["requiredQualificationsError"]=true;
          $iserror =true;
        }
      }
    
      if(isset($_POST['jobType'])){
        if($jobType==""){
          $formerrors["jobTypeError"]=true;
          $iserror =true;
        }
      }
    
      if(isset($_POST['gender'])){
        if($gender==""){
          $formerrors["genderError"]=true;
          $iserror =true;
        }
      }
    
      if(isset($_POST['salary'])){
        if($salary==""){
          $formerrors["salaryError"]=true;
          $iserror =true;
        }
      }
      //end checking errors
    
      //if its correct update it
    
      if(!$iserror){
        $servername = "localhost";
        $username = "root";
        $password="";
        $dbname = "jobHunter";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If we strip tags
  
    // $major=  $_POST['major'];
    // $position= $_POST['position'];
    // $jobDescription=  $_POST['jobDescription'];
    // $requiredSkills=  $_POST['requiredSkills'];
    // $requiredQ=  $_POST['requiredQualifications'];
    // $location= $_POST['location'];
    // $jobType= $_POST['jobType'];
    // $gender= $_POST['gender'];
    // $salary=$_POST['salary']
            $query="UPDATE `job` SET 
            `city`='$location',
            `major`='$major',
            `position`='$position',
            `jobType`='$jobType',
            `description`='$jobDescription',
            `skills`='$requiredSkills',
            `qualifications`='$requiredQ',
            `gender`='$gender',
            `salary`='$salary'";
            $result=mysqli_query($database, $query);
    
            if($result){
            echo "<script> alert('Successful update');</script>";
                header("location: jobLisiting.php");}
    
            else
                echo "An error occured while inserting into the job table.";
        }//end if ($_SERVER["REQUEST_METHOD"] == "POST")
    
        header("location: JobListing.php");
        exit();
      }// end if(!$iserror)
  
   }// end if(isset($_POST['save']))
    ?>
 
    <form action="EditAJob.php" method="POST">
      <fieldset>
        <legend class="postLegend">Edit A Job</legend>
<!-- 
        <div class="inputDiv">
          <label class="theTitle" for="jobTitle"> Job Title </label>
          <input id="jobTitle" type="text" value="" />
        </div> -->
        <div class="inputDiv">
          <label for="position">Job Position</label>
          <input 
          autofocus 
          required          
          id="position"
          name="position" 
          type="text" 
          value="<?php print $position;?>" />
          
          <?php 
                          

                          if(isset($_POST['position']))
                          if(empty($_POST["position"])){
                            echo "position is required";
                          }  
                          ?>
        </div>

        <div class="inputDiv"  id="majorDiv"> 
          <label for="major">Major </label>
          <select id="major"  name="major">
            <script>
              $("#major").val("<?php echo $major?>");
            </script>
            <option value="Select a major" onclick="$('#selectMajorP').show()">Select a major</option>
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
          <p
            id="selectMajorP"
            style='display: none; margin-top: 4px; font-size: smaller; color:red;'
          >
            You need to select a major
          </p>
                                <?php 
                      

                      if(isset($_POST['major']))
                      if($_POST["major"]==="Select a major"){
                        echo "<p style = style='display: none; margin-top: 4px; font-size: smaller; color:red;'>You need to select a major</p>";
                      }



                      ?>
        </div>

        <div class="inputDiv">
          <label for="jobDescription"> Job Description</label>
          <textarea 
          required
          id="jobDescription" 
          name="jobDescription"
          style="resize: none">
          <?php echo $jobDescription;?></textarea>
          <?php          
                            if(isset($_POST['jobDescription']))
                            if(empty($_POST["jobDescription"])){
                              echo "job Description is required";
                            }
                            ?>          
        </div>

        <div class="inputDiv">
          <label for="requiredSkills"> Required Skills</label>
          <textarea 
          required
          id="requiredSkills" 
          name="requiredSkills"
          style="resize: none"><?php echo $requiredSkills;?></textarea>
        </div>

        <div class="inputDiv">
          <label for="requiredQ"> Rrequired Qualifications</label>
          <textarea 
          required
          id="requiredQ" 
          name="requiredQualifications"
          style="resize: none"><?php echo $requiredQ;?></textarea>
        </div>

        <div class="inputDiv">
          <label for="location"> Location</label>
          <input 
          required
          id="location" 
          type="text" 
          name="location"          
          value=<?php echo $location;?> />
          <?php
                                if(isset($_POST['location']))
                                if(empty($_POST["location"])){
                                  echo "location is required";
                              
                                }
                              
                              ?>
        
        </div>

        <fieldset>
          <legend class="notFormHeader">Job Type</legend>
          <script>
            if(<?php echo $jobType;?> ==="FullTime"){
              $('#FullTime').attr('checked', 'checked');
            }
            else{
              $('#partTime').attr('checked', 'checked');
            }
            
          </script>
          <label class="rLabel">
            <input type="radio"  required name="jobType" id="FullTime" value="FullTime" />
            Full-time
          </label>

          <label class="rLabel">
            <input type="radio" required name="jobType" id="partTime"  value="partTime" />
            Part-time
          </label>
        </fieldset>

        <?php
                                if(isset($_POST['jobType']))
                                if(empty($_POST["jobType"])){
                                  echo "job Type is required";
                              
                                }
                              
                              ?>
        <fieldset>
        <legend>Gender</legend>
        <script>
            if(<?php echo $gender;?> ==="Female"){
              $('#Female').attr('checked', 'checked');
            }
            else{
              $('#Male').attr('checked', 'checked');
            }
            
          </script>
        <label class="rLabel">
          <input required type="radio" required name="gender" value="Female" id="Female"  />
            Female
        </label>

        <label class="rLabel" id="Male">
          <input required type="radio"  name="gender" id="Male" value="Male"/>
            Male
        </label>
                              <?php
                                if(isset($_POST['gender']))
                                if(empty($_POST["gender"])){
                                  echo "gender is required";
                              
                                }
                              ?>
        </fieldset>

        <div class="inputDiv">
          <label for="salary" id="SalaryL"> Salary Starts From </label>
          <input 
          required
          type="number" 
          name="salary"
          min="0" 
          id="salary" 
          value=<?php echo $salary;?> />
          <!--https://stackoverflow.com/questions/7372067/is-there-any-way-to-prevent-input-type-number-getting-negative-values -->
          <?php
                                  if(isset($_POST['salary']))
                                  if(empty($_POST["salary"])){
                                    echo "salary Input is required";
                                
                                  }
                                
                                ?>
        </div>

        <input type="button" value="Delete"/>
        <input type="submit" value="Save" name ="save" />

      </fieldset>
    </form>

    <!-- Footer -->
    <div class="footer">
      <div class="footer-content">
        <p>Contact us</p>
        <span class="material-icons">facebook</span>
        <a href="mailto:jobhunter@ksu.com"
          ><span class="material-icons">email</span></a
        >
      </div>
      <div class="shape-footer" style="height: 150px; overflow: hidden">
        <svg
          viewBox="0 0 500 150"
          preserveAspectRatio="none"
          style="height: 100%; width: 100%"
        >
          <path
            d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z"
            style="stroke: none; fill: #8cb3f4"
          ></path>
        </svg>
      </div>
    </div>
  </body>
</html>