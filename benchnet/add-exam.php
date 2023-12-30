<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION['status'])) {
		$_SESSION['status']='unset';
	}
	if (!isset($_SESSION["name"])) {
		header("Location:f-login.php");
	}
	$curdate=date("d-m-Y");
	echo "$curdate";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\add-exam.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="title">Add Exam</h1>
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<form action="exam-adder.php" method="POST">
				
				<input type="text" name="eid" autocomplete="off" class="feild_eid" placeholder="Exam ID" onfocus="this.placeholder=''" onblur="this.placeholder='Exam ID'" required>
				
				<input type="Date" name="edate" class="feild_edate" min="20-4-2021" placeholder="Exam Date" onfocus="this.placeholder=''" onlur="this.placeholder='Exam Date'" required>

				<input type="text" name="etime" class="feild_etime"  placeholder="Exam Time" onfocus="this.placeholder=''" onblur="this.placeholder='Exam Time'" required> 

				<input type="text" name="sname" class="feild_sub" placeholder="Subject Name" onfocus="this.placeholder=''" onblur="this.placeholder='Subject Name'" required>
			
				<input type="text" name="scode" class="feild_scode" placeholder="Subject Code" onfocus="this.placeholder=''" onblur="this.placeholder='Subject Code'" required>
				<input type="submit" name="add_exam" value="ADD EXAM" class="submit_btn">
			</form>
			</div>
			
			
		</div>
		<button class="active_btn" value="Exam">
			<img src="./assest/faculty_dashboard/icon/exam_white.png" class="active_icon">
			Exam
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
					echo "<div class='box_errord'>";
					echo "Duplicate Data Or Exam Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='pastd') {
					echo "<div class='box'>";
					echo "<div class='box_errorpd'>";
					echo "Exam Cannot Be Added In Past";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			?>
	</div>
	pastd
</body>
</html>