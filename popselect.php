<?php
session_start();

if (!isset($_SESSION['email']) ){
    header("location: LogIn.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/selectstyle.css" />
    
   <style>
       body
       {
           background-color: rgb(194, 241, 253);
       }
   </style>
</head>
<body>
  
     
            <div id="myModal" class="modal">
    
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="lineapp"></div>
                 <a href="Myapplicationlist.php"> <span class="close">&times;</span></a>
                  
                        <div id="head">   Select Appointment    </div>
                        
                      
              <?php 
              if(isset($_POST['selectapp'])){
                $id=$_POST['applayID'];
              if (!($database = mysqli_connect("localhost", "root", "")))
              die("<p>Could not connect to database</p>");
          
          if (!mysqli_select_db($database, "jobhunter"))
              die("<p>Could not open URL database</p>");
          $email = $_SESSION['email'];
              $query = "SELECT * FROM appointment,jobseeker_apply_job WHERE applay_JID=applay_ID AND applay_ID='$id'";
                       
              $result = mysqli_query($database, $query);
              
               if ($result) {
                 
                      while ($data= mysqli_fetch_assoc($result)) {
                        $Date0 = $data['date'];
                        $date = date("d-m-Y", strtotime($Date0));
                       $time = $data['time']; 
                       $idappo=$data['appointment_ID'];
                       $t;
                      $cheak=  substr($time,0,2);
                      if ($cheak>=12)
                      $t=" PM";
                      else
                      $t=" AM";

                      $time=$time.$t;
                       
                       
                      
                       ?>  
                        
                            
                              
                        <form action="popselect.php" method="POST" class="selectapy">
                            <input type="hidden" name="id" value="<?php echo $idappo ?>">
                           <button class="box"  name="selecteda"> 
                                <div id="date">Availabale appointment</div>
                                <div id="title"><h4> <?php echo $date;?></h4> <h4> <?php echo $time;?></h4></div>
                                 <div id="book"><h4> Book</h4></div> </button>  </form>
                               
                                 
                        
                           
                               
               
                  
                                   
                      
                              
                               
                                 <?php }} } else echo " ";?>                                                                                             
                 
                      </div>
                  </div> 
              
</body>  
<?php
$x=0;
 if(isset($_POST['selecteda'])){
    $idapoo=$_POST['id'];
    if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "jobhunter"))
    die("<p>Could not open URL database</p>");
    
    $query="UPDATE appointment SET statuss=1  WHERE appointment_ID ='$idapoo'";              
    $result = mysqli_query($database, $query);
    
     if ($result) {
   
    
    print( "<script>x=alert('Thanks, your appointiment is confirmed');
    window.location.href = 'Myapplicationlist.php';
                                                     </script>");
    
} }  

?>




</html>