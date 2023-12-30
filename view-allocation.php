<?php
	session_start();
	include 'db_connect.php';
	if (!isset($_SESSION['status'])) {
		$_SESSION['status']='unset';
	}
	if (!isset($_SESSION['status_val'])) {
		$_SESSION['status_val']='unset';
	}
	if (!isset($_SESSION["name"])) {
		header("Location:f-login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href=".\css\view-allocation.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="title">View Allocation</h1>
		<form action="dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<div class="frame-main">
			<form action="allocation-viewer.php" method="POST">
				
				<input type="text" name="eid" autocomplete="off" class="feild_eid" placeholder="Enter Exam ID" onfocus="this.placeholder=''" onblur="this.placeholder='Exam ID'" required>
				
				<input type="submit" name="view-seat" value="Get details" class="submit_btn">
			</form>
					
		</div>
		<button class="active_btn" value="Seating Allocation">
			<img src="./assest/faculty_dashboard/icon/seat_white.png" class="active_icon">
			Seating Allocation
		</button>
		<?php
				if ($_SESSION['status']=='true') {
					$exam=$_SESSION['status_val'];
					echo "<div class='header'>";
						echo "<h1 class='sno'>Sr no</h1>";
						echo "<h1 class='eno'>Enrollment number</h1>";
						echo "<h1 class='cno'>Class number</h1>";
						echo "<h1 class='bno'>Bench number</h1>";
					echo "</div>";
					echo "<table cellspacing='0' cellpadding='0'>";
					$sql="SELECT * FROM seat_allocation WHERE exam_id='$exam'";
					$result=$conn->query($sql);
					$h="440";
					$s="0.5";
					$i="1";
					if ($result->num_rows > 0) {
						while($row=$result->fetch_assoc()) {
							echo "<tr style='top:{$h}px; animation: fadeIn linear {$s}s;'>";
							echo "<td class='col_one'>".$i."</td>";
							echo "<td class='col_two'>".$row["enrollment_no"]."</td>";
							echo "<td class='col_three'>".$row["class_no"]."</td>";
							echo "<td class='col_four'>".$row["bench_no"]."</td>";
							echo "</tr>";
							$s=$s+'0.5';
							$h=$h+'128';
							$i=$i+'1';
						
						}
					}
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='false') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "Exam Does Not Exist";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
				elseif ($_SESSION['status']=='falsev') {
					echo "<div class='box'>";
					echo "<div class='box_errorf'>";
					echo "No Allocation Found";
					echo "</div>";
					echo "<button class='close_button' onClick='window.location.reload();'>X";
					echo "<img src='./assest/faculty_dashboard/msgf.png' class='box_img'></button>";
					echo "</div>";
					$_SESSION['status']="unset";
				}
			?>
	</div>
</body>
</html>