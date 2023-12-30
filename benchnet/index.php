<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="./css/index-style.css">
</head>

<body>
	<div class="top-section">


		<p class="animated-p">With Benchnet find bench number and other details easily.</p>
		<div class="p-box"></div>
		<h1 class="top-font">Now find your bench in few clicks</h1>
		<div class="top-font-box"></div>
		<img src="./assest/Illustration_index_page.svg" class="svg">
		<form action="redirect.php" method="POST">
			<input type="submit" class="login-btn2" name="student" value="Log In">
		</form>
		<div class="b-box"></div>
		<div class="middle-section">
			<h1 class="middle-font">Benchnet helps you by</h1>
			<img src="./assest/landing_page/icons.svg" class="icon">
			<img src="./assest/landing_page/icon_text.png" class="icon-text">
			<div class="bottom-section">
				<img src="./assest/landing_page/problem-1.png" class="problem-1">
				<img src="./assest/landing_page/problem-2.png" class="problem-2">
				<img src="./assest/landing_page/problem-svg.png" class="problem-svg">
				<h1 class="bottom-font2">Solution</h1>
				<img src="./assest/landing_page/mobile.png" class="solution-mobile">
				<img src="./assest/landing_page/screen.png" class="solution-screen">
				<form action="redirect.php" method="POST">
					<input type="submit" class="login-btn3" name="student" value="Log In">
				</form>
				<div class="footer">
					<h1 class="footer-font1">Project By -</h1>
					<p class="footer-font2">Smit Sutariya &nbsp&nbsp Saurav Navdhare</p>
					<form action="redirect.php" method="POST">
						<input type="submit" class="admin-btn" name="admin" value="Admin login">
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="sticky">
		<form action="redirect.php" method="POST">
			<img src="./assest/logo.png" class="logo">
			<input type="submit" class="faculty-login" name="faculty" value="Faculty Login">
			<input type="submit" class="login-btn1" name="student" value="Log In">
			<div class="line"></div>
		</form>
	</div>
	<script>
		history.pushState(null, null, null);
		window.addEventListener('popstate', function() {
			history.pushState(null, null, null);
		});
	</script>
</body>

</html>