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
	<link rel="stylesheet" type="text/css" href="./css/home-page.css">
</head>
<body>
	<h1 class="welcome">Welcome,</h1>
	<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>

	<div class="sticky">
		<img src="./assest/logo.png" class="logo">
		<form action="redirect-student.php" method="POST">
		<input type="hidden" name="home" value="home">
		<input type="submit" class="home" name="home" value="Home">
		</form>
		<form action="redirect-student.php" method="POST">
		<input type="hidden" name="details" value="details">
		<input type="submit" class="details" name="details" value="View all details">
		</form>
		<form action="redirect-student.php" method="POST">
			<input type="hidden" name="profile" value="profile">
			<input type="image" id="profile-image" style="display: none;" value=" " >
			<label for="profile-image">
			</label>
		</form>
		<div class="line"></div>
		<img src="./assest/home_page/Illustration.svg" class="svg">
		<div class="box">
			<?php 
				$ENO=$_SESSION["eno"];
				$sql="SELECT subject_name,exam_time,class_no,bench_no FROM exam_table,seat_allocation where seat_allocation.enrollment_no=$ENO AND seat_allocation.exam_id=exam_table.exam_id AND exam_table.exam_date=CURDATE()";
				$result=$conn->query($sql);

				if ($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$date=(string)$row["exam_time"];
						$date=substr($date,0,5);
						echo "<h2 class='subject'>"."Subject:"."</h2>";
						echo "<h2 class='class'>"."Class no:"."</h2>";
						echo "<h2 class='bench'>"."Bench no:"."</h2>";
						echo "<h2 class='time'>"."Time:"."</h2>";
						echo "<p class='subject-text'>".$row["subject_name"]."</p>"."<p class='time-text'>".$date."</p>"."<p class='classno-text'>".$row["class_no"]."</p>"."<p class='bench-text'>".$row["bench_no"]."</p>";
					}
				}	else{
					echo "<p class='no-exam'>"."No Exam Today!"."</p>";
				}
				$conn->close();

			?>
		</div>
		<div class="text-box">
			<h1 class="box-text">Today's exam</h1>
		</div>
	</div>
</body>
</html>