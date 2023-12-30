<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION['status'])) {
		$_SESSION['status']='unset';
	}
	if (!isset($_SESSION["name"])) {
		header("Location:a-login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\edit-faculty.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<form action="admin-dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<div class="switch">
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="aedit") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='aedit'>";
				echo "<input type='submit' value='Edit Faculty' class='edit_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='aremove'>";
				echo "<input type='submit' value='Remove Faculty' class='remove_deactive'>";
				echo "</form>";		
			}
			if ($mode=="aremove") {
				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='aremove'>";
				echo "<input type='submit' value='Remove Faculty' class='remove_active'>";
				echo "</form>";

				echo "<form action='mode.php' method='POST'>";
				echo "<input type='hidden' name='active_mode' value='aedit'>";
				echo "<input type='submit' value='Edit Faculty' class='edit_deactive'>";
				echo "</form>";
			}
		?>
		</div>
		<div class="title"></div>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<button class="active_btn" value="Student">
			<img src="./assest/faculty_dashboard/icon/student_white.png" class="active_icon">
			Faculty
		</button>
		<div class="frame-main">
			<?php
			$mode=$_SESSION['mode'];
			if ($mode=="aedit") {
				echo "<form action='faculty-editor.php' method='POST'>";
				
				echo "<input type='text' name='fid' class='feild_fid' placeholder='Faculty ID' required>";
				
				echo "<input type='text' name='name' class='feild_name' placeholder='Faculty Name' required>";
				
				echo "<input type='text' name='pass' class='feild_pass' placeholder='Faculty Password' required>";

				echo "<input type='text' name='sname' class='feild_sname' placeholder='Subject Name' required>";
				
				echo "<input type='number' name='num' class='feild_num' placeholder='Mobile Number' required>";

				echo "<input type='email' name='email' class='feild_email' placeholder='Email' required>";

				echo "<input type='submit' name='edit_faculty' class='faculty_button' value='EDIT FACULTY'>";
				echo "</form>";
				
			}
			if ($mode=="aremove") {
				echo "<form action='faculty-remover.php' method='POST'>";
				echo "<input type='text' name='fid' class='feild_fid' placeholder='Faculty ID' required>";

				echo "<input type='submit' name='remove_faculty' class='remove_button' value='REMOVE FACULTY' required>";
				echo "</form>";
				
			}
			?>
			
		</div>
		<?php
			$mode=$_SESSION['mode'];
			if ($mode=="aedit") {
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
					echo "Faculty Doesn't Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			}
			if ($mode=="aremove") {
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
				elseif ($_SESSION['status']=='fdne') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Faculty Doesn't Exist";
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