<?php

if (isset($_POST["save-message"])) {
	
	require "dbh.inc.php";

	$message = $_POST["message"];