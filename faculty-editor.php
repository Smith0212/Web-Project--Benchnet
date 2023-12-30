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
        $duplicate=mysqli_query($conn,"select * from faculty_table where faculty_id='$fid'");

        if (mysqli_num_rows($duplicate)>0){
            $sql="UPDATE faculty_table SET faculty_name='$name',faculty_password='$pass',subject_name='$sname',mobile_no='$num' ,email='$email' WHERE faculty_id='$fid'";
            $result=mysqli_query($conn,$sql);
            if (isset($result)) {
                $_SESSION['status']="true";
                header("Location:edit-faculty.php");
            }
            else{
                $_SESSION['status']="false";
                header("Location:edit-faculty.php");
            }
            
        }
        else{
            $_SESSION['status']="dupe";
            header("Location:edit-faculty.php");
        }

    }
    else{
        $_SESSION['status']="false";
        header("Location:edit-faculty.php");
    }
?>