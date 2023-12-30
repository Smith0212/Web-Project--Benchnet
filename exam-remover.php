<?php
    session_start();
    $conn=mysqli_connect("localhost","root","","ehsas_db");

    $exam_id=$_POST['eid'];
    $fid=$_SESSION['fid'];
    if (!empty($exam_id)) 
    {
        $examexist=mysqli_query($conn,"select * from exam_table where exam_id='$exam_id'");
        if (mysqli_num_rows($examexist)>0) {
            $fetch="SELECT * FROM exam_table where exam_id='$exam_id'";
            $results=$conn->query($fetch);
            if ($results->num_rows > 0) {
                while($row=$results->fetch_assoc()) {
                    $edate=$row['exam_date'];
                    $etime=$row['exam_time'];
                    $sname=$row['subject_name'];
                    $scode=$row['subject_code'];
                    $adding=mysqli_query($conn,"INSERT INTO removed_exam VALUES ('$fid','$exam_id','$edate','$etime','$sname',$scode)");
                    $sql="DELETE FROM exam_table WHERE exam_id='$exam_id'";
                    $result=mysqli_query($conn,$sql);
                    $qry="DELETE FROM seat_allocation WHERE exam_id='$exam_id'";
                    $result2=mysqli_query($conn,$qry);
                    if (isset($adding) && isset($result) && isset($result2))
                    {
                        $_SESSION['status']="true";
                        header("Location:edit-exam.php");
                    }
                    else
                    {
                        $_SESSION['status']="false";
                        header("Location:edit-exam.php");
                    }
                }
            }
            else{
                $_SESSION['status']="false";
                header("Location:edit-exam.php");
            }
        }
        else{
                $_SESSION['status']="edne";
                $_SESSION['status_val']="$exam_id";
                header("Location:edit-exam.php");
        }
    }
    else
    {
        $_SESSION['status']="false";
        header("Location:edit-exam.php");
    }
?>
