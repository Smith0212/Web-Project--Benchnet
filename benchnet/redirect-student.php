<?php
$home=$_POST['home'];
$details=$_POST['details'];
$profile=$_POST['profile'];
if (isset($home)) {
	header("Location:index.php");
}
if (isset($details)){
	header("Location:exam-details.php");
}
if (isset($profile)) {
	header("Location:s-profile.php");
}
?>