</!DOCTYPE html>
<?php
session_start();
	if(!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')){
		header ("Location:index.php?error=notloggedin");
	}

	// = code starts here
	if(isset($_SESSION['userId']) && $_SESSION['userId']){
		$con= new mysqli("localhost","root","","loginsystem") or die("ERROR:could not connect to the database!!!");
		$sql="SELECT * FROM users WHERE idUsers = ". $_SESSION['userId'];
	}
	if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  	while ($row = mysqli_fetch_assoc($result))
    {
    	// var_dump($row);
    	// echo "<br>";
   		$msg = $row['textarea'];
    }
  // Free result set
 		 mysqli_free_result($result);
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
	<form action="includes/portfolio.inc.php" method="post">
		<textarea name = "savedMessage" rows = "30" cols = "50" placeholder="enter your mesage"><?php echo $msg; ?></textarea>
		<br>
		<input type = "submit" value = "Save" name = "save">
		<input type="submit" value = "Display" name="disp"/>
	</form>
</body>
</html>