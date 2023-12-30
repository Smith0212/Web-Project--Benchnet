<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION["name"])) {
		header("Location:f-login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\faculty-page.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<form action="logout.php">
			<input type="submit" value="Log Out" class="logout">
		</form>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<?php
			$current=$_SESSION['current'];
			if ($current=="active1") {
				echo "<form action='active1.php' method='POST'>";
				echo "<input type='hidden' value='active1' name='active1' />";
				echo "<input type='submit' class='active_student' value='Student' />";
				echo "<img src='./assest/faculty_dashboard/icon/student_white.png' class='student_white'>";
				echo "</form>";

				echo "<form action='active2.php' method='POST'>";
				echo "<input type='hidden' value='active2' name='active2' />";
				echo "<input type='submit' class='inactive_seat' value='Seating allocation' />";
				echo "<img src='./assest/faculty_dashboard/icon/seat_grey.png' class='seat_grey'>";
				echo "</form>";

				echo "<form action='active3.php' method='POST'>";
				echo "<input type='hidden' value='active3' name='active3' />";
				echo "<input type='submit' class='inactive_exam' value='Exam' />";
				echo "<img src='./assest/faculty_dashboard/icon/exam_grey.png' class='exam_grey'>";
				echo "</form>";
			}
			elseif ($current=="active2") {
				echo "<form action='active1.php' method='POST'>";
				echo "<input type='hidden' value='active1' name='active1' />";
				echo "<input type='submit' class='inactive_student' value='Student' />";
				echo "<img src='./assest/faculty_dashboard/icon/student_grey.png' class='student_grey'>";
				echo "</form>";

				echo "<form action='active2.php' method='POST'>";
				echo "<input type='hidden' value='active2' name='active2' />";
				echo "<input type='submit' class='active_seat' value='Seating allocation' />";
				echo "<img src='./assest/faculty_dashboard/icon/seat_white.png' class='seat_white'>";
				echo "</form>";

				echo "<form action='active3.php' method='POST'>";
				echo "<input type='hidden' value='active3' name='active3' />";
				echo "<input type='submit' class='inactive_exam' value='Exam' />";
				echo "<img src='./assest/faculty_dashboard/icon/exam_grey.png' class='exam_grey'>";
				echo "</form>";
			}
			elseif ($current=="active3") {
				echo "<form action='active1.php' method='POST'>";
				echo "<input type='hidden' value='active1' name='active1' />";
				echo "<input type='submit' class='inactive_student' value='Student' />";
				echo "<img src='./assest/faculty_dashboard/icon/student_grey.png' class='student_grey'>";
				echo "</form>";

				echo "<form action='active2.php' method='POST'>";
				echo "<input type='hidden' value='active2' name='active2' />";
				echo "<input type='submit' class='inactive_seat' value='Seating allocation' />";
				echo "<img src='./assest/faculty_dashboard/icon/seat_grey.png' class='seat_grey'>";
				echo "</form>";

				echo "<form action='active3.php' method='POST'>";
				echo "<input type='hidden' value='active3' name='active3' />";
				echo "<input type='submit' class='active_exam' value='Exam' />";
				echo "<img src='./assest/faculty_dashboard/icon/exam_white.png' class='exam_white'>";
				echo "</form>";
			}

		?>
		<div class="frame-main">
			<?php
			$check=$_SESSION['current'];
			if ($check=="active1") {
				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='student' value='add' />";
				echo "<input type='image' id='add_student' style='display: none;' value='' >";
				echo "<label for='add_student'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='student' value='edit' />";
				echo "<input type='image' id='edit_student' style='display: none;' value='' >";
				echo "<label for='edit_student'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='student' value='view' />";
				echo "<input type='image' id='view_student' style='display: none;' value='' >";
				echo "<label for='view_student'>";
				echo "</label>";		
				echo "</form>";		
			}
			if ($check=="active2") {
				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='seat' value='add' />";
				echo "<input type='image' id='add_seat' style='display: none;' value='' >";
				echo "<label for='add_seat'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='seat' value='edit' />";
				echo "<input type='image' id='edit_seat' style='display: none;' value='' >";
				echo "<label for='edit_seat'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='seat' value='view' />";
				echo "<input type='image' id='view_seat' style='display: none;' value='' >";
				echo "<label for='view_seat'>";
				echo "</label>";		
				echo "</form>";	
			
			}
			if ($check=="active3") {
				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='exam' value='add' />";
				echo "<input type='image' id='add_exam' style='display: none;' value='' >";
				echo "<label for='add_exam'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='exam' value='edit' />";
				echo "<input type='image' id='edit_exam' style='display: none;' value='' >";
				echo "<label for='edit_exam'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='exam' value='view' />";
				echo "<input type='image' id='view_exam' style='display: none;' value='' >";
				echo "<label for='view_exam'>";
				echo "</label>";		
				echo "</form>";				
			}
			?>
			
		</div>
	</div>

</body>
</html>