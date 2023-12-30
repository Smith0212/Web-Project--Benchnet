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
	<link rel="stylesheet" type="text/css" href=".\css\exam-details.css">
	<title>Exam Details</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">ALL DETAILS</h1>
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
			<div class="header">
				<h1 class="sno">Sr no</h1>
				<h1 class="edate">Exam date</h1>
				<h1 class="etime">Exam time</h1>
				<h1 class="sname">Subject name</h1>
				<h1 class="scode">Subject code</h1>
			</div>
			<table cellspacing="0" cellpadding="0">
		
			<?php
				$sql="SELECT * FROM exam_table where exam_date BETWEEN CURDATE() AND CURDATE()+10 order by exam_date";
				$result=$conn->query($sql);
				$h="267";
				$s="0.5";
				$i="1";
				if ($result->num_rows > 0) {
					while($row=$result->fetch_assoc()) {
						$date=$row["exam_date"];
						echo "<tr style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
						echo "<td class='col_sno'>".$i."</td>";
						echo "<td class='col_three'>".date('d-m-Y', strtotime($date))."</td>";
						echo "<td class='col_two'>".$row["exam_time"]."</td>";
						echo "<td class='col_one'>".$row["subject_name"]."</td>";
						echo "<td class='col_four'>".$row["subject_code"]."</td>";
						echo "</tr>";
						$h=$h+'128';
						$s=$s+"0.5";
						$i=$i+"1";
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

</body>
</html>