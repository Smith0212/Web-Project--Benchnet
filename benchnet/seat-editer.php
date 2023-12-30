<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $eno=$_POST['eno'];
    $exam_id=$_POST['eid'];
    $class=$_POST['cno'];
    $bench=$_POST['bno'];

    if (!empty($eno) && !empty($exam_id) && !empty($class) && !empty($bench)) 
    {   
        
        $duplicate=mysqli_query($conn,"select * from seat_allocation where class_no='$class' AND bench_no='$bench' AND exam_id='$exam_id'");
        if (mysqli_num_rows($duplicate)>0)
        {
            $_SESSION['status']="dupe";
            header("Location:modify-seat.php");
        }
        else
        {
            $studentexist=mysqli_query($conn,"select * from student_list where enrollment_no='$eno'");
            $examexist=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
            if (mysqli_num_rows($examexist)>0 && mysqli_num_rows($studentexist)>0){
                $sql="UPDATE seat_allocation SET enrollment_no='$eno',class_no='$class',bench_no='$bench' WHERE enrollment_no='$eno' AND exam_id='$exam_id'";
                $result=mysqli_query($conn,$sql);

                if (isset($result))
                 {
                    $_SESSION['status']="true";
                    header("Location:modify-seat.php");
                }
                else
                {
                    $_SESSION['status']="false";
                    header("Location:modify-seat.php");
                }
            }
            else{
                if (mysqli_num_rows($examexist)>0){
                    $_SESSION['status']="sdne";
                    $_SESSION['status_val']="$eno";
                    header("Location:modify-seat.php");
                }
                else{
                    $_SESSION['status']="edne";
                    $_SESSION['status_val']="$exam_id";
                    header("Location:modify-seat.php");
                }
            }
        }
    }
    else
    {
        $_SESSION['status']="false";
        header("Location:modify-seat.php");
    }
?>