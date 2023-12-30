<?php
session_start();
	$faculty=$_POST['faculty'];
	$back=$_POST['back'];
	if ($faculty=="add") {
		header("Location:add-faculty.php");
	}
	if ($faculty=="edit") {
		$_SESSION['mode']='aedit';
		header("Location:edit-faculty.php");
	}
	if ($faculty=="view") {
		header("Location:view-faculty.php");
	}
	if ($back=="yes") {
		header("Location:admin-dashboard.php");
	}
?>