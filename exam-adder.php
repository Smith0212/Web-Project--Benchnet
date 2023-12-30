<?php

    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $exam_id=$_POST['eid'];
    $exam_date=$_POST['edate'];
    $exam_time=$_POST['etime'];
    $subject_name=$_POST['sname'];
    $subject_code=$_POST['scode'];

    if (!empty($exam_id) && !empty($exam_date) && !empty($exam_time) && !empty($subject_name) && !empty($subject_code)) 
    {
        $duplicate=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
        $duplicat=mysqli_query($conn,"select * from exam_table where exam_date='$exam_date' AND exam_time='$exam_time'");
        if (mysqli_num_rows($duplicate)>0 || mysqli_num_rows($duplicat)>0)
        {
            $_SESSION['status']="dupe";
            header("Location:add-exam.php");
        }
        else
        {   
                
                $sql="INSERT INTO exam_table VALUES('$exam_id','$exam_date','$exam_time','$subject_name','$subject_code')";            
                $result=mysqli_query($conn,$sql);

                if (isset($result)) 
                {
                    $_SESSION['status']="true";
                    header("Location:add-exam.php");
                }
                else
                {
                    $_SESSION['status']="false";
                    header("Location:add-exam.php");
                }
            
        }

    }
    else
    {
        $_SESSION['status']="false";
        header("Location:add-exam.php");
    }
    
?>