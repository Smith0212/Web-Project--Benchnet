<?php
	session_start();
	include 'db_connect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\admin-dashboard.css">
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
				echo "<form action='admin-active1.php' method='POST'>";
				echo "<input type='hidden' value='active1' name='active1' />";
				echo "<input type='submit' class='active_faculty' value='Faculty' />";
				echo "<img src='./assest/admin_dashboard/icon/faculty_white.png' class='student_white'>";
				echo "</form>";

				echo "<form action='admin-active2.php' method='POST'>";
				echo "<input type='hidden' value='active2' name='active2' />";
				echo "<input type='submit' class='inactive_history' value='Removed history' />";
				echo "<img src='./assest/admin_dashboard/icon/history_grey.png' class='history_grey'>";
				echo "</form>";

			}
			elseif ($current=="active2") {
				echo "<form action='admin-active1.php' method='POST'>";
				echo "<input type='hidden' value='active1' name='active1' />";
				echo "<input type='submit' class='inactive_faculty' value='Faculty' />";
				echo "<img src='./assest/admin_dashboard/icon/faculty_grey.png' class='student_grey'>";
				echo "</form>";

				echo "<form action='admin-active2.php' method='POST'>";
				echo "<input type='hidden' value='active2' name='active2' />";
				echo "<input type='submit' class='active_history' value='Removed history' />";
				echo "<img src='./assest/admin_dashboard/icon/history_white.png' class='history_white'>";
				echo "</form>";
			}

		?>
		<div class="frame-main">
			<?php
			$check=$_SESSION['current'];
			if ($check=="active1") {
				echo "<form action='admin-dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='faculty' value='add' />";
				echo "<input type='image' id='add_faculty' style='display: none;' value='' >";
				echo "<label for='add_faculty'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='admin-dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='faculty' value='edit' />";
				echo "<input type='image' id='edit_faculty' style='display: none;' value='' >";
				echo "<label for='edit_faculty'>";
				echo "</label>";
				echo "</form>";

				echo "<form action='admin-dashboard-redirect.php' method='POST'>";
				echo "<input type='hidden' name='faculty' value='view' />";
				echo "<input type='image' id='view_faculty' style='display: none;' value='' >";
				echo "<label for='view_faculty'>";
				echo "</label>";		
				echo "</form>";		
			}
			if ($check=="active2") {
				echo "<div class='switch'>";
				$mode=$_SESSION['mode'];
				if ($mode=="student_r") {
					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='student_r'>";
					echo "<input type='submit' value='Student' class='student_active'>";
					echo "</form>";

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='allocation_r'>";
					echo "<input type='submit' value='Allocation' class='allocation_deactive'>";
					echo "</form>";	

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='exam_r'>";
					echo "<input type='submit' value='Exam' class='exam_deactive'>";
					echo "</form>";		
				}
				if ($mode=="allocation_r") {
					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='student_r'>";
					echo "<input type='submit' value='Student' class='student_deactive'>";
					echo "</form>";

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='allocation_r'>";
					echo "<input type='submit' value='Allocation' class='allocation_active'>";
					echo "</form>";	

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='exam_r'>";
					echo "<input type='submit' value='Exam' class='exam_deactive'>";
					echo "</form>";	
				}	
				if ($mode=="exam_r") {
					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='student_r'>";
					echo "<input type='submit' value='Student' class='student_deactive'>";
					echo "</form>";

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='allocation_r'>";
					echo "<input type='submit' value='Allocation' class='allocation_deactive'>";
					echo "</form>";	

					echo "<form action='mode.php' method='POST'>";
					echo "<input type='hidden' name='active_mode' value='exam_r'>";
					echo "<input type='submit' value='Exam' class='exam_active'>";
					echo "</form>";	
				}
				echo "</div>";
			}
			?>
			<?php
				$check=$_SESSION['current'];
				if ($check=="active2") {
					$mode=$_SESSION['mode'];
					if ($mode=="student_r") {
						echo "<div class='header_student'>";
							echo "<h1 class='ssrno'>Sr no</h1>";
							echo "<h1 class='seno'>Enrollment no</h1>";
							echo "<h1 class='sfid'>Faculty ID</h1>";
							echo "<h1 class='sreason'>Reason</h1>";
						echo "</div>";
						echo "<table cellspacing='0' cellpadding='0'>";
						$sql="SELECT * FROM removed_students";
						$result=$conn->query($sql);
						$h="300";
						$s="0.5";
						$i="1";
						if ($result->num_rows > 0) {
							while($row=$result->fetch_assoc()) {
								echo "<tr class='str' style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
								echo "<td class='col_ssno'>".$i."</td>";
								echo "<td class='col_sone'>".$row["enrollment_no"]."</td>";
								echo "<td class='col_stwo'>".$row["faculty_id"]."</td>";
								echo "<td class='col_sthree'>".$row["reason"]."</td>";
								echo "</tr>";
								$s=$s+'0.5';
								$h=$h+'128';
								$i=$i+'1';
							}
						}
					}
					if ($mode=="allocation_r") {
						echo "<div class='header_allocation'>";
							echo "<h1 class='asrno'>Sr no</h1>";
							echo "<h1 class='afid'>Faculty ID</h1>";
							echo "<h1 class='aeid'>Exam ID</h1>";
							echo "<h1 class='aeno'>Enrollment no</h1>";
							echo "<h1 class='acno'>Class no</h1>";
							echo "<h1 class='abno'>Bench no</h1>";
						echo "</div>";
						echo "<table cellspacing='0' cellpadding='0'>";
						$sql="SELECT * FROM removed_allocation";
						$result=$conn->query($sql);
						$h="300";
						$s="0.5";
						$i="1";
						if ($result->num_rows > 0) {
							while($row=$result->fetch_assoc()) {
								echo "<tr class='atr' style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
								echo "<td class='col_asno'>".$i."</td>";
								echo "<td class='col_aone'>".$row["faculty_id"]."</td>";
								echo "<td class='col_atwo'>".$row["exam_id"]."</td>";
								echo "<td class='col_athree'>".$row["enrollment_no"]."</td>";
								echo "<td class='col_afour'>".$row["class_no"]."</td>";
								echo "<td class='col_afive'>".$row["bench_no"]."</td>";
								echo "</tr>";
								$s=$s+'0.5';
								$h=$h+'128';
								$i=$i+'1';
							}
						}
					}
					if ($mode=="exam_r") {
						echo "<div class='header_exam'>";
							echo "<h1 class='esrno'>Sr no</h1>";
							echo "<h1 class='efid'>Faculty ID</h1>";
							echo "<h1 class='eeid'>Exam ID</h1>";
							echo "<h1 class='eedate'>Exam date</h1>";
							echo "<h1 class='eetime'>Exam time</h1>";
							echo "<h1 class='esname'>Subject name</h1>";
							echo "<h1 class='escode'>Subject code</h1>";
						echo "</div>";
						echo "<table cellspacing='0' cellpadding='0'>";
						$sql="SELECT * FROM removed_exam";
						$result=$conn->query($sql);
						$h="300";
						$s="0.5";
						$i="1";
						if ($result->num_rows > 0) {
							while($row=$result->fetch_assoc()) {
								$date=$row["exam_date"];
								echo "<tr class='etr' style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
								echo "<td class='col_esno'>".$i."</td>";
								echo "<td class='col_eone'>".$row["faculty_id"]."</td>";
								echo "<td class='col_etwo'>".$row["exam_id"]."</td>";
								echo "<td class='col_ethree'>".date('d-m-Y', strtotime($date))."</td>";
								echo "<td class='col_efour'>".$row["exam_time"]."</td>";
								echo "<td class='col_efive'>".$row["subject_name"]."</td>";
								echo "<td class='col_esix'>".$row["subject_code"]."</td>";
								echo "</tr>";
								$s=$s+'0.5';
								$h=$h+'128';
								$i=$i+'1';
							}
						}
					}
				}
			?>
		</div>
	</div>

</body>
</html>

