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
                	$sql= "INSERT INTO student_list VALUES('".$val[0]."','".$val[1]."','".$val[2]."','".$val[3]."','".$val[4]."')";
                	$result=mysqli_query($conn, $sql);

      	        }
      	        if (!empty($result)) {
                		$_SESSION['status']="true";
						header("Location:add-student.php");
                }
                else{
                		$_SESSION['status']="false";
						header("Location:add-student.php");
                }
            }
      	  }
        } 
        else 
      	{
    	    echo "Possible file upload attack!\n";
        }
	}
?>