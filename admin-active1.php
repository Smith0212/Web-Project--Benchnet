<?php
session_start();
$_SESSION['current']=$_POST['active1'];
if (isset($_SESSION['current'])) {
	header("Location:admin-dashboard.php");
}
else{
	header("Location:error.php");
}

?>