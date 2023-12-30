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
	<link rel="stylesheet" type="text/css" href=".\css\add-faculty.css">
	<title>Dashboard</title>
</head>
<body>
	<div class="frame-back">
		<img src="./assest/logo.png" class="logo">
		<h1 class="title">Add Faculty</h1>
		<form action="admin-dashboard-redirect.php" method="POST">
			<input type="hidden" name="back" value="yes" />
			<input type="image" id="back_btn" style="display: none;" value="">
			<label for="back_btn">
			</label>
		</form>
		<img src="./assest/faculty_dashboard/profile.png" class="profile">
		<h1 class="name"><?php echo $_SESSION["name"]; ?></h1>
		<button class="active_btn" value="Student">
			<img src="./assest/faculty_dashboard/icon/student_white.png" class="active_icon">
			Faculty
		</button>
		<div class="frame-main">
			<form action="faculty-adder.php" method="POST">
				
				<input type="text" name="fid" class="feild_fid" placeholder="Faculty ID" onfocus="this.placeholder=''" onblur="this.placeholder='Faculty ID'" autocomplete="off" required>
				
				<input type="text" name="name" class="feild_name" placeholder="Faculty Name" onfocus="this.placeholder=''" onblur="this.placeholder='Faculty Name'" autocomplete="off" required>

				<input type="text" name="pass" class="feild_pass" placeholder="Faculty Password" onfocus="this.placeholder=''" onblur="this.placeholder='Faculty Password'" autocomplete="off" required>

				<input type="text" name="sname" class="feild_sname" placeholder="Subject Name" onfocus="this.placeholder=''" onblur="this.placeholder='Student Password'" autocomplete="off" required>
			
				<input type="number" name="num" class="feild_num" placeholder="Mobile number" onfocus="this.placeholder=''" onblur="this.placeholder='Mobile number'" autocomplete="off" required>

				<input type="email" name="email" class="feild_email" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" autocomplete="off" required>

				<input type="submit" name="add_student" value="ADD FACULTY" class="submit_btn">
			</form>		
		</div>
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
					echo "Duplicate Data Exist";
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
