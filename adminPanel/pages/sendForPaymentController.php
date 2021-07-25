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
		} else {
			$notes = "";
		}
		if(isset($_SESSION["athleteArray"])){
			$list1 = implode(",",$_SESSION["athleteArray"]);
		} else {
			$list1 = "";
		}
		if(isset($_SESSION["coachArray"])){
			$list2 = implode(",",$_SESSION["coachArray"]);
		} else {
			$list2 = "";
		}
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
			if(isset($_SESSION["athleteArray"])){
				for($i=0;$i<count($_SESSION["athleteArray"]);$i++){
					$update = "UPDATE `athlete` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE athleteId='".$_SESSION["athleteArray"][$i]."'";
					mysqli_query($con, $update);
				}
			}
			if(isset($_SESSION["coachArray"])){
				for($i2=0;$i2<count($_SESSION["coachArray"]);$i2++){
					$update2 = "UPDATE `coach` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE coachId='".$_SESSION["coachArray"][$i2]."'";
					mysqli_query($con, $update2);
				}
			}
			if($enorollmentPayment == 1 && $affiliationPayment == 1) {
				$update3 = "UPDATE `club` SET `enrollmentFeeStatus`='".$enorollmentPayment."', `affiliationFeeStatus`='".$affiliationPayment."' WHERE clubId='".$_SESSION["clubId"]."'";
				unset($_SESSION['affiliationPayment']);
				unset($_SESSION['enorollmentPayment']);
				unset($_SESSION['athleteArray']);	
				unset($_SESSION['coachArray']);
				if(mysqli_query($con, $update3)){
					header('Location:payments.php?er=su');
				} else {
					header('Location:payments.php?er=er');
				}
			} else {
				unset($_SESSION['affiliationPayment']);
				unset($_SESSION['enorollmentPayment']);
				unset($_SESSION['athleteArray']);	
				unset($_SESSION['coachArray']);
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