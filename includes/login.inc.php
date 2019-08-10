<?php

if(isset($_POST['login-submit'])) {

	require(dbh.inc.php);

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if(empty($mailuid) || empty($password)){
		header("location: ../index.php?error=emptymailuidorpassword");
		exit();
	}
	else {
		$sql = "SELECT *  FROM users WHERE uidUsers=? || emailUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../index.php?error=sqlerror");
			exit();		
		}
		else {
			mysqli_stmt_bind_param($stmt,"ss", $mailuid, $password);
			mysqli_stmt_execute($stmt);
		}
	}
}
else {
	header("location: ../index.php");
	exit();
}