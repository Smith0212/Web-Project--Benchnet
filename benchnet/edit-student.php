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
	<link rel="stylesheet" type="text/css" href=".\css\edit-student.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<div class="switch">
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="edit") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='edit'>";
				echo "<input type='submit' value='Edit Students' class='edit_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='remove'>";
				echo "<input type='submit' value='Remove Students' class='remove_deactive'>";
				echo "</form>";		
			}
			if ($mode=="remove") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='remove'>";
				echo "<input type='submit' value='Remove Students' class='remove_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='edit'>";
				echo "<input type='submit' value='Edit Students' class='edit_deactive'>";
				echo "</form>";
			}
		?>
		</div>
		<div class="title"></div>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<button class="active_btn" value="Student">
			<img src="./assest/faculty_dashboard/icon/student_white.png" class="active_icon">
			Student
		</button>
		<div class="frame-main">
			<?php
			$mode=$_SESSION['mode'];
			if ($mode=="edit") {
				echo "<form action='student-editer.php' method='POST'>";
				
				echo "<input type='number' name='eno' class='feild_eno' placeholder='Enrollment Number' required>";
				
				echo "<input type='text' name='name' class='feild_name' placeholder='Student Name' required>";
				
				echo "<input type='text' name='pass' class='feild_pass' placeholder='Student Password' required>";
				
				echo "<input type='Date' name='dob' class='feild_dob' required>";
				
				echo "<input type='number' name='num' class='feild_num' placeholder='Mobile Number' required>";
				echo "<input type='submit' name='add_student' class='student_button' value='EDIT STUDENT'>";
				echo "</form>";
				
			}
			if ($mode=="remove") {
				echo "<form action='student-remover.php' method='POST'>";
				echo "<input type='number' name='eno' class='feild_eno' placeholder='Enrollment Number' required>";

				echo "<input type='text' name='reason' class='feild_reason' placeholder='Write reason for removing student:'>";
				echo "<input type='submit' name='add_student' class='remove_button' value='REMOVE STUDENT' required>";
				echo "</form>";
				
			}
			?>
			
		</div>
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="edit") {
				if ($_SESSION['status']=='true') {
					echo "<div class='box'>";
					echo "<div class='box_errort'>";
					echo "Data Updated Successfully";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgs.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='false') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Failed To Update Data";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='dupe') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Student Doesn't Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			}
			if ($mode=="remove") {
				if ($_SESSION['status']=='true') {
					echo "<div class='box'>";
					echo "<div class='box_errort'>";
					echo "Data Removed Successfully";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgs.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='false') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Failed To Remove Data";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='dupe') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Student Doesn't Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			}
		?>
	</div>

</body>
</html>