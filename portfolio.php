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

</body>
</html>