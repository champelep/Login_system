<?php
if (isset($_POST["signup-submit"])) {
	
	require "dbh.inc.php";

	$username = $_POST["uid"];
	$email = $_POST["mail"];
	$password = $_POST["pwd"];
	$passwordRepeat = $_POST["pwd-repeat"];

	if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
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
	elseif (){


	}
}
