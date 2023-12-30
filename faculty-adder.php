<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","ehsas_db");
	$fid=$_POST['fid'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$sname=$_POST['sname'];
	$num=$_POST['num'];
	$email=$_POST['email'];
	if (!empty($fid) && !empty($name) && !empty($pass) && !empty($sname) && !empty($num) && !empty($email)) {
		$duplicate=mysqli_query($conn,"select * from faculty_table where faculty_id='$fid' OR mobile_no='$num' OR email='$email'");

		if (mysqli_num_rows($duplicate)>0){
   		 	$_SESSION['status']="dupe";
			header("Location:add-faculty.php");
		}
		else{
			$sql="INSERT INTO faculty_table VALUES('$fid','$name','$pass','$sname','$num','email')";
			$result=mysqli_query($conn,$sql);
			if (isset($result)) {
				$_SESSION['status']="true";
				header("Location:add-faculty.php");
			}
			else{
				$_SESSION['status']="false";
				header("Location:add-faculty.php");
			}
		}
		
	}
	else{
		$_SESSION['status']="false";
		header("Location:add-faculty.php");
	}
?>