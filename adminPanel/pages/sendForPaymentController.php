<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_SESSION["clubId"])){
	if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["money"]) && isset($_POST["submit"])){
		$money = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['money'])));
		if(!empty($_POST["notes"])){
			$notes = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['notes'])));
		}
		$list1 = implode(",",$_SESSION["athleteArray"]);
		$list2 = implode(",",$_SESSION["coachArray"]);
		if(!empty($_SESSION['enorollmentPayment'])){
			$enorollmentPayment = 1;
		} else {
			$enorollmentPayment = 0;
		}
		if(!empty($_SESSION['affiliationPayment'])){
			$affiliationPayment = 1;
		} else {
			$affiliationPayment = 0;
		}
		$query = "INSERT INTO `payment`(`clubId`, `amount`, `notes`, `athleteList`, `coachList`, `affiliationFeeStatus`, `enrollmentFeeStatus`) VALUES ('".$_SESSION["clubId"]."','".$money."','".$notes."','".$list1."','".$list2."', '".$affiliationPayment."', '".$enorollmentPayment."')";
		if(mysqli_query($con, $query)){
			$last_id = mysqli_insert_id($con);
			for($i=0;$i<count($_SESSION["athleteArray"]);$i++){
				$update = "UPDATE `athlete` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE athleteId='".$_SESSION["athleteArray"][$i]."'";
				mysqli_query($con, $update);
				$update2 = "UPDATE `coach` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE coachId='".$_SESSION["coachArray"][$i]."'";
				mysqli_query($con, $update2);
				$update3 = "UPDATE `club` SET `affiliationFeeStatus`='".$affiliationPayment."',`enrollmentFeeStatus`='".$enorollmentPayment."' WHERE clubId='".$_SESSION["clubId"]."'";
				mysqli_query($con, $update3);
				header('Location:payments.php?er=su');
			}
        } else {
            header('Location:athlete.php?er=er');
        }
	} else {
		header('Location:athlete.php?er=nd');
	}
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>