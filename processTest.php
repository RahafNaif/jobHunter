<?php

$dbServername= "localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbname) or  die("cannot connect".mysqli_connect_errno());

if (isset($_POST['save'])){
$email=$_POST['email'];
$password=$_POST['password'];
$result= $conn->query("INSERT INTO test(email, password )VALUES('$email','$password')") or 
die($conn->error);
$res=mysqli_query($conn,$result);
if($res)
    header("Location: prof.php");
}


?>