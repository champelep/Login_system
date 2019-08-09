<?php
if (isset($_POST["login-submit"])) {
	
	require "dbh.inc.php";

	$username = $_POST["mailuid"];
	// $email = $_POST["mailuid"];
	$password = $_POST["pwd"];

	if (empty($username) || empty($email) || empty($password) ) {
		header("location: ../signup.php?error=emptyfields&uid=".$username."&mail".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("location: ../signup.php?error=invalidmailuid");
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("location: ../signup.php?error=invladinuid&mail=".$mail);
		exit();
	}

	$sql = "SELECT * FROM users 
	WHERE (username = '$username' OR email = '$username')
	AND password = '$password' ";

	if ($conn->query($sql) === TRUE) { 
		echo "login sucessfully";
	} else {
		echo "Error: " .$sql. "<br>". $conn->error;
		}
$conn->close();
	}




?>