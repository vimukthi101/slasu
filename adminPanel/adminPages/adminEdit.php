<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['firstName']) && !empty($_POST['nic']) && !empty($_POST['email']) && !empty($_POST['athleteId'])){
            $firstName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['firstName'])));
            if(!empty($_POST['secondName'])){
                $secondName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['secondName'])));
            } else {
                $secondName = "";
            }
            if(!empty($_POST['mobile'])){
                $mobile = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['mobile'])));
            } else {
                $mobile = "";
            }
            $email = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['email'])));
            $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
            $athleteId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['athleteId'])));
            $query = "UPDATE `admin` SET `firstName`='".$firstName."',`secondName`='".$secondName."',`mobile`='".$mobile."',`email`='".$email."',`nic`='".$nic."' WHERE adminId=".$athleteId;
            if(mysqli_query($con, $query)){ 
                header('Location:admin.php?er=us');
            } else {
                header('Location:admin.php?er=er');
            }
        } else {
            header('Location:admin.php');
        }
    } else {
        header('Location:admin.php');    
    }
?>