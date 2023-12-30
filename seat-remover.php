<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $eno=$_POST['eno'];
    $exam_id=$_POST['eid'];
    $fid=$_SESSION['fid'];
    if (!empty($eno) && !empty($exam_id)) 
    {
        $studentexist=mysqli_query($conn,"select * from student_list where enrollment_no='$eno'");
        $examexist=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
        if (mysqli_num_rows($examexist)>0 && mysqli_num_rows($studentexist)>0){
            $fetch="SELECT * FROM seat_allocation where exam_id='$exam_id' AND enrollment_no='$eno'";
            $results=$conn->query($fetch);
            if ($results->num_rows > 0) {
                while($row=$results->fetch_assoc()) {
                    $cno=$row['class_no'];
                    $bno=$row['bench_no'];
                    $adding=mysqli_query($conn,"INSERT INTO removed_allocation VALUES ('$fid','$exam_id','$eno','$cno','$bno')");
                    $sql="DELETE FROM seat_allocation WHERE enrollment_no='$eno' AND exam_id='$exam_id'";
                    $result=mysqli_query($conn,$sql);

                    if (isset($adding) && isset($result))
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
    else
    {
        $_SESSION['status']="false";
        header("Location:modify-seat.php");
    }
?>