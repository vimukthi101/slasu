<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	include_once('../../php/db.php');
	if(isset($_SESSION['adminId'])){
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['athleteId'])){
			if(!empty($_POST['athleteId'])){
				$tId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['athleteId'])));
				$comment = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['comment'])));
				if(!empty($_POST['chequeNo'])){
					$chequeNo = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['chequeNo'])));
				} else {
					$chequeNo = "";
				}
				if(!empty($_POST['paymentMode'])){
					$paymentMode = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['paymentMode'])));
				} else {
					$paymentMode = "";
				}
				$deletett = "UPDATE `payment` SET `status`='3',`chequeNo`='".$chequeNo."',`paymentMode`='".$paymentMode."',`adminComment`='".$comment."' WHERE paymentId=".$tId;
				$deleteat = "UPDATE `athlete` SET `paymentStatus`='3' WHERE paymentRef=".$tId;
				$deletect = "UPDATE `coach` SET `paymentStatus`='3' WHERE paymentRef=".$tId;
				if(mysqli_query($con, $deletett) && mysqli_query($con, $deleteat) && mysqli_query($con, $deletect)){
					header('Location:payments.php?er=su');
				} else {
					//query failed
					header('Location:payments.php?er=er');
				}
			} else {
				//empty fields redirect to cards
				header('Location:payments.php');
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