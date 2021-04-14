<!DOCTYPE html>
<html>

<head>
    <meta lang="en">
    <link rel="icon" href="img/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/EmployerSearch.css">
    <link rel="stylesheet" href="styles/Buttons.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css">
    <link rel="stylesheet" href="styles/Footer.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="js/EmployerSearch.js"></script>
    <title> Search Employers </title>
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
                <span class="logo"><img src="img/logo.PNG" alt="logo"></span>
                <div class="navbar-items">
                    <a href="home.php" class="navbar-item">Home</a>
                    <a href="jobSearch.php" class="navbar-item">Jobs</a>
                    <a href="#" class="navbar-item">Employers</a>
                    <a href="LogIn.php" class="navbar-item-span"><span>Log in</span></a>
                </div>
            </nav>
            <img src="img/search.png" class="home-img">
        </div>
        <div class="search">
            <form action="EmployerSearch.php" method="POST">
                <div class="search-box">
                    <span class="material-icons" class="search-icon">search</span>
                    <input type="text" class="input" placeholder="Search" name="search">
                    <div class="dropdown">
                        <div class="default_option"><input type="text" name="type" value="scope" id="type" style="background-color:transparent;border:none; outline:none; cursor:pointer;font-size: 16px;color:#192d50;" readonly></div>
                        <ul>
                            <li id="scope">scope</li>
                            <li id="name">name</li>
                        </ul>
                    </div>
                </div>
                <input type="submit" name="submit" style="position: absolute; left: -9999px" />
            </form>
        </div>
        <div class="jobs">
            <?php
            if (!($database = mysqli_connect("localhost", "root", "")))
                die("<p>Could not connect to database</p>");

            if (!mysqli_select_db($database, "JobHunter"))
                die("<p>Could not open URL database</p>");

            $query;

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $type = $_POST['type'];

                if ($type == 'scope')
                    $query = "SELECT * FROM employer WHERE scope = '$search'";

                if ($type == 'name')
                    $query = "SELECT * FROM employer WHERE name = '$search'";

                if ($search == '')
                    $query = "SELECT * FROM employer";
            } else {
                $query = "SELECT * FROM employer";
            }

            $result = mysqli_query($database, $query);
            $rowcount = mysqli_num_rows($result);

            if ($result && $rowcount > 0) {
                print '<div class="job-posts">';
                print '<ul>';
                while ($data = mysqli_fetch_assoc($result)) {
                    print '<li class="post">';
                    print '<div class="post-content">';
                    print '<form action="EmployerProfile.php" method="post" style="position:relative; color: #192d50; " >';
                    print '<input type="hidden" name="viewinfo" value="' . $data['email'] . '" />';
                    print '<button type="submit" name="viewi" style="all: unset; cursor:pointer; height: 100%; width: 100%; position: absolute; right: 0; top: 0;">';
                    print '<h4 id="companyName" style="font-weight:bold;">' . $data['name'] . '</h4>';
                    print '<span class="material-icons" style="color: #fa9746; font-size:28px; margin: 0; margin-left: 75px;">location_on</span>';
                    print '<span class="icon-side">' . $data['address'] . '</span>';
                    print '<h4 id="industry">' . $data['scope'] . '</h4>';
                    print '<h5> About Company:</h5>';
                    print '<p class="descrption">' . $data['description'] . '</p>';
                    print '</button></form>';
                    print '</div></li>';
                }
                print '</ul>';
                print '</div>';
            } else {
                print'<p style="color: #192d50;font-size: 18px;text-align: center; padding-top: 35px;">There are no employers with the specified infomation</p>';
            }
            ?>
        </div>
    </div>
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
    </div>
</body>

</html>