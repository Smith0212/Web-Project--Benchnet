<?php
session_start();
$_SESSION['error']='unset';
$value=$_POST['faculty'];
$s_value=$_POST['student'];
$a_value=$_POST['admin'];
if (isset($value)) {
	header("Location:faculty-login.php");
}
elseif (isset($s_value)) {
	header("Location:student-login.php");
}
elseif (isset($a_value)) {
	header("Location:admin-login.php");
}
	

?>