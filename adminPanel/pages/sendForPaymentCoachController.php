<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_SESSION["clubId"])){
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["athleteArray"]) && !empty($_POST["money"]) && isset($_POST["submit"])){
		$money = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['money'])));
		if(!empty($_POST["notes"])){
			$notes = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['notes'])));
		}
		$list = implode(",",$_SESSION["athleteArray"]);
		$query = "INSERT INTO `payment`(`clubId`, `amount`, `notes`, `athleteList`, `paymentType`) VALUES ('".$_SESSION["clubId"]."','".$money."','".$notes."','".$list."','2')";
		if(mysqli_query($con, $query)){
			$last_id = mysqli_insert_id($con);
			for($i=0;$i<count($_SESSION["athleteArray"]);$i++){
				$update = "UPDATE `coach` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE coachId='".$_SESSION["athleteArray"][$i]."'";
				mysqli_query($con, $update);
				header('Location:payments.php?er=su');
			}
        } else {
            header('Location:coach.php?er=er');
        }
	} else {
		header('Location:coach.php?er=nd');
	}
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>