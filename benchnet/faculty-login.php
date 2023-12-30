<?php
	session_start();
	if (!isset($_SESSION['error'])) {
		$_SESSION['status']='unset';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/faculty-login.css">
</head>
<body>
	<div class="frame-right">	
	<img class="img1" src="./assest/logo.png">
		<div class="asset_1">
		<h1>Log In</h1>
		<div class="asset_2">
		<form action="f-login.php" method="POST">
			<input type="text" name="fid" class="box_1" placeholder="Faculty ID" onfocus="this.placeholder=''" onblur="this.placeholder='Faculty ID'" required>
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
	<div class="frame-left">
		<img src="./assest/faculty_login/illustration.svg" class="svg">
		<img src="./assest/faculty_login/text.png" class="text-img">
	</div>
</body>
</html>