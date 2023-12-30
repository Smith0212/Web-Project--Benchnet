<?php
	session_start();
	include 'db_connect.php';
	if (isset($_POST['upload_submit'])) {
		$uploaddir = './';
		$uploadfile = $uploaddir . basename($_FILES['table']['name']);
		if (move_uploaded_file($_FILES['table']['tmp_name'], $uploadfile)){
            $fname=$_FILES['table']['name'];
      		$fextention=pathinfo($fname,PATHINFO_EXTENSION);
       		$allowed=array('csv');
       	 	if (!in_array($fextention, $allowed)) {
      	    $_SESSION['status']="invalid";
				    header("Location:add-student.php");
       	 }
      	  else{
       	    if ($_FILES["table"]["size"] > 0) {
      	      	$file=fopen($fname,"r");
       	        while (($val = fgetcsv($file, 10000, ",")) !== FALSE) {
                	
                          if (!empty($val[0]) && !empty($val[1]) && !empty($val[2]) && !empty($val[3])) {
                            
                          
                              $duplicate=mysqli_query($conn,"select * from seat_allocation where enrollment_no='$val[1]' AND exam_id='$val[0]'");
                              $duplicat=mysqli_query($conn,"select * from seat_allocation where class_no='$val[2]' AND bench_no='$val[3]' AND exam_id='$val[0]'");
                              if (mysqli_num_rows($duplicate)>0 || mysqli_num_rows($duplicat)>0)
                              {
                                  $_SESSION['status']="dupe";
                                  header("Location:add-seat.php");
                                  break;
                              }
                              else
                              {   
                                  $studentexist=mysqli_query($conn,"select * from student_list where enrollment_no='$val[1]'");
                                  $examexist=mysqli_query($conn,"select * from exam_table where exam_id='$val[0]'");
                                  if (mysqli_num_rows($examexist)>0 && mysqli_num_rows($studentexist)>0) {
                                      $sql= "INSERT INTO seat_allocation VALUES('".$val[0]."','".$val[1]."','".$val[2]."','".$val[3]."')";
                                      $result=mysqli_query($conn, $sql);

                                      if (isset($result)) 
                                      {
                                          $_SESSION['status']="true";
                                          header("Location:add-seat.php");

                                      }
                                      else
                                      {                 
                                          $_SESSION['status']="false";
                                          header("Location:add-seat.php");
                                          break;
                                      }  
                                  }
                                  else
                                  { 
                                      if (mysqli_num_rows($examexist)>0){
                                        $_SESSION['status']="sdne";
                                        $_SESSION['status_val']="$val[1]";
                                        header("Location:add-seat.php");
                                      }
                                      else{

                                        $_SESSION['status']="edne";
                                        $_SESSION['status_val']="$val[0]";
                                        header("Location:add-seat.php");
                                      }
                                      break;
                                  }
                                  
                              }
                            }

      	        }
            }
      	  }
        } 
        else 
      	{
          $_SESSION['status']="updf";
          header("Location:add-seat.php");
        }
	}
?>