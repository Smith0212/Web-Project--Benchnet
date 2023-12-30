<?php
	session_start();
	if (!isset($_SESSION['error'])) {
		$_SESSION['status']='unset';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/student-login.css">
</head>
<body>
	<div class="frame-left">	
	<img class="img1" src="./assest/logo.png">
		<div class="asset_1">
		<h1>Log In</h1>
		<div class="asset_2">
		<form action="s-login.php" method="POST">
			<input type="text" name="eno" class="box_1" placeholder="Enrollment Number" onfocus="this.placeholder=''" onblur="this.placeholder='Enrollment Number'" required>
			<input type="password" name="pass" class="box_2" placeholder="Password" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" required>
			<button type="submit" class="button">Log In</button>
		</form>
		</div>
		</div>
		<?php 
			if ($_SESSION['error']=='set') {
				echo "<label class='error'>";
				echo "Invalid Login Credentials";
				echo "</label>";
				$_SESSION['error']='unset';
			}
		?>
	</div>
	<div class="frame_right">
		<img src="./assest/student_login/illustration.svg" class="svg">
		<img src="./assest/student_login/text.png" class="text-img">
	</div>
</body>
</html>