<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/jobSeekerSearch.css">
        <link rel="stylesheet" href="styles/NavbarStyles.css">
        <link rel="icon" href="img/icon.png">
        <link rel="icon" href="img/icon.png">
        <link rel="stylesheet" href="styles\Buttons.css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/jobSeekerSearch.js"></script>

        <title>Employer | Job Seekers Search</title>
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
                        <a href="jobSeekerSearch.php" class="navbar-item">Job Seekers</a>
                        <a href="JobListing.php" class="navbar-item">My Jobs</a>
                        <a href="LogIn.php" class="navbar-item-span">Log in</a>    
                    </div>
                </nav>
                <img src="img/search.png" class="home-img">
            </div>
    
            <div class="search">
                <form method="GET">
                    <div class="search-box">
                        <span class="material-icons" class="search-icon">search</span>
                        <input type="text" class="input" placeholder="Search" name="search">
                        <div class="dropdown">
                            <div class="default_option"><input type="text" name="gender" value="gender" id="gender" style="background-color:transparent;border:none; outline:none; cursor:pointer;font-size: 16px;color:#192d50;" readonly></div>  
                            <ul>
                                <li id="male">male</li>
                                <li id="female">female</li>
                            </ul>
                        </div>
                        <div class="dropdown2">
                            <div class="default_option">search by</div>
                            <div class="city-form">
                                <div class="form-content">
                                    <label>Skill :</label>
                                    <input type="text" class="form-input" id="skill" name="skill">
                                </div>
                                <div class="form-content">
                                    <label>nationality :</label>
                                    <input type="text" class="form-input" id="nati" name="nation">
                                </div>
                                <div class="form-content">
                                    <label>Major :</label>
                                    <input type="text" class="form-input" id="major">
                                </div>
                                
                                <button>Apply</button>
                            </div>
                        </div>
                        
                    </div>
                    <!-- <input type="submit" name="enter" style="visibility: hidden;"> -->
                </form>
            </div>
            <div class="jobs">
            <div class="job-posts">
                    <ul>
            <?php
                if (!($database = mysqli_connect("localhost", "root", "")))
                    die("<p>Could not connect to database</p>");

                if (!mysqli_select_db($database, "JobHunter"))
                    die("<p>Could not open URL database</p>");

                    //if(isset($_GET['enter'])){
                
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $gender = isset($_GET['gender']) ? $_GET['gender'] : "gender";
                        $skill = isset($_GET['skill']) ? $_GET['skill'] :'';
                        $nation = isset($_GET['nation']) ? $_GET['nation'] : '';
                        $major = isset($_GET['major']) ? $_GET['major'] : '';


                        if(($search=='') && ($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker";
                        }elseif(($search=='') && ($skill=='') && ($nation=='') &&($major=='') &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."'";

                        }elseif(($search=='') && ($skill=='') && ($nation=='') &&($major=='') &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."'";
                        }elseif(!empty($search) && ($skill=='') && ($nation=='') &&($major=='') &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."')";

                        }elseif(!empty($search) && ($skill=='') && ($nation=='') &&($major=='') &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."')";

                        }elseif(!empty($search) && ($skill=='') && ($nation=='') &&($major=='') &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."')";

                        }elseif(!empty($search) && ($skill=='') && !empty($nation) &&($major=='') &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";
                        
                        }elseif(!empty($search) && ($skill=='') && !empty($nation) &&($major=='') &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";

                        }elseif(!empty($search) && ($skill=='') && !empty($nation) &&($major=='') &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";

                        }elseif(!empty($search) && ($skill=='') && ($nation=='') && !empty($major) &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";
                        
                        }elseif(!empty($search) && ($skill=='') && ($nation=='') && !empty($major) &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";

                        }elseif(!empty($search) && ($skill=='') && ($nation=='') && !empty($major) &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";

                        }elseif(!empty($search) && ($skill=='') && !empty($nation) && !empty($major) &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."' AND nationality='".$nation."'";

                        }elseif(!empty($search) && ($skill=='') && !empty($nation) && !empty($major) &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."' AND nationality='".$nation."'";
                        
                        }elseif(!empty($search) && ($skill=='') && !empty($nation) && !empty($major) &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND major='".$major."' AND nationality='".$nation."'";

                        }elseif(!empty($search) && !empty($skill) && ($nation=='') &&($major=='') &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."')";
                        
                        }elseif(!empty($search) && !empty($skill) && ($nation=='') &&($major=='') &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."')";
                        
                        }elseif(!empty($search) && !empty($skill) && ($nation=='') &&($major=='') &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."')";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) &&($major=='') &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) &&($major=='') &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) &&($major=='') &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."'";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) && !empty($major) &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."' AND major='".$major."'";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) && !empty($major) &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."' AND major='".$major."'";
                        
                        }elseif(!empty($search) && !empty($skill) && !empty($nation) && !empty($major) &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND nationality='".$nation."' AND major='".$major."'";
                        
                        }elseif(!empty($search) && !empty($skill) && ($nation=='') && !empty($major) &&($gender=='male')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";
                        
                        }elseif(!empty($search) && !empty($skill) && ($nation=='') && !empty($major) &&($gender=='female')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE gender='".$gender."' AND (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";
                        
                        }elseif(!empty($search) && !empty($skill) && ($nation=='') && !empty($major) &&($gender=='gender')){
                            $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker WHERE (firstName='".$search."' OR lastName='".$search."') AND major='".$major."'";
                        
                        }else{
                            echo '<p style="color: #192d50;font-size: 18px;text-align: center;margin-left:42%;">There is no job seekers</p>';
                        }
                    // }else {
                    //     $query = "select firstName, lastName, email, gender, nationality, city, major from jobseeker";
                    // }

                        $result = mysqli_query($database, $query);
                        if($result){
                            $rowcount=mysqli_num_rows($result);
                                if ($result && $rowcount>0) {
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $email = $data['email'];

                                        $skillQuery = "select skillName from skills WHERE JobSeeker_email='".$email."' AND skillName='".$skill."'";
                                        $resultSkills = mysqli_query($database, $skillQuery);
                                        $rowcount=mysqli_num_rows($resultSkills);

                                        if($rowcount>0 || ($skill=='')){
                                            print '<li class="post">';
                                            print '<div class="post-content">';
                                        //print '<a href="JobSeekerViewProf.html">';
                                            print '<form action="JobSeekerViewProf.php" method="post" style="position:relative;" >';
                                            print '<input type="hidden" name="viewinfo" value="' . $data['email'] . '" />';
                                            print '<button type="submit" name="viewi" style="all: unset; cursor:pointer; height: 100%; color: #192d50;  width: 100%; position: relative;">';
                                            print '<h3>'. $data['firstName'] .' '.$data['lastName'].'</h3>';
                                            print '<svg class="location-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>';
                                            print '<span class="icon-side">'. $data['city'] .'</span><br>';
                                            print '<svg class="major-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="18px" height="18px"><path d="M0 0h24v24H0z" fill="none"/><path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/></svg>';
                                            print '<span class="icon-side">'.$data['major'].'</span>';
                                            print '<h5>About Job seeker :</h5>';
                                            print '<p class="descrption">'.$data['nationality'].', '.$data['gender'].'</p>';
                                            print '<ol id="skills">Skills :';
                                            
                        
                                            $query2 = "select skillName from skills WHERE JobSeeker_email='".$email."'";
                                            $result2 = mysqli_query($database, $query2);
                                            if($result2){
                                                $i= 0;
                                                while ($data2 = mysqli_fetch_assoc($result2)) {
                                                    if($i<2){
                                                        print '<li>'.$data2['skillName'].'</li>';
                                                        $i++;
                                                    }
                                                }

                                            }
                                            print '</ol>';
                                            print '</button></form>';
                                            print '</div>';
                                            print '</li>';
                                        }
                                    }
                                }else{
                                    echo '<p style="color: #192d50;font-size: 18px;text-align: center;margin-left:42%;">There is no job seekers</p>';
                                }
                            }else {
                                echo '<p style="color: #192d50;font-size: 18px;text-align: center;margin-left:42%;">There is no job seekers</p>';
                            }
                        ?>
                        
                    </ul>
                </div>
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