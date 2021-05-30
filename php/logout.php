<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	session_unset();
	session_destroy();
	//redirect to login page after logout
	header('Location:../login.php');
?>