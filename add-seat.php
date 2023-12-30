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
	<link rel="stylesheet" type="text/css" href=".\css\add-seat.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="title">Add Allocation</h1>
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<form action="seat-adder.php" method="POST">
				
				<input type='number' name='eno' class='feild_eno' placeholder='Enrollment Number' onfocus="this.placeholder=''" onblur="this.placeholder='Enrollment Number'" required>
				
				<input type="text" name="eid" autocomplete="off" class="feild_eid" placeholder="Exam ID" onfocus="this.placeholder=''" onblur="this.placeholder='Exam ID'" required>
				
				<input type='text' name='cno' class='feild_cno' placeholder='Class Number' onfocus="this.placeholder=''" onblur="this.placeholder='Class Number'" required> 

				<input type='number' name='bno' class='feild_bno' placeholder='Bench Number' onfocus="this.placeholder=''" onblur="this.placeholder='Bench Number'" required>

				<input type="submit" name="add_exam" value="ADD ALLOCATION" class="submit_btn">
			</form>
			<form action="add_seat_file.php" method="POST" enctype="multipart/form-data">
				<div  class="image-upload">
					<label for="file_upload">	
						<img src="./css/faculty-dashboard/student/add_student/upload_btn.png" height="276px" height="420px" class="upload_img">
					</label>
					<input type="file" name="table" id="file_upload">
				</div>
				<input type="submit" name="upload_submit" class="upload_submit" value="Upload">
			</form>
			</div>
			
			
		</div>
		<button class="active_btn" value="Seating Allocation">
			<img src="./assest/faculty_dashboard/icon/seat_white.png" class="active_icon">
			Seating Allocation
		</button>
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
					echo "<div class='box_errorf'>";
					echo "Duplicate Data Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='sdne') {
					echo "<div class='box'>";
					echo "<div class='box_errort'>";
					echo "Student Does Not Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='edne') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Exam Does Not Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='updf') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Please Upload File";
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