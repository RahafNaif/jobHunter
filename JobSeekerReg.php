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
                <li><a href="/home.php">Home</a></li>
                <li><a href="EmployerSearch.html">Employers</a></li>
                <li><a href="WhoIsYou.html">Registeration</a></li>
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

                        <form action="JobSeekerReg.php" method="POST">
                            <label for="last_name">First Name</label>
                            <input type="text" class="form-input" name="firstName" id="last_name" placeholder="Your first name.. " Required /><br><br>
                            <label for="last_name">last Name</label>
                            <input type="text" class="form-input" name="lastName" id="last_name" placeholder="Your last name.. " Required /><br><br>
                            <label for="birth_date">Birth date</label><br><br>
                            <input type="date" class="form-input" name="birthDate" id="birth_date" placeholder="MM-DD-YYYY" />
                            <br><br>
                            <label for="gender" Required>Select yoru Gender</label>
                            <br>
                            <input type="radio" name="gender" value="m" id="male" checked="checked" />
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="f" id="female" />
                            <label for="female">Female</label><br><br>
                            <label for="phone">Phone number</label>
                            <input type="text" class="form-input" name="phone" id="phone" placeholder="Your phone number" pattern="[0]{1}[5]{1}[0-9]{8}" required="required" />
                            <br>
                            <label for="password">Password</label>
                            <input type="password" class="form-input" name="password" id="password" placeholder="Your password" Required />
                            <br> <label for="re_password">Repeat your password</label>
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" Required />
                            <br> <label for="last_name">email</label>
                            <input type="text" class="form-input" name="email" id="last_name" placeholder="Your email..." Required />
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

                                <option selected> Select a nationality</option>
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
                            <input type="text" class="form-input" name="city" id="city" placeholder="Your city..." />
                            <br> <label for="last_name">current job</label>
                            <input type="text" class="form-input" name="currentJob" id="last_name" placeholder="Your current job..." />
                            <br> <label for="last_name">experince</label>
                            <input type="text" class="form-input" name="experince" id="experince" placeholder="Your current job..." />
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

                                <option value="">Select a major</option>
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
                            <!--  -->

                            <?php
                            function email_validation($email)
                            {
                                return (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $$email)) ? FALSE : TRUE;
                            }
                            if ($_POST['password'] != $_POST['re_password']) {
                                echo ("Oops! Password did not match! Try again. ");
                            }

                            ?>
                            <div class="buttons">

                                <input type="submit" class="applicants" name="create" id="submit">
                        </form>
                        </a>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </section>
        <!-- Footer -->

        </div>
    </main>
</body>

</html>