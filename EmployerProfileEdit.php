<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] == 1) {
    header("location: LogIn.php");
    exit();
}

if (!($database = mysqli_connect("localhost", "root", "")))
    die("<p>Could not connect to database</p>");

if (!mysqli_select_db($database, "jobhunter"))
    die("<p>Could not open URL database</p>");

$email = $_SESSION['email'];
$query = "select * from employer WHERE email='$email'";
$result = mysqli_query($database, $query);

if ($result) {
    $data = mysqli_fetch_assoc($result);
    $name = $data['name'];
    $address = $data['address'];
    $scope = $data['scope'];
    $phone = $data['phone'];
    $description = $data['description'];
    $mission = $data['mission'];
    $vision = $data['vision'];
    $pass = $data['password'];
} else {
    echo "There is no info.";
    exit();
}

if (isset($_POST['update'])) {
    $employerName = $_POST['employerName'];
    $employerAddress = $_POST['employerAddress'];
    $employerScope = $_POST['employerScope'];
    $employerEmail = $_POST['employerEmail'];
    $employerPhone = $_POST['employerPhone'];
    $employerDescription = $_POST['employerDescription'];
    $employerMission = $_POST['employerMission'];
    $employerVision = $_POST['employerVision'];
    $employerPassword = $_POST['password'];

    $email = $_SESSION['email'];
    $query = "UPDATE employer SET name = '$employerName', address = '$employerAddress', email = '$employerEmail', phone = '$employerPhone', scope = '$employerScope', description = '$employerDescription', mission = '$employerMission', vision = '$employerVision', password = '$employerPassword' WHERE email = '$email'";
    $result = mysqli_query($database, $query);

    if ($result) {
?>
        <script>
            window.location = "EmployerProfile.php";
        </script>
<?php
    } else {
        print 'Error';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Notifications.css" />
    <link rel="stylesheet" href="styles/NavbarStyles.css" />
    <link rel="stylesheet" href="styles/Footer.css" />
    <link rel="stylesheet" href="styles/EmployerProfileEdit.css" />
    <link rel="stylesheet" href="styles/Forms.css" />
    <script src="js/Notification.js"></script>
    <script src="js/EmployerProfileValidation.js"></script>
    <link rel="icon" href="img/icon.png" />
    <title>Employer | Profile</title>
</head>

<body>
    <?php include('./NavigationBar.php') ?>
    <main>
        <form form action="EmployerProfileEdit.php" method="POST" id="form">
            <fieldset>
                <legend>Update General Information</legend>
                <label> Name </label> <input required id="name" type="text" name="employerName" value=<?php echo $name; ?>>
                <label> Scope </label><input required id="scope" type="text" name="employerScope" value=<?php echo $scope; ?>>
                <label> Phone </label><input required id="phone" type="text" name="employerPhone" value=<?php echo $phone; ?>>
                <small id="phone_error"></small>
                <label> Email</label><input required id="email" type="email" name="employerEmail" value=<?php echo $email; ?>></label>
                <label> Password</label><input required id="password" type="password" name="password" value=<?php echo $pass; ?>></label>
                <small id="password_error"></small>
                <label> Address</label><input required id="address" type="text" name="employerAddress" value=<?php echo $address; ?>></label>
                <div class="buttons">
                    <input type="reset" name="cancel" value="cancel" id="reset">
                    <input type="submit" name="update" id="submit" value="Update">
                </div>
            </fieldset>
            <fieldset class="extra">
                <legend>Update Company Details</legend>
                <label>Descripition</label></label><textarea required id="des" name="employerDescription"><?php echo $description; ?> </textarea>
                <label>Mission </label><textarea required id="mission" name="employerMission"><?php echo $mission; ?> </textarea>
                <label>Vision </label><textarea required id="vision" name="employerVision"><?php echo $vision; ?> </textarea>
            </fieldset>
        </form>
    </main>
    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <p>Contact us</p>
            <span class="material-icons">facebook</span>
            <a href="mailto:jobhunter@ksu.com"><span class="material-icons">email</span></a>
        </div>
        <div class="shape-footer" style="height: 150px; overflow: hidden">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%">
                <path d="M-15.58,-15.49 C-16.70,110.81 186.45,57.52 502.48,59.50 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #8cb3f4"></path>
            </svg>
        </div>
    </div>
</body>

</html>