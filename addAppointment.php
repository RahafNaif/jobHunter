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

    $email = $_SESSION['email'];
    $apply_ID = $_GET['applyID'];
    $jobSeekerEmail = $_GET['jobSeekerEmail'];

    $newDate = $_GET['adddate'];
    $newtime = $_GET['addtime'];

    if(isset($_POST['add'])){
      $query2 = "INSERT INTO appointment(jobSeeker_email,date,time,applay_JID) VALUES('".$jobSeekerEmail."','".$newDate."','".$newtime."','".$apply_ID."');";
      $result2 = mysqli_query($database,$query);
      echo 'rfrf';
      if($result2){
        echo 'ffg';
        header("Location: Applicants.php");
      }
    }

    

    include_once 'setAppointment.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/addApp.css"/>
</head>
<body>
    <div class="container">
      <div class="addForm-parent">
      <div class="addForm">
        <a href="setAppointment.html" class="closeIcon"><svg
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
            <br/>
            <br/>
        
            <form method="GET">
                <label for="">Select Date:</label> <input type="date" name="adddate"/><br/>
                <br/>
                <label for="">Select Time:</label>
                <input type="time" name="addtime"/>
                <input type="submit" value="Add Appointment" name="add">
            </form>
        </div>
      </div>
    </div>
    </div>
</body>
</html>