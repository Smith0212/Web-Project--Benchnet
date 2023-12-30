<?php
session_start();
include 'db_connect.php';
$fid=$_POST['fid'];
$pass=$_POST['pass'];

$sql="SELECT * FROM faculty_table where faculty_id='$fid' AND faculty_password='$pass'";
$result=$conn->query($sql);

if($row=$result->fetch_assoc()){
	$_SESSION["name"]=$row["faculty_name"];
	$_SESSION["fid"]=$row["faculty_id"];
	$_SESSION['current']="active1";
	header("Location:f-dashboard.php");
}

elseif (!$row=$result->fetch_assoc()) {
	$_SESSION['error']='set';
	header("Location:faculty-login.php");
}

?>