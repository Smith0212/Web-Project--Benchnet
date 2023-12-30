<?php
session_start();
$_SESSION['current']=$_POST['active3'];
if (isset($_SESSION['current'])) {
	
	header("Location:f-dashboard.php");
}
else{	
	header("Location:error.php");
}

?>