<?php
	session_start();
	$conn=mysqli_connect("localhost","root","","ehsas_db");
	$eno=$_POST['eno'];
	$reason=$_POST['reason'];
	$fid=$_SESSION['fid'];
	if (!empty($eno) && !empty($reason)) {
		$duplicate=mysqli_query($conn,"select * from student_list where enrollment_no='$eno'");
        if (mysqli_num_rows($duplicate)>0)
        {
            $qry="INSERT INTO removed_students VALUES('$eno','$fid','$reason')";
			$result=mysqli_query($conn,$qry);
			$sql="DELETE FROM student_list WHERE enrollment_no='$eno'";
			$result2=mysqli_query($conn,$sql);
			$sql="DELETE FROM seat_allocation WHERE enrollment_no='$eno'";
			$result3=mysqli_query($conn,$sql);
			if (isset($result) && isset($result2) && isset($result3)) {
				$_SESSION['status']="true";
				header("Location:edit-student.php");
			}
			else{
				$_SESSION['status']="false";
				header("Location:edit-student.php");
			}
        }
        else{
        	 $_SESSION['status']="dupe";
            header("Location:edit-student.php");			
		}
	}
	else{
		$_SESSION['status']="false";
		header("Location:edit-student.php");
	}
?>