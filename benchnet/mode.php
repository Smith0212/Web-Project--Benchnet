<?php
	session_start();
	$val=$_POST['active_mode'];
	if ($val=="edit") {
		$_SESSION['mode']='edit';
		header("Location:edit-student.php");
	}
	if ($val=="remove") {
		$_SESSION['mode']='remove';
		header("Location:edit-student.php");
	}
	if ($val=="sedit") {
		$_SESSION['mode']='sedit';
		header("Location:modify-seat.php");
	}
	if ($val=="sremove") {
		$_SESSION['mode']='sremove';
		header("Location:modify-seat.php");
	}
	if ($val=="eedit") {
		$_SESSION['mode']='eedit';
		header("Location:edit-exam.php");
	}
	if ($val=="eremove") {
		$_SESSION['mode']='eremove';
		header("Location:edit-exam.php");
	}
	if ($val=="aedit") {
		$_SESSION['mode']='aedit';
		header("Location:edit-faculty.php");
	}
	if ($val=="aremove") {
		$_SESSION['mode']='aremove';
		header("Location:edit-faculty.php");
	}
	if ($val=="student_r") {
		$_SESSION['mode']='student_r';
		header("Location:admin-dashboard.php");
	}
	if ($val=="allocation_r") {
		$_SESSION['mode']='allocation_r';
		header("Location:admin-dashboard.php");
	}
	if ($val=="exam_r") {
		$_SESSION['mode']='exam_r';
		header("Location:admin-dashboard.php");
	}
?>