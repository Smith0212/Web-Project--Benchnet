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
	<link rel="stylesheet" type="text/css" href=".\css\view-exam.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">VIEW EXAM</h1>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<div class="header">
				<h1 class="sno">Sr no</h1>
				<h1 class="eid">Exam ID</h1>
				<h1 class="edate">Exam date</h1>
				<h1 class="etime">Exam time</h1>
				<h1 class="sname">Subject name</h1>
				<h1 class="scode">Subject code</h1>
			</div>
			<table cellspacing="0" cellpadding="0">
		
			<?php
				$sql="SELECT * FROM exam_table";
				$result=$conn->query($sql);
				$h="267";
				$s="0.5";
				$i="1";
				if ($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$date=$row["exam_date"];
						echo "<tr style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
						echo "<td class='col_no'>".$i."</td>";
						echo "<td class='col_one'>".$row["exam_id"]."</td>";
						echo "<td class='col_two'>".date('d-m-Y', strtotime($date))."</td>";
						echo "<td class='col_three'>".$row["exam_time"]."</td>";
						echo "<td class='col_four'>".$row["subject_name"]."</td>";
						echo "<td class='col_five'>".$row["subject_code"]."</td>";
						echo "</tr>";
						$s=$s+'0.5';
						$h=$h+'128';
						$i=$i+'1';
					}
				}
				else{
					echo "<tr style='top:{$h}px'>";
					echo "<td class='col_no'>"."-"."</td>";
					echo "<td class='col_one'>"."-"."</td>";
					echo "<td class='col_two'>"."-"."</td>";
					echo "<td class='col_three'>"."-"."</td>";
					echo "<td class='col_four'>"."-"."</td>";
					echo "<td class='col_five'>"."-"."</td>";
					echo "</tr>";
					$h=$h+'128';
				}
				
			?>
			</table>

		</div>
		<button class="active_btn" value="Exam">
			<img src="./assest/faculty_dashboard/icon/exam_white.png" class="active_icon">
			Exam
		</button>
	</div>

</body>
</html>