<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","ehsas_db");
	$eno=$_POST['eno'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$dob=$_POST['dob'];
	$num=$_POST['num'];
	if (!empty($eno) && !empty($name) && !empty($pass) && !empty($dob) && !empty($num)) {
		$duplicate=mysqli_query($conn,"select * from student_list where enrollment_no='$eno' OR mobile_no='$num'");

		if (mysqli_num_rows($duplicate)>0){
   		 	$_SESSION['status']="dupe";
			header("Location:add-student.php");
		}
		else{
			$sql="INSERT INTO student_list VALUES('$eno','$name','$pass','$dob','$num')";
			$result=mysqli_query($conn,$sql);
			if (isset($result)) {
				$_SESSION['status']="true";
				header("Location:add-student.php");
			}
			else{
				$_SESSION['status']="false";
				header("Location:add-student.php");
			}
		}
		
	}
	else{
		$_SESSION['status']="false";
		header("Location:add-student.php");
	}
?>