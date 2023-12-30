<?php

    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $eno=$_POST['eno'];
    $exam_id=$_POST['eid'];
    $class=$_POST['cno'];
    $bench=$_POST['bno'];

    if (!empty($eno) && !empty($exam_id) && !empty($class) && !empty($bench)) 
    {
        $duplicate=mysqli_query($conn,"select * from seat_allocation where enrollment_no='$eno' AND exam_id='$exam_id'");
        $duplicat=mysqli_query($conn,"select * from seat_allocation where class_no='$class' AND bench_no='$bench' AND exam_id='$exam_id'");
        if (mysqli_num_rows($duplicate)>0 || mysqli_num_rows($duplicat)>0)
        {
            $_SESSION['status']="dupe";
            header("Location:add-seat.php");
        }
        else
        {   
            $studentexist=mysqli_query($conn,"select * from student_list where enrollment_no='$eno'");
            $examexist=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
            if (mysqli_num_rows($examexist)>0 && mysqli_num_rows($studentexist)>0) {
                $sql="INSERT INTO seat_allocation VALUES('$exam_id','$eno','$class','$bench')";            
                $result=mysqli_query($conn,$sql);

                if (isset($result)) 
                {
                    $_SESSION['status']="true";
                    header("Location:add-seat.php");
                }
                else
                {
                    $_SESSION['status']="false";
                    header("Location:add-seat.php");
                }  
            }
            else
            {
                if (mysqli_num_rows($examexist)>0){
                    $_SESSION['status']="sdne";
                    $_SESSION['status_val']="$eno";
                    header("Location:add-seat.php");
                }
                else{
                    $_SESSION['status']="edne";
                    $_SESSION['status_val']="$exam_id";
                    header("Location:add-seat.php");
                }
            }
            
        }

    }
    else{
       $_SESSION['status']="false";
        header("Location:add-seat.php"); 
    }
    
?>