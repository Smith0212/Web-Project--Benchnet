<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION["name"])) {
		header("Location:s-login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\s-profile.css">
	<title>Exam Details</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">PROFILE</h1>
		<form action="logout.php">
			<input type="submit" value="Log Out" class="logout">
		</form>
		
		<div class="frame-main">
			<form action="dashboard-redirect.php" method="POST">
				<input type="hidden" name="back" value="syes" />
				<input type="image" id="back_btn" style="display: none;" value="">
				<label for="back_btn">
				</label>
			</form>
			<img src="./assest/student_profile/illustration.png" class="illustration">
		</div>
		<label class="f1">Name</label>
		<label class="f2">Enrollment no</label>
		<label class="f3">Date of birth</label>
		<label class="f4">Mobile number</label>
		<table cellspacing="0" cellpadding="0">
		
			<?php
				$eno=$_SESSION["eno"];
				$sql="SELECT * FROM student_list where enrollment_no='$eno'";
				$result=$conn->query($sql);
				if ($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$date=$row["date_of_birth"];
						echo "<tr class='row_one'>";
						echo "<td class='col_one'>".$row["student_name"]."</td>";
						echo "</tr>";

						echo "<tr class='row_two'>";
						echo "<td class='col_two'>".$row["enrollment_no"]."</td>";
						echo "</tr>";	

						echo "<tr class='row_three'>";
						echo "<td class='col_three'>".date('d-m-Y', strtotime($date))."</td>";
						echo "</tr>";

						echo "<tr class='row_four'>";
						echo "<td class='col_four'>".$row["mobile_no"]."</td>";
						echo "</tr>";
						
					}
				}
			?>
		</table>
	</div>
</body>
</html>