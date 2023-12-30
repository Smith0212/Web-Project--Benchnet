<?php
	session_start();
	$student=$_POST['student'];
	$seat=$_POST['seat'];
	$exam=$_POST['exam'];
	$back=$_POST['back'];
	if ($student=="add") {
		header("Location:add-student.php");
	}
	if ($student=="edit") {
		$_SESSION['mode']='edit';
		header("Location:edit-student.php");
	}
	if ($student=="view") {
		header("Location:view-student.php");
	}
	if ($seat=="add") {
		header("Location:add-seat.php");
	}
	if ($seat=="edit") {
		$_SESSION['mode']='sedit';
		header("Location:modify-seat.php");
	}
	if ($seat=="view") {
		header("Location:view-allocation.php");
	}
	if ($exam=="add") {
		header("Location:add-exam.php");
	}
	if ($exam=="edit") {
		$_SESSION['mode']='eedit';
		header("Location:edit-exam.php");
	}
	if ($exam=="view") {
		header("Location:view-exam.php");
	}
	if ($back=="yes") {
		header("Location:f-dashboard.php");
	}
	if ($back=="syes") {
		header("Location:home-page.php");
	}
?>