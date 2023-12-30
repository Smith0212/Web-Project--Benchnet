<?php
session_start();
include 'db_connect.php';
$aid=$_POST['aid'];
$pass=$_POST['pass'];

$sql="SELECT * FROM admin_table where admin_id='$aid' AND admin_password='$pass'";
$result=$conn->query($sql);

if($row=$result->fetch_assoc()){
	$_SESSION["name"]=$row["admin_name"];
	$_SESSION['current']="active1";
	header("Location:admin-dashboard.php");
}

elseif (!$row=$result->fetch_assoc()) {
	$_SESSION['error']='set';
	header("Location:admin-login.php");
}

?>