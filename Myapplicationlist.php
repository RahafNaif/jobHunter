<?php
session_start();

if (!isset($_SESSION['email']) ){
    header("location: LogIn.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title> Job Seeker | My applications list</title>
    <meta lang="en">
    <link rel="stylesheet" href="styles/JobListStyles.css" />
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <link rel="stylesheet" href="styles/Notifications.css" />
    <link rel="stylesheet" href="styles/Footer.css" />
    <script src="js/Notification.js"></script>
    <link rel="icon" href="img/icon.png">
    <meta lang="en">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script>
        
    
     //   $(document).ready(function(){
        
      //  $('.applicants').click(function () { 
            $('.modal').css('display','block');
          // 
      //  });
        
      //  $('.close').click(function(){
          //  $('.modal').css('display','none');
           
    //    });
        
    //    });
        
            
         
            </script>
</head>

<body>
  <!-- popup for notifications -->
  <?php include('./NavigationBar.php'); ?>
    <!-- body -->
    <h1> My applications</h1>
    <div class="line"></div>
    <main>
        <?php
        if (!($database = mysqli_connect("localhost", "root", "")))
            die("<p>Could not connect to database</p>");

        if (!mysqli_select_db($database, "jobhunter"))
            die("<p>Could not open URL database</p>");
        $email = $_SESSION['email'];
        $query = "SELECT * FROM jobseeker_apply_job,jobseeker,job  WHERE email='$email' AND JobSeeker_email=email AND Job_ID=ID ";
         
        $result = mysqli_query($database, $query);
        
        if ($result) {
            $applay=0;
            
            while ($data = mysqli_fetch_assoc($result)) {
                $name = $data['position'];
                $companyName = $data['companyName'];
                $city = $data['city'];
                $tybepart = $data['jobType'];
                $description = $data['description'];
                $salary = $data['salary'];
                $applay_job=$data['applay_ID'];
                $statusj=$data['statusjob'];
                $emaillem=$data['employer_email'];
                $applay=1;
               
                ?>
       
        <div class="lists">
            <!-- Job List -->
            
            <div class="list">
                <form action="EmployerProfile.php" method="post">
                    <input type="hidden" name="viewinfo" value="<?php echo $emaillem ?> ">
                <div><button name="viewi" style="outline: none; background-color: rgba(234, 243, 250, 0.8); border: none; padding: 1%;background-repeat: no-repeat;width: 150px;height: 180px;curser:pointrt;" >
                    <img src="img/company.svg" style="margin: 1%;" alt="company default logo" class="defaultCompany" />
                </div></button></form>
                <!-- job description -->
                
                <div class="jobInfo">
                    <h2> <?php echo $name;?> </h2>
                    <span>
                        <svg class="locationIcon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            height="24" viewBox="0 0 24 24" width="24">
                            <g>
                                <rect fill="none" height="24" width="24" />
                            </g>
                            <g>
                                <path
                                    d="M12,2c-4.2,0-8,3.22-8,8.2c0,3.18,2.45,6.92,7.34,11.23c0.38,0.33,0.95,0.33,1.33,0C17.55,17.12,20,13.38,20,10.2 C20,5.22,16.2,2,12,2z M12,12c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2C14,11.1,13.1,12,12,12z" />
                            </g>
                        </svg>
                    </span> 
                    <h6 class="location"><?php echo $city; ?></h6>
                    <span>
                        <svg class="majorIcon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            height="24" viewBox="0 0 24 24" width="24">
                            <g>
                                <path d="M0,0h24v24H0V0z" fill="none" />
                            </g>
                            <g>
                                <path
                                    d="M4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2H6C4.9,2,4,2.9,4,4z M11,4h5v6.12 c0,0.39-0.42,0.63-0.76,0.43L13.5,9.5l-1.74,1.05c-0.33,0.2-0.76-0.04-0.76-0.43V4z" />
                            </g>
                        </svg>
                    </span>
                    <h6 class="major"> <?php echo $companyName; ?> </h6>
                    <p class="jobDescription">
                    <?php echo $description; ?>
                    </p>
                    <h5>Starting salary <span class="salary"> <?php echo $salary;?> </span></h5>
                    <span class="workIcon"> <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                            viewBox="0 0 24 24" fill="black" width="24px" height="24px">
                            <g>
                                <g>
                                    <rect fill="none" height="24" width="24" y="0" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M20,6h-4V4c0-1.11-0.89-2-2-2h-4C8.89,2,8,2.89,8,4v2H4C2.89,6,2.01,6.89,2.01,8L2,19c0,1.11,0.89,2,2,2h16 c1.11,0,2-0.89,2-2V8C22,6.89,21.11,6,20,6z M14,6h-4V4h4V6z" />
                                </g>
                            </g>
                        </svg></span>
                    <h6 class="work"> <?php echo $tybepart; ?> </h6>
                </div> </a>
                <!-- buttons  -->
                <div class="buttons">
                
                <?php
             
                $query1 = "SELECT * FROM appointment,jobseeker_apply_job WHERE applay_JID=applay_ID AND applay_ID='$applay_job'";
                       
                $result1 = mysqli_query($database, $query1);
                $enter=0;
                $nothingg=0;
                 if ($result1) {
                   $datetake;
                   $timetake;
                        while ($data1= mysqli_fetch_assoc($result1)) {
                          $status1 = $data1['statuss'];
                          if($status1==2)
                          $enter=1;
                          $datetake1 = $data1['date'];
                          $datetake = date("d-m-Y", strtotime( $datetake1));
                          $timetake = $data1['time'];
                          $nothingg = 1;
                        }
                        if($nothingg==0)
                        echo " <br>";
                        else 
                          if($enter==0){
                              
               
                        ?>
                       
                        <form  action="popselect.php" method="POST">
                        <input type="hidden" name="applayID" value="<?php echo   $applay_job ; ?>">
                        <button  class="applicants" name="selectapp"  >Select Appointment</button>  </form>
                   <?php } else{ echo '<br><button class="edit1"> Your Apoointment:<br>    Date:'.$datetake.'<br>    Time:'.$timetake.'<br> </button>' ; ?> <?php }}?>
                    <form  action="Myapplicationlist.php" method="POST">
                        <input type="hidden" name="applayID" value="<?php echo   $applay_job ; ?>">
                        <button class="edit" name="cancel">Cancel</button> </form>
                    
                </div>
            </div>   
       <?php  if($applay ==0) {?>
        <div class="lists">
            <!-- Job List -->
            <br> <br>  
            <div class="listno">  you don't have any applications job!! </div></div> 

       <?php
}}}


else echo "you don't have any applications job!!";
    
?>      

          
    </main> </div> 
    
    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <p>Contact us</p>
            <span class="material-icons">facebook</span>
            <a href="mailto:jobhunter@ksu.com"><span class="material-icons">email</span> </a>


        </div>

        <div class="shape-footer" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150"
                preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z"
                    style="stroke: none; fill: #8CB3F4;"></path>
            </svg></div>
    </div> </div>
</body>

</html>
<?php
if(isset($_POST['cancel'])){
    $id=$_POST['applayID'];
    $query = "DELETE FROM jobseeker_apply_job  WHERE applay_ID='$id'";
         
    $result = mysqli_query($database, $query);
if($result){
    


?>
<script>
   window.onload = function() {
	if(!window.location.hash) {
		window.location = window.location + '#loaded';
		window.location.reload();
	}
}
</script>
<?php }} ?>
