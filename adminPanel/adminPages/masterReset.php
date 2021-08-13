<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	include_once('../../php/db.php');
	if(isset($_SESSION['adminId'])){
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
			$deletett = "UPDATE `payment` SET `status`='4'";
			$deleteat = "UPDATE `athlete` SET `paymentStatus`='4', paymentRef='SLASU/P/00'";
			$deleteco = "UPDATE `coach` SET `paymentStatus`='4', paymentRef='SLASU/P/00'";
			$deletecl = "UPDATE `club` SET `affiliationFeeStatus`='4', regType='2'";
			if(mysqli_query($con, $deletett) && mysqli_query($con, $deleteat) && mysqli_query($con, $deleteco) && mysqli_query($con, $deletecl)){
				header('Location:payments.php?er=msu');
			} else {
				//query failed
				header('Location:payments.php?er=er');
			}
		} else {
			//redirect to form not submit 404
			header('Location:payments.php');	
		}
	} else {
		//error page 404
		header('Location:payments.php');
	}	
?>
