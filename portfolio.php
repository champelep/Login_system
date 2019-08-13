</!DOCTYPE html>
<?php
session_start();
	if(!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')){
		header ("Location:index.php?error=notloggedin");
	
	}
?> 
<html>

<head>
	<title>Your portfolio</title>
</head>
<body>
<a href="#"> 
	<img src="img/logo.png" alt="logo" width="100" height="100">
	<br>
	<form>
		<form action="includes/portfolio.inc.php" method="post">
		<textarea name = "message" rows = "30" cols = "50" placeholder="enter your mesage"></textarea><br>
		<button type = "submit" name = "save-message"> Save Message </button>
	</form>
</body>
</html>