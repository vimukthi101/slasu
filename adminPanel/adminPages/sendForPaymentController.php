<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_SESSION["adminId"])){
	if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["money"]) && isset($_POST["submit"]) && !empty($_SESSION["athleteArray"])){
		$money = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['money'])));
		if(!empty($_POST["notes"])){
			$notes = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['notes'])));
		} else {
			$notes = "";
		}
		$list1 = implode(",",$_SESSION["athleteArray"]);
		$query = "INSERT INTO `payment`(`amount`, `notes`, `athleteList`) VALUES ('".$money."','".$notes."','".$list1."')";
		if(mysqli_query($con, $query)){
			$last_id = mysqli_insert_id($con);
			if(isset($_SESSION["athleteArray"])){
				for($i=0;$i<count($_SESSION["athleteArray"]);$i++){
					$update = "UPDATE `athlete` SET `paymentStatus`='1',`paymentRef`='".$last_id."' WHERE athleteId='".$_SESSION["athleteArray"][$i]."'";
					mysqli_query($con, $update);
				}
				header('Location:payments.php?er=su');
			} else {
				unset($_SESSION['athleteArray']);
				header('Location:payments.php?er=su');
			}
        } else {
            header('Location:payments.php?er=er');
        }
	} else {
		header('Location:sendPayments.php?er=nd');
	}
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>