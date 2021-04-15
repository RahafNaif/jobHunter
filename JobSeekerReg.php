<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Job Seeker Registration</title>
    <link rel="stylesheet" href="styles\JobListingStylesFay.css" />
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles\Buttons.css" />
    <link rel="stylesheet" href="styles\NavbarStyles.css" />
    <link rel="stylesheet" href="styles\form.css?<?php echo time(); ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jobseekerValdition.js"></script>
    <style>
        form small {
            color: red;
            visibility: hidden;
            padding-left: 15 px;

        }

        .custom-shape-divider-bottom-1612535207 {
            position: absolute;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }


        .custom-shape-divider-bottom-1612535207 svg {
            position: relative;
            display: block;
            width: calc(222% + 1.3px);
            height: 218px;
            transform: rotateY(180deg);
        }

        .custom-shape-divider-bottom-1612535207 .shape-fill {
            fill: #8cb3f4;
        }

        .footer-content {
            position: absolute;
            padding-left: 100px;
            padding-top: 100px;
        }

        .footer {
            display: inline-block;
        }

        .company-icon {
            fill: #2b468b;
            margin-top: 10px;
            margin-left: -190px;
        }

        .company {
            text-align: left;
            padding-top: 8px;
            padding-left: 10px;
        }

        .shape-footer {
            transform: rotateX(180deg);
            width: 100%;
            position: absolute;
        }

        * {
            padding: 0;
            margin: 0;
        }

        .footer-content {
            position: absolute;
            z-index: 3;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            font-size: 16px;
            color: #192d50;
            /* margin-top: 5px; */
            margin-left: 35%;
            display: inline-flex;
        }

        .footer-content span {
            padding-left: 10px;
            text-decoration: none;
            color: #192d50;
        }

        .footer-content span:hover {
            color: rgba(234, 243, 250, 0.8);
            transform: scale(1.1);
            transition: 0.3s ease-in;
        }

        #page-container {
            position: relative;
            min-height: 200vh;
        }

        #content-wrap {
            padding-bottom: 2.5rem;
            /* Footer height */
        }

        #footer {
            position: absolute;
            bottom: 50;
            width: 100%;
            height: 2.5rem;
            /* Footer height */
        }
    </style>

</head>

<body>

    <div id="page-container">
        <div id="content-wrap">
            <!-- all other page content -->
            <?php
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "jobhunter"))
                die("<p>Could not open URL database</p>");



            if (isset($_POST['create'])) {
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $birthDate = $_POST['birthDate'];
                $gender = $_POST['gender'];
                $nationality = $_POST['nationality'];
                $city = $_POST['city'];
                $phone = $_POST['phone'];
                $major = $_POST['major'];
                $experince = $_POST['experince'];
                $currentJob = $_POST['currentJob'];

                $query = "INSERT INTO jobseeker(firstName, lastName,email,password, birthDate, gender,  nationality , city , phone,major,experince ,currentJob )VALUES('$firstName','$lastName','$email','$password','$birthDate','$gender','$nationality','$city','$phone','$major','$experince','$currentJob')";
                $result = mysqli_query($database, $query);
                if ($result) {
                    header('Location: home.php');
                } else {
                    echo "Error: can not create new user!";
                    echo  $database->error;
                    exit();
                }
            }
            ?>
            <span class="logo"><img src="img/logo.PNG" alt="logo"></span>
            <!-- Generated by https://smooth.ie/blogs/news/svg-wavey-transitions-between-sections -->
            <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8CB3F4;"></path>
                </svg></div>
            <header>
                <nav>
                    <ul class="navLinks1">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="EmployerSearch.php">Employers</a></li>
                        <li><a href="WhoAreYou.html">Registeration</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <section class="background">
                    <div class="lists">
                        <div class="list">
                            <img class="regimg" src="img/5236.jpg" alt="v">
                            <div class="jobInfo">
                                <h2 id="employerReg">Job Seeker Regestration </h2>

                                <form action="JobSeekerReg.php" method="POST" id="form">
                                    <label for="last_name">First Name</label>
                                    <input type="text" class="form-input" name="firstName" id="firstName" placeholder="Your first name.. " Required />
                                    <small id="firstName_error">Error massgagr</small>
                                    <br><br>
                                    <label for="last_name">last Name</label>
                                    <input type="text" class="form-input" name="lastName" id="lastName" placeholder="Your last name.. " Required />
                                    <small id="lastName_error">Error massgagr</small>
                                    <br><br>
                                    <label for="birth_date">Birth date</label><br><br>
                                    <input type="date" class="form-input" name="birthDate" id="birthDate" placeholder="MM-DD-YYYY" required />
                                    <br><br>
                                    <label for="gender" Required>Select yoru Gender</label>
                                    <br>
                                    <input type="radio" name="gender" value="m" id="male" checked="checked" />
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" value="f" id="female" />
                                    <label for="female">Female</label><br><br>
                                    <label for="phone">Phone number</label>
                                    <input type="text" class="form-input" name="phone" id="phone" placeholder="Your phone number" pattern="[0]{1}[5]{1}[0-9]{8}" Required />
                                    <small id="phone_error">Error massgagr</small>
                                    <br>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-input" name="password" id="password" placeholder="Your password" Required />
                                    <small id="password_error">Error massgage</small>
                                    <br> <label for="re_password">Repeat your password</label>
                                    <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" Required />
                                    <small id="re_password_error">Error massgage</small>
                                    <br> <label for="last_name">email</label>
                                    <input type="text" class="form-input" name="email" id="email" placeholder="Your email..." Required />
                                    <small id="email_error">Error massgagr</small>
                                    <br> <label for="last_name" Required>nationality</label>
                                    <!-- <input type="text" class="form-input" name="last_name" id="last_name"
                                placeholder="Your nationality..." /> -->
                                    <select id="major" class="form-input" style=" 
                                width: 100%;
                                padding: 12px 20px;
                                margin: 8px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                                width: 100%;
                                background-color: #4CAF50;
                                color: black;
                                padding: 14px 20px;
                                margin: 8px 0;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                background-color:white;
                                border-radius: 5px;
                                width: 110%;
                              ">

                                        <option selected disabled value="" Required> Select a nationality</option>
                                        <option value="Saudi"> Saudi</option>
                                        <option value="Brazilian"> Brazilian</option>
                                        <option value="German"> German</option>
                                        <option value="Greek"> Greek</option>
                                        <option value="Kuaiti"> Kuwaiti</option>
                                        <option value="Libyan"> Libyan</option>
                                        <option value="Iraqi"> Iraqi</option>
                                        <option value="Italian"> Italian</option>
                                        <option value="Other"> Other</option>
                                    </select>
                                    <br> <label for="city">city</label>
                                    <input type="text" class="form-input" name="city" id="city" placeholder="Your city..." Required />
                                    <small id="city_error">Error massgagr</small>
                                    <br> <label for="last_name">current job</label>
                                    <input type="text" class="form-input" name="currentJob" id="currentJob" placeholder="Your current job..." Required />
                                    <small id="currentJob_error">Error massgagr</small>
                                    <br> <label for="last_name">experince</label>
                                    <input type="text" class="form-input" name="experince" id="experince" placeholder="Your current job..." Required />
                                    <small id="experince_error">Error massgagr</small>
                                    <br><label for="last_name">major</label>
                                    <select id="major" class="form-input" name="major" style=" 
                                width: 100%;
                                padding: 12px 20px;
                                margin: 8px 0;
                                display: inline-block;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;
                              


                                width: 100%;
                                background-color: #4CAF50;
                                color: black;
                                padding: 14px 20px;
                                margin: 8px 0;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                        

                                background-color:white;


                                
                                border-radius: 5px;
                                width: 110%;
                              
                              ">

                                        <option value="" disabled selected Required>Select a major</option>
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


                                    <div class="buttons">

                                        <input type="submit" class="applicants" name="create" id="create">
                                </form>
                                </a>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    </div>
    </section>

    </div>
    </main>

    </div>
    <footer id="footer">
        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <p>Contact us</p>
                <span class="material-icons">facebook</span>
                <a href="mailto:jobhunter@ksu.com"><span class="material-icons">email</span></a>
            </div>
            <div class="shape-footer" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                    <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8CB3F4;"></path>
                </svg></div>
        </div>
    </footer>
    </div>
    <?php
    if ($_POST['password'] != $_POST['re_password']) {
        echo ("Oops! Password did not match! Try again. ");
    }


    ?>
</body>

</html>