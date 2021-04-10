<?php

$dbServername= "localhost";
$dbUsername="root";
$dbPassword="";
$dbname="jobhunter";

$conn= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname) or  die("cannot connect".mysqli_connect_errno());

if (isset($_POST['save'])){
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$password=$_POST['password'];
$birthDate=$_POST['birthDate'];
$gender=$_POST['gender'];
$nationality=$_POST['nationality'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$major=$_POST['major'];
$currentJob=$_POST['currentJob'];
$result= $conn->query("INSERT INTO jobseeker(firstName, lastName,email,password, birthDate, gender,  nationality , city , phone,major, currentJob )VALUES('$firstName','$lastName','$email','$password','$birthDate','$gender','$nationality','$city','$phone','$major','$currentJob')") or 
die($conn->error);
$res=mysqli_query($conn,$result);
if($res)
    header("Location: home.php");
}


?>