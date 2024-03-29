
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Employer Registration</title>
    <link rel="stylesheet" href="styles/RegisterLogin.css" />
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <link rel="stylesheet" href="styles/form.css?<?php echo time(); ?>"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="styles/Footer.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/EmployeeValidation.js"></script>
    <style>

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
            bottom: 0;
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
            if (!( $database = mysqli_connect( "localhost", "root", "" )))
                die( "<p>Could not connect to database</p>" );

            if (!mysqli_select_db( $database, "JobHunter" ))
                die( "<p>Could not open URL database</p>" );

            if(isset($_POST['create'])){
                $name = $_POST['name'];
                $scope = $_POST['scope'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $re_pass = $_POST['re_password'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $description = $_POST['des'];
                $mission = $_POST['mission'];
                $vision = $_POST['vision'];


                $test = "INSERT INTO employer(name, email, password, phone,address, scope, description, mission, vision) VALUES('".$name."','".$email."','".$password."','".$phone."','".$address."', '".$scope."',  '".$description."', '".$mission."', '".$vision."');";
                $res=mysqli_query($database,$test);
                if($res){
                    header("Location: home.php");
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
                        <li><a href="jobSearch.php">Jobs</a></li>
                        <li><a href="LogIn.php">Login</a></li>
                    </ul>
                </nav>
            </header>

            <main>
                <section class="background">
                    <div class="lists">
                        <div class="list">
                            <img class="regimg" src="img/EmployerReg-img.jpg" alt="v">
                            <div class="jobInfo">
                                <h2 id=employerReg>Employer Regstration </h2>
                                <div class="alert" hidden> Error , Full out all the fiels correctly</div>

                                <form method="post" action="EmployeerReg.php" id="form">
                                    <div class="form-control">
                                        <label for="first_name">Company's name</label>
                                        <input type="text" class="form-input" name="name" id="name" placeholder="Company's name.. " />
                                        <small id="name_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="first_name">Company's scope</label>
                                        <input type="text" class="form-input" name="scope" id="scope" placeholder="Company's name.. " />
                                        <small id="scope_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="phone">Phone number</label>
                                        <input type="text" class="form-input" name="phone" id="phone" placeholder="Your phone number" />
                                        <small id="phone_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-input" name="password" id="password" placeholder="Your password" />
                                        <small id="password_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="re_password">Repeat your password</label>
                                        <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password" />
                                        <small id="re_password_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-input" name="email" id="email" placeholder="Your email..." />
                                        <small id="email_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-input" name="address" id="address" placeholder="Your headquarter's address" />
                                        <small id="address_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="des">Description of Company</label>
                                        <textarea style="resize: none; " rows="4" cols="53" placeholder="Enter a brief description.." name="des" id="des"></textarea>
                                        <small id="des_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="mission">Mission</label>
                                        <input type="text" class="form-input" name="mission" id="mission" placeholder="List your company's mission.." />
                                        <small id="mission_error">Error message</small>
                                    </div>
                                    <div class="form-control">
                                        <label for="vision">Vision</label>
                                        <input type="text" class="form-input" name="vision" id="vision" placeholder="List your company's vision.." />
                                        <small id="vision_error">Error message</small>
                                    </div>
                                    <input type="submit" class="applicants" name="create" id="submit">
                                </form>
                                <!-- <div class="buttons">
                            <a href="EmployerProfile_Eidt.html">
                                <button class="applicants">Sign Up</button>
                            </a>
                        </div> -->
                            </div>
                        </div>
                    </div>
                </section>
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

</body>

</html>