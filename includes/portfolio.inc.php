<?php
session_start();
// var_dump($_POST);
// var_dump($_SESSION['userId']);
// die();
//mysqli connectivity, select database
$connect= new mysqli("localhost","root","","loginsystem") or die("ERROR:could not connect to the database!!!");


// extract($_POST);
if( isset($_POST['save']) && $_POST['save'] ){
	//store textarea values in <pre> tag
	$msg = $_POST["savedMessage"];
	//insert values in textarea table
	$query="UPDATE users SET textarea = '$msg' WHERE idUsers = ". $_SESSION['userId'];
	$connect->query($query);
	echo "Data saved";



}
//upload file
$target_dir = "Upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$target_file_name = uniqid().md5(basename($_FILES["fileToUpload"]["name"]) );
$target_dest = $target_dir . $target_file_name . ".".$imageFileType;

$uploadOk = 1;
// $rand = rand(0000,9999);
//$newfilename = round(microtime(true)) . '.' . end($target_file);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_dest)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dest)) {
        header("location: http://localhost/Login_system/portfolio.php?upload=success");
        $query_file = "UPDATE users SET fileName = '$target_dest' WHERE idUsers = ". $_SESSION['userId']; 
        $connect->query($query_file);
    } else {
        echo "Sorry, there was an error uploading your file.";
    } // todo(s): 1) upload the file name to the database. 2) php request database for filename and pull the exact file from server
}

?>