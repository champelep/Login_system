<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login system</title>
	</head>

<body>

	<header>
		<nav>
			<!--<a href="#"> 
				<img src="img/logo.png" alt="logo">
			</a> -->
			<ul>
				<li><a href="index.php">Home</li>
				<li><a href="#">Portfolio</li>
				<li><a href="#">About me</li>
				<li><a href="#">Contact</li>
			</ul>
			<div>
				<?php
					if (isset($_SESSION['userId'])){
					echo '<form action="includes/logout.inc.php" method="post">
					<button type = "submit" name="logout-submit">Logout</button>
					</form>'; 
					}
					else {
					echo '<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/E-mail..."> 
					<input type="password" name="pwd" placeholder="password"> 
					<button type = "submit" name="login-submit">Login</button>
					</form>
					<a href="signup.php">Signup</a>';
					}
				?>
				
				
				
			</div>
		</nav>
	</header>