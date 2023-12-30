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
	<link rel="stylesheet" type="text/css" href=".\css\view-student.css">
	<title>Dashboard</title>
</head>
<body>

	<div class="frame-back">
		<div class="top-bar">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">VIEW STUDENTS</h1>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<button class="active_btn" value="Student">
			<img src="./assest/faculty_dashboard/icon/student_white.png" class="active_icon">
			Student
		</button>
		<div class="frame-main">
			<div class="header">
				<h1 class="sno">Sr no</h1>
				<h1 class="eno">Enrollment number</h1>
				<h1 class="sname">Student name</h1>
				<h1 class="dob">Date of birth</h1>
				<h1 class="mno">Mobile number</h1>
			</div>
			<table cellspacing="0" cellpadding="0">
		
			<?php
				$sql="SELECT * FROM student_list";
				$result=$conn->query($sql);
				$h="267";
				$s="0.5";
				$i="1";
				if ($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$date=$row["date_of_birth"];
						echo "<tr style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
						echo "<td class='col_sno'>".$i."</td>";
						echo "<td class='col_one'>".$row["enrollment_no"]."</td>";
						echo "<td class='col_two'>".$row["student_name"]."</td>";
						echo "<td class='col_three'>".date('d-m-Y', strtotime($date))."</td>";
						echo "<td class='col_four'>".$row["mobile_no"]."</td>";
						echo "</tr>";
						$s=$s+'0.5';
						$h=$h+'128';
						$i=$i+'1';
					}
				}
				else{
					echo "<tr style='top:{$h}px'>";
					echo "<td class='col_sno'>"."-"."</td>";
					echo "<td class='col_one'>"."-"."</td>";
					echo "<td class='col_two'>"."-"."</td>";
					echo "<td class='col_three'>"."-"."</td>";
					echo "<td class='col_four'>"."-"."</td>";
					echo "</tr>";
					$h=$h+'128';
				}
				
			?>
			</table>
		</div>
	</div>
	</div>
</body>
</html>