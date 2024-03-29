<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/home.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="styles\Buttons.css" />
        <link rel="stylesheet" href="styles/NavbarStyles.css">

        <link rel="icon" href="img/icon.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>Job Hunter</title>
    </head>
    <body>
        <div class="container">
            <div class="custom-shape-divider-top-1612286857">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
            <div class="header">
                <nav class="navbar">
                    <div class="logo">
                        <img src="img/logo.png">
                    </div>
                    <div class="navbar-items">
                        <a href="home.php" class="navbar-item">Home</a>
                        <a href="jobSearch.php" class="navbar-item">Jobs</a>
                        <a href="EmployerSearch.php" class="navbar-item">Employers</a>
                        
                        <?php
                            if (isset($_SESSION['email'])) {
                                print '<ul class="navLinks2">';
                                print '<li>';
                                print '<a href="#"><i class="material-icons">person</i></a>';
                                print '<ul>';
                                if ($_SESSION['role']==1){
                                    $profile = 'JobSeekerViewProf.php';
                                }else{
                                    $profile = 'EmployerProfile.php';
                                }
                                print '<li><a href="'.$profile.'"> Profile</a></li>';
                               if (isset($_SESSION['role'])) print '<li><a href="http:signout.php">logout</a></li>';
                                    else print '<li><a href="http:login.php">login</a></li>';
                                   
                                print '</ul>';
                                print '</li>';
                                print '</ul>';
                            }else {
                                print '<a href="LogIn.php" class="navbar-item-span">Log in</a>';
                            }
                        ?>
                        
                    </div>
                    
                </nav>
                
                <img src="img/home-img.png" class="home-img">
                <div class="join">
                    <?php 
                        if (!isset($_SESSION['email'])) {
                            print '<p>Job seeker? or an Employeer join us!</p>';
                            print'<a href="WhoAreYou.html" style="text-decoration: none;"><button class="join-button">Join us!</button></a>';
                        }
                    ?>
                </div>
            </div>
            <div class="jobs">
                <p>Posted Jobs</p>
                <div class="line"></div>
               
                    <?php
                      if (!($database = mysqli_connect("localhost", "root", "")))
                       die("<p>Could not connect to database</p>");

                      if (!mysqli_select_db($database, "jobhunter"))
                       die("<p>Could not open URL database</p>");
                       if( isset($_SESSION["email"]) ){
                      $email = $_SESSION['email'];
                    }
                      $query = "select * from job";
                      $result = mysqli_query($database, $query);
                      if ($result) {
                          print ' <div class="posts">';
                          print '<ul>';
                          $i=0;
                        while ($data = mysqli_fetch_assoc($result)) {
                            if($i<3){
                                print '<li class="post">';
                                print '<div class="post-content">';
                                print '<img class="post-img" src="img/person.svg" alt="">';
                                print '<h4  style="font-weight :bolder" >'.$data['position'].'</h4>';
                                print '<svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>';
                                print '<span class="icon-side">'.$data['city'].'</span><br>';
                                print '<h5>About Job :</h5>';
                                print '<p class="descrption">'.$data['description'].'</p>';
                                print '<p class="salary">Salary : from '.$data['salary'].' SR</p><br>';   

                                print '<form method= "GET" action="JobDetailsPopUp.php">';     
                                print '<input type="hidden" name="JOB_ID" value="'.$data['ID'].'" />';  
                                print '<input type="hidden" name="thePage" value="home"/>';
                                print '<input type="submit" name "getForm" style="display:none;"/>';

                                print '<a><button class="job-content JobDetails">For more details</button></a>'; 

                                print '</form>';

                                print '</div>';
                                print '</li>';
                                $i++;
                            }

                        }
                        print '</ul>';
                        print '</div>';

                      } else {
                        echo '<div class="posts">There are no jobs./div>';
                    }
                    ?>                                                        
               <a href="jobSearch.php" class="job-link">more jobs<span class="material-icons">keyboard_arrow_right</span></a>
            </div>
            <div class="advices">
                <div class="advice-container">
                    <div class="advice-slide">
                      <h2>Customize your resume.</h2>
                          <p>
                                  Adapt your resume to each job you apply for. Study the job 
                                  description to determine why you are a great fit. Then, add your skills, 
                                  experience and measurable achievements that are relevant to that position. Hiring 
                                  managers who look through many resumes should be able to read yours and quickly know 
                                  you have the skills for the position.
                                  
                                  To simplify this step, have templates of your resume 
                                  and cover letter ready to customize. Keep key sections such as your education and 
                                  contact information the same, but personalize your abilities or past job duties to fit
                                  the job you are applying for. </p>
                
                          <p class="writtenBy">
                            written by <a href="#" style="font-weight:bold;"> Sabic Company</a>
                          </p>    
                    </div>
                          <!-- end of  advice-slide-->
                          <!-- Buttons -->
                    <div class="prevBtn">
                      <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M11.67 3.87L9.9 2.1 0 12l9.9 9.9 1.77-1.77L3.54 12z"/></svg>
                    </div>
                    <div class="nextBtn">
                      <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><polygon points="6.23,20.23 8,22 18,12 8,2 6.23,3.77 14.46,12"/></g></svg>
                    </div>    
                          <!-- radio buttons -->
                    <input type="radio" name="advice" checked  class="rAdvice">
                    <input type="radio" name="advice"  class="rAdvice">
                    <input type="radio" name="advice" class="rAdvice">
                          <!-- Like  dislike -->
                  <!-- Like  dislike -->
                    <div class="dis-like">
                        <div class="likeBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40" width="40" 
                            viewBox="0 0 24 24" width="24" fill="#192D50" >
                            <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"/>
                        </svg>
                    </div>
                    <div class="dislikeBtn">

                        <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 0 24 24" width="40" fill="#192D50">

                            <path d="M15 3H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 23l6.59-6.59c.36-.36.58-.86.58-1.41V5c0-1.1-.9-2-2-2zm4 0v12h4V3h-4z"/></svg>
                    </div>
                </div>
                    
                </div> 
            </div>

            <div class="Employers">
                <p>Our Employers</p>
                <div class="line"></div>
                <div class="posts">
                    <ul>
                        <?php
                            $query2 = "SELECT * FROM employer";
                            $result2 = mysqli_query($database, $query2);

                            if($result2){
                                $i=0;
                                while ($data = mysqli_fetch_assoc($result2)) {
                                    if($i<3){
                                        print '<input type="hidden" name="viewinfo" value="' . $data['email'] . '" />';

                                        print '<li class="post">';
                                        print '<div class="post-content">';
                                        print '<img class="post-img" src="img/company.svg" alt="company img">';
                                        print '<h4 style="font-weight:bold;">'.$data['name'].'</h4>';
                                        print '<svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>';
                                        print '<span class="icon-side">'.$data['address'].'</span><br>';
                                        print '<p class="about">About Company :</p>';
                                        print '<p class="company">Scope : '.$data['scope'].'</p>';
                                        print '<p class="company">'.$data['vision'].' </p><br>';
                                        print '<form action="EmployerProfile.php" method="post" style="position:relative;" >';
                                        print '<input type="hidden" name="viewinfo" value="'.$data['email'].'"/>';
                                        print '<button type="submit" name="viewi" class="job-content">View Profile</button>';
                                        print '</form>';
                                        print '</div>';
                                        print '</li>';

                                        $i++;
                                    }
                                }

                            }else{
                                echo 'there is no employers';
                            }     
                        ?>             
                    </ul>
                </div>
               <a href="EmployerSearch.php" class="job-link">more employers<span class="material-icons">keyboard_arrow_right</span></a>
            </div>
            
            <div class="footer">
                <div class="footer-content">
                    <p>Contact us</p>
                    <span class="material-icons">facebook</span>
                    <a href="mailto:jobhunter@ksu.com"><span class="material-icons">email</span></a>
                </div>
                <div class="shape-footer" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                    style="height: 100%; width: 100%;">
                    <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z"
                        style="stroke: none; fill: #8CB3F4;"></path>
                </svg></div>
            </div>
            
        </div>
    </body>
</html>
