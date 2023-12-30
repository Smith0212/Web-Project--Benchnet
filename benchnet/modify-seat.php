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
	<link rel="stylesheet" type="text/css" href=".\css\modify-seat.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<button class="active_btn" value="Seat">
			<img src="./assest/faculty_dashboard/icon/seat_white.png" class="active_icon">
			Seating allocation
		</button>
		<div class="switch">
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="sedit") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='sedit'>";
				echo "<input type='submit' value='Edit Allocation' class='edit_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='sremove'>";
				echo "<input type='submit' value='Remove Allocation' class='remove_deactive'>";
				echo "</form>";		
			}
			if ($mode=="sremove") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='sremove'>";
				echo "<input type='submit' value='Remove Allocation' class='remove_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='sedit'>";
				echo "<input type='submit' value='Edit Allocation' class='edit_deactive'>";
				echo "</form>";
			}
		?>
		</div>
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<?php
			$mode=$_SESSION['mode'];
			if ($mode=="sedit") {
				echo "<form action='seat-editer.php' method='POST'>";
				
				echo "<input type='text' name='eid' class='feild_eid' autocomplete='off' placeholder='Exam ID' required>";

				echo "<input type='number' name='eno' class='feild_eno' placeholder='Enrollment Number' required>";
				
				echo "<input type='text' name='cno' class='feild_cno' placeholder='Class Number' required>";
				
				echo "<input type='number' name='bno' class='feild_bno' placeholder='Bench Number' required>";

				echo "<input type='submit' name='edit_seat' class='submit_btn' value='EDIT ALLOCATION'>";
				echo "</form>";
				
			}
			if ($mode=="sremove") {
				echo "<form action='seat-remover.php' method='POST'>";
				echo "<input type='number' name='eno' class='feild_eno' placeholder='Enrollment Number' required>";

				echo "<input type='text' name='eid' class='feild_eid' placeholder='Exam ID' autocomplete='off'>";
				echo "<input type='submit' name='add_student' class='remove_button' value='REMOVE ALLOCATION' required>";
				echo "</form>";
				
			}
			?>
		</div>
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="sedit") {
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
					echo "Duplicate Data Exist";
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
				elseif ($_SESSION['status']=='sdne') {
					echo "<div class='box'>";
					echo "<div class='box_errori'>";
					echo "Student Does Not Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			}
			if ($mode=="sremove") {
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
				elseif ($_SESSION['status']=='sdne') {
					echo "<div class='box'>";
					echo "<div class='box_errori'>";
					echo "Student Does Not Exist";
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