<?php
  session_start();

  if (!isset($_SESSION['email']) || $_SESSION['role'] == 1) {
    header("location: login.php");
    exit();
  }

  if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

  if (!mysqli_select_db($database, "JobHunter"))
    die("<p>Could not open URL database</p>");
    
  $apply_ID = $_POST['applyID'];
  $jobSeekerEmail = $_POST['jobSeekerEmail'];
  $email  = $_SESSION['email'];

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles/setapp.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/Notifications.css" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/setAppointmentForm.js"></script>

    <title>Job Hunter</title>
  </head>
  <body>
    <!-- popup for notifications -->
    <?php include('./NavigationBar.php'); ?>

      <div class="set-app">
        <h2>Set Appointment</h2>
        <div class="line"></div>
      </div>
      <div class="mytabs">
      
      <?php
        $query = "SELECT * FROM appointment WHERE  applay_JID='".$apply_ID."' AND jobSeeker_email='".$jobSeekerEmail."'";                
        $result = mysqli_query($database, $query);
        $result1 = mysqli_query($database, $query);
        $result2 = mysqli_query($database, $query);
        $result3 = mysqli_query($database, $query);
        $result4 = mysqli_query($database, $query);
        if($result){
          print '<input type="radio" id="tabfree" name="mytabs" checked="checked" />';
          print '<label for="tabfree">Sun</label>';
          print '<div class="tab">';
          print '<ul class="items">';
          while($data= mysqli_fetch_assoc($result)){
            $date = $data['date'];
            $timestamp = strtotime($date);
            $day = date('D', $timestamp);
            $dayNum = date('d', $timestamp);
            $month = date('M', $timestamp);
            $time = $data['time']; 
            $t='';
            $check =  substr($time,0,2);
            if ($check>=12)
              $t=" PM";
            else
              $t=" AM";
            $time = substr($time,0,5);
            $time=$time.$t;
            
            
            if ($day=='Sun'){
              print '<li class="item">';
              print '<p class="item-content">Interview</p>';
              print '<p class="item-content">'.$dayNum.''.$month.'</p>';
              print '<p class="item-content">'.$time.'</p>';
              print '</li>';
            }
          
          }
          print '</ul>';
          print '</div>';
            print '<input type="radio" id="tabsilver" name="mytabs" />';
            print '<label for="tabsilver">Mon</label>';
            print '<div class="tab">';
            print '<ul class="items">';
            while($data= mysqli_fetch_assoc($result1)){
              $date = $data['date'];
              $timestamp = strtotime($date);
              $day = date('D', $timestamp);
              $dayNum = date('d', $timestamp);
              $month = date('M', $timestamp);
              $time = $data['time']; 
              $t='';
              $check =  substr($time,0,2);
              if ($check>=12)
                $t=" PM";
              else
                $t=" AM";
              $time = substr($time,0,5);
              $time=$time.$t;

            if ($day=='Mon'){
              print '<li class="item">';
              print '<p class="item-content">Interview</p>';
              print '<p class="item-content">'.$dayNum.''.$month.'</p>';
              print '<p class="item-content">'.$time.'</p>';
              print '</li>';
            }
          
          }
          print '</ul>';
          print '</div>';
            print '<input type="radio" id="tabgold" name="mytabs" />';
            print '<label for="tabgold">Tue</label>';
            print '<div class="tab">';
            print '<ul class="items">';
          
            while($data= mysqli_fetch_assoc($result2)){
              $date = $data['date'];
              $timestamp = strtotime($date);
              $day = date('D', $timestamp);
              $dayNum = date('d', $timestamp);
              $month = date('M', $timestamp);
              $time = $data['time']; 
              $t='';
              $check =  substr($time,0,2);
              if ($check>=12)
                $t=" PM";
              else
                $t=" AM";
              $time = substr($time,0,5);
              $time=$time.$t;
            
            if($day=='Tue'){
              print '<li class="item">';
              print '<p class="item-content">Interview</p>';
              print '<p class="item-content">'.$dayNum.''.$month.'</p>';
              print '<p class="item-content">'.$time.'</p>';
              print '</li>';
            }
           
          }
          print '</ul>';
          print '</div>';
            print '<input type="radio" id="tabwed" name="mytabs" />';
            print '<label for="tabwed">Wed</label>';
            print '<div class="tab">';
            print '<ul class="items">';
          
            while($data= mysqli_fetch_assoc($result3)){
              $date = $data['date'];
              $timestamp = strtotime($date);
              $day = date('D', $timestamp);
              $dayNum = date('d', $timestamp);
              $month = date('M', $timestamp);
              $time = $data['time']; 
              $t='';
              $check =  substr($time,0,2);
              if ($check>=12)
                $t=" PM";
              else
                $t=" AM";
              $time = substr($time,0,5);
              $time=$time.$t;
            if($day=='Wed'){
              print '<li class="item">';
              print '<p class="item-content">Interview</p>';
              print '<p class="item-content">'.$dayNum.''.$month.'</p>';
              print '<p class="item-content">'.$time.'</p>';
              print '</li>';
            }
            
          }
          print '</ul>';
          print '</div>';
            print '<input type="radio" id="tabthu" name="mytabs" />';
            print '<label for="tabthu">Thu</label>';
            print '<div class="tab">';
            print '<ul class="items">';

            while($data= mysqli_fetch_assoc($result4)){
              $date = $data['date'];
              $timestamp = strtotime($date);
              $day = date('D', $timestamp);
              $dayNum = date('d', $timestamp);
              $month = date('M', $timestamp);
              $time = $data['time']; 
              $t='';
              $check =  substr($time,0,2);
              if ($check>=12)
                $t=" PM";
              else
                $t=" AM";
              $time = substr($time,0,5);
              $time=$time.$t;

            if($day=='Thu'){
              print '<li class="item">';
              print '<p class="item-content">Interview</p>';
              print '<p class="item-content">'.$dayNum.''.$month.'</p>';
              print '<p class="item-content">'.$time.'</p>';
              print '</li>';
            }
            
          }
          print '</ul>';
          print '</div>';

        }else {
          echo 'There is no seted Appointments , Add one';
        }

      ?>

        
      </div>
      <div class="add">
        
        <button class="addbtn">Add Appointment</button>
      
      </div>

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
    </div>
    <div class="addForm-parent">
      <div class="addForm">
        <a href="setAppointment.html" class="closeIcon"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            enable-background="new 0 0 24 24"
            height="24"
            viewBox="0 0 24 24"
            width="30"
          >
            <g>
              <path d="M0,0h24v24H0V0z" fill="none" />
            </g>
            <g>
              <g>
                <path
                  d="M18.3,5.71L18.3,5.71c-0.39-0.39-1.02-0.39-1.41,0L12,10.59L7.11,5.7c-0.39-0.39-1.02-0.39-1.41,0l0,0 c-0.39,0.39-0.39,1.02,0,1.41L10.59,12L5.7,16.89c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0L12,13.41l4.89,4.89 c0.39,0.39,1.02,0.39,1.41,0l0,0c0.39-0.39,0.39-1.02,0-1.41L13.41,12l4.89-4.89C18.68,6.73,18.68,6.09,18.3,5.71z"
                />
              </g>
            </g></svg
        ></a>
        <div>
          <p class="tybe">Set Appointment</p>
          <div class="line"></div>
          <br />
          <br />
        
          <form method="POST" action="setAppointment.php">
            <label for="">Select Date:</label> <input type="date" name="adddate"/><br/>
            <?php print '<input type="hidden" name="jobSeekerEmail" value='.$jobSeekerEmail.'>';
            print '<input type="hidden" name="applyID" value='.$apply_ID.'>';?>
            <br/>
            <label for="">Select Time:</label>
            <input type="time" name="addtime"/><br><br>
            <input type="submit" value="Add Appointment" name="add" >
          </form>
          
          
           <?php
           if(isset($_POST['add'])){
              $newDate = $_POST['adddate'];
              $newtime = $_POST['addtime'];
              $em= $_POST['jobSeekerEmail'];
              $id= $_POST['applyID'];
              $newtime = ''.substr($newtime,0,5).':00';
              
                $query2 = "INSERT INTO appointment(jobSeeker_email,date,time,applay_JID) VALUES('".$em."','".$newDate."','".$newtime."','".$id."');";
                $res = mysqli_query($database,$query2);
                if($res){
                  header("Location: Applicants.php");
                }else {
                  echo $result2;
                }
            }
          ?>

        </div>
      </div>
    </div>
  </body>
</html>
