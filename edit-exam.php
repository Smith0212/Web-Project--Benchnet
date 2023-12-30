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
	<link rel="stylesheet" type="text/css" href=".\css\edit-exam.css">
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
			if ($mode=="eedit") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='eedit'>";
				echo "<input type='submit' value='Edit Exam' class='edit_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='eremove'>";
				echo "<input type='submit' value='Remove Exam' class='remove_deactive'>";
				echo "</form>";		
			}
			if ($mode=="eremove") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='eremove'>";
				echo "<input type='submit' value='Remove Exam' class='remove_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='eedit'>";
				echo "<input type='submit' value='Edit Exam' class='edit_deactive'>";
				echo "</form>";
			}
		?>
		</div>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<?php
			$mode=$_SESSION['mode'];
			if ($mode=="eedit") {
				echo "<form action='exam-editer.php' method='POST'>";
				
				echo "<input type='text' name='eid' autocomplete='off' class='feild_eid' placeholder='Exam ID' required>";
				
				echo "<input type='Date' name='edate' class='feild_edate' placeholder='Exam Date' required>";
				
				echo "<input type='text' name='etime' class='feild_etime' placeholder='Exam Time' required>";
				
				echo "<input type='text' name='sname' class='feild_sub' placeholder='Subject Name' required>";

				echo "<input type='text' name='scode' class='feild_scode' placeholder='Subject Code' required>";
				
				echo "<input type='submit' name='add_student' class='submit_btn' value='EDIT EXAM'>";
				echo "</form>";
			}
			if ($mode=="eremove") {
				echo "<form action='exam-remover.php' method='POST'>";
				echo "<input type='text' name='eid' autocomplete='off' class='feild_eid' placeholder='Exam ID' required>";

				echo "<input type='submit' name='remove_exam' class='remove_button' value='REMOVE EXAM' required>";
				echo "</form>";
			}
			?>
		</div>
		<button class="active_btn" value="Exam">
			<img src="./assest/faculty_dashboard/icon/exam_white.png" class="active_icon">
			Exam
		</button>
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="eedit") {
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
					echo "<div class='box_errord'>";
					echo "Exam Exist On Entered Date & Time";
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
			}
			if ($mode=="eremove") {
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
			}
		?>
	</div>

</body>
</html>