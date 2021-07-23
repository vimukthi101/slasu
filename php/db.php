<?php
$host = 'localhost';
$db = 'u527331572_slasu';
$user = 'u527331572_slasu';
$password = 'Root123slasu';

//no errors will be shown
//error_reporting(0);

//db connection creation
$con = mysqli_connect($host, $user, $password, $db);
if(!$con){
	header('Location:../505.php');
}
?>
