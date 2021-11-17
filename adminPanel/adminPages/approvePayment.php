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
				$chequeNo = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['chequeNo'])));
				$paymentMode = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['paymentMode'])));
				$deletett = "UPDATE `payment` SET `status`='2',`chequeNo`='".$chequeNo."',`paymentMode`='".$paymentMode."',`adminComment`='".$comment."' WHERE paymentId=".$tId;
				$deleteat = "UPDATE `athlete` SET `paymentStatus`='2' WHERE paymentRef=".$tId;
				$deletect = "UPDATE `coach` SET `paymentStatus`='2' WHERE paymentRef=".$tId;
				$query = 'SELECT * FROM `payment` WHERE paymentId='.$tId;
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) != 0){
			  		while($row = mysqli_fetch_array($result)){
			    		$affiliationFeeStatus = $row['affiliationFeeStatus'];
			    		$enrollmentFeeStatus = $row['enrollmentFeeStatus'];
			    		$clubId = $row['clubId'];
					}
				}
				if($affiliationFeeStatus == 1 && $enrollmentFeeStatus == 0){
					$updateClub = "UPDATE `club` SET `affiliationFeeStatus`='2' WHERE clubId=".$clubId;
				} else if($affiliationFeeStatus == 0 && $enrollmentFeeStatus == 1){
					$updateClub = "UPDATE `club` SET `enrollmentFeeStatus`='2' WHERE clubId=".$clubId;
				} else if($affiliationFeeStatus == 1 && $enrollmentFeeStatus == 1){
					$updateClub = "UPDATE `club` SET `affiliationFeeStatus`='2',`enrollmentFeeStatus`='2' WHERE clubId=".$clubId;
				} else if($affiliationFeeStatus == 0 && $enrollmentFeeStatus == 0){
					$updateClub = "SELECT 1 FROM DUAL WHERE false";
				}
				if(mysqli_query($con, $deletett) && mysqli_query($con, $deleteat) && mysqli_query($con, $deletect) && mysqli_query($con, $updateClub)){
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