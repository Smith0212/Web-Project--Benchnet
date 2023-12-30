<?php
session_start();
include 'db_connect.php';
$eno=$_POST['eno'];
$pass=$_POST['pass'];
$_SESSION["eno"]=$_POST['eno'];

$sql="SELECT * FROM student_list where enrollment_no='$eno' AND student_password='$pass'";
$result=$conn->query($sql);

if($row=$result->fetch_assoc()){
	$_SESSION["name"]=$row["student_name"];
	header("Location:home-page.php");
}

elseif (!$row=$result->fetch_assoc()) {
	$_SESSION['error']='set';
	header("Location:student-login.php");
}

?>