<?php
$host = 'localhost';
$db = 'slasu';
$user = 'root';
$password = '';

//no errors will be shownz
//error_reporting(0);

//db connection creation
$con = mysqli_connect($host, $user, $password, $db);
if(!$con){
	header('Location:../505.php');
}
?>