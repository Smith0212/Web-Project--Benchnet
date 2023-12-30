<?php
session_start();
$_SESSION['current']=$_POST['active2'];
if (isset($_SESSION['current'])) {
	$_SESSION['mode']='student_r';
	header("Location:admin-dashboard.php");
}
else{
	header("Location:error.php");
}

?>