<?php
	session_start();
	include 'db_connect.php';
	$exam_id=$_POST['eid'];
	$examexist=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
            if (mysqli_num_rows($examexist)>0) {
            	$sql="select * from seat_allocation where exam_id='$exam_id'";
                $result=mysqli_query($conn,$sql);

                if (mysqli_num_rows($result)>0)
                {	
                    $_SESSION['status']="true";
                    $_SESSION['status_val']=$exam_id;
                    header("Location:view-allocation.php");
                }
                else
                {
                    $_SESSION['status']="falsev";
                    header("Location:view-allocation.php");
                }
            }
            else{
            	$_SESSION['status']="false";
                header("Location:view-allocation.php");
            }
?>