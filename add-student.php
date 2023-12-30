<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION['status'])) {
		$_SESSION['status']='unset';
	}
	if (!isset($_SESSION["name"])) {
		header("Location:f-login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\add-student.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">Add Students</h1>
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<button class="active_btn" value="Student">
			<img src="./assest/faculty_dashboard/icon/student_white.png" class="active_icon">
			Student
		</button>
		<div class="frame-main">
			<form action="student-adder.php" method="POST">
				
				<input type="number" name="eno" class="feild_eno" placeholder="Enrollment Number" onfocus="this.placeholder=''" onblur="this.placeholder='Enrollment Number'" required>
				
				<input type="text" name="name" class="feild_name" placeholder="Student Name" onfocus="this.placeholder=''" onblur="this.placeholder='Student Name'" required>

				<input type="text" name="pass" class="feild_pass" placeholder="Student Password" onfocus="this.placeholder=''" onblur="this.placeholder='Student Password'" required>

				<input type="Date" name="dob" class="feild_dob" placeholder="Date of Birth" onfocus="this.placeholder=''" onblur="this.placeholder='Date Of Birth'" required>
			
				<input type="number" name="num" class="feild_num" placeholder="Mobile number" onfocus="this.placeholder=''" onblur="this.placeholder='Mobile number'" required>
				<input type="submit" name="add_student" value="+ ADD STUDENT" class="submit_btn">
			</form>
			<form action="add_student_file.php" method="POST" enctype="multipart/form-data">
				<div  class="image-upload">
					<label for="file_upload">	
						<img src="./css/faculty-dashboard/student/add_student/upload_btn.png" height="276px" height="420px" class="upload_img">
					</label>
					<input type="file" name="table" id="file_upload" required>
				</div>
				<input type="submit" name="upload_submit" class="upload_submit" value="Upload">
			</form>
			
		</div>
		<?php
				if ($_SESSION['status']=='true') {
					echo "<div class='box'>";
					echo "<div class='box_errort'>";
					echo "Data Added Successfully";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgs.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='false') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Failed To Add Data";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='dupe') {
					echo "<div class='box'>";
					echo "<div class='box_errord'>";
					echo "Duplicate Data Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='invalid') {
					echo "<div class='box'>";
					echo "<div class='box_errori'>";
					echo "Invalid File Extention";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			?>
	</div>

</body>
</html>
