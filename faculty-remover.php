<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $faculty_id=$_POST['fid'];

    if (!empty($faculty_id)) 
    {
        $examexist=mysqli_query($conn,"select * from faculty_table where faculty_id='$faculty_id'");
        if (mysqli_num_rows($examexist)>0) {
            $sql="DELETE FROM faculty_table WHERE faculty_id='$faculty_id'";
            $result=mysqli_query($conn,$sql);
            if (isset($result))
            {
                $_SESSION['status']="true";
                header("Location:edit-faculty.php");
            }
            else
            {
                $_SESSION['status']="false";
                header("Location:edit-faculty.php");
            }
        }
        else{
                $_SESSION['status']="fdne";
                header("Location:edit-faculty.php");
        }
    }
    else
    {
        $_SESSION['status']="false";
        header("Location:edit-faculty.php");
    }
?>