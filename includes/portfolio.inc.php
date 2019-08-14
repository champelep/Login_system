<?php
session_start();
// var_dump($_POST);
// var_dump($_SESSION['userId']);
// die();
//mysqli connectivity, select database
$connect= new mysqli("localhost","root","","loginsystem") or die("ERROR:could not connect to the database!!!");

//extract all html field
// extract($_POST);
if( isset($_POST['save']) && $_POST['save'] ){
	//store textarea values in <pre> tag
	$msg = $_POST["savedMessage"];
	//insert values in textarea table
	$query="UPDATE users SET textarea = '$msg' WHERE idUsers = ". $_SESSION['userId'];
	$connect->query($query);
	echo "Data saved";

}

?>