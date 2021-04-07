<?php  
    session_start();
    //if(isset($_SESSION['email']))
    
        
        //header("Location: em.php");
        
        // header() is used to send a raw HTTP header. It must be called before any actual output is sent.
       

?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Applicants</title>
    <link rel="stylesheet" href="styles\JobListingStylesFay.css" />
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles\Buttons.css" />
    <link rel="stylesheet" href="styles\NavbarStyles.css" />
    <link rel="stylesheet" href="styles\form.css" />
</head>

<body>
    <span class="logo"><img src="img/logo.png" alt="logo"></span>
    <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
    <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z"
                style="stroke: none; fill: #8CB3F4;"></path>
        </svg></div>
    <header>
        <nav>
            <ul class="navLinks1">
                <li><a href="home.html">Home</a></li>
                <li><a href="jobSearch.html">Job</a></li>
                <li><a href="EmployerSearch.html">Employers</a>

                </li>
            </ul>
    </header>
    <main>
        <br><br><br>
        <section class="background">
            <div class="lists">
                <div class="list">
                    <div class="jobInfo">
                        <br> <br>
                        <img class="regimg" src="img/undraw_Login_re_4vu2.png" alt="v">
                        <h2 id="employerReg">Log in </h2> <br>
                        <div id="f-div">
                            <form  action="logIn.php" method="POST">
                                
                                <?php
                            if(isset($_GET['error']))
                                echo "<div class='alert' role='alert'>".$_GET['error']."</div>";
                        ?>
                                <label for="">How are you?</label> <select name="tybeuser" id="rolew">
                                    <option value="2" selected>employer</option>
                                    <option value="1">job seeker</option>
                                </select> <br> <br>
                                <label for="first_name">Email</label>
                                <input type="email" class="form-input" name="email" id="first_name"
                                    placeholder="Your email.. " required autofocus />


                                <label for="password">Password</label>
                                <input type="password" class="form-input" name="password" id="password"
                                    placeholder="Your password" required />
                                <h4>Don't have an account yet? <a href="/WhoIsYou.html">Sign Up </a> </h4>
                                <br>
                                <button name="login" class="applicants">Log in</button>
                            </form>
                            
                            
                               
                            
                        </div>
                    </div>
                    </svg>


                </div>




        </section>

    </main>

</body>

</html>

<?php  
    if (!( $database = mysqli_connect( "localhost", "root", "" )))
        die( "<p>Could not connect to database</p>" );

    if (!mysqli_select_db( $database, "jobhunter" ))
        die( "<p>Could not open URL database</p>" );

    if(isset($_POST['login'])) {  
        $tybe=$_POST['tybeuser']; 
        $email=$_POST['email'];  
        $password=$_POST['password']; 
        if($_POST['email']==""||$_POST['password']=="")
        header("Location: login.php?error=Wrong enter email and password");
        
        $query;
        if($tybe==2) 
        $query="select * from employer WHERE email='$email'AND password='$password'";  
        else if($tybe==1) 
        $query="select * from jobseeker WHERE email='$email'AND password='$password'";

        $run=mysqli_query($database, $query);  

       $numm=mysqli_num_rows($run);
    if($numm > 0){
        $_SESSION['email'] = $email;
        $_SESSION['value'] = $tybe;
        if($tybe==1)
        header("Location:JobSeekerViewProf.php");
        if($tybe==2)
        header("Location: EmployerProfile.php");

    }
    else {
       
      
        header("Location: logIn.php?error=Wrong Username/Password");
    }}
?>
