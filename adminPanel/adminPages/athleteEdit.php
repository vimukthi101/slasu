<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['phone1']) && !empty($_POST['nameForId']) && !empty($_POST['bbno']) && !empty($_POST['dob']) && !empty($_POST['postal']) && !empty($_POST['district']) && !empty($_POST['bbdate'])){
            $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
            $gender = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['gender'])));
            if($gender == "Male"){
                $gender = 1;
            } else {
                $gender = 2;
            }
            $phone1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['phone1'])));
            $nameForId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nameForId'])));
            $bbno = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['bbno'])));
            $dob = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['dob'])));
            $postal = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['postal'])));
            $district = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['district'])));
            $bbdate = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['bbdate'])));
            if(!empty($_POST['phone2'])){
                $phone2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['phone2'])));
            } else {
                $phone2 = "";
            }
            if(!empty($_POST['whatsapp'])){
                $whatsapp = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['whatsapp'])));
            } else {
                $whatsapp = "";
            }
            if(!empty($_POST['emailAd'])){
                $emailAd = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['emailAd'])));
            } else {
                $emailAd = "";
            }
            if(!empty($_POST['postalId'])){
                $postalId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['postalId'])));
            } else {
                $postalId = "";
            }
            if(!empty($_POST['nic'])){
                $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
            } else {
                $nic = "";
            }
            if(!empty($_POST['ppno'])){
                $ppno = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['ppno'])));
            } else {
                $ppno = "";
            }
            if(!empty($_FILES["bbPhoto"]["name"])){
                $fileName = basename($_FILES["bbPhoto"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                $allowTypes = array('jpg','png','jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['bbPhoto']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image));
                    $query = "UPDATE `athlete` SET `athleteName`='".$name."',`gender`='".$gender."',`dob`='".$dob."',`address`='".$postal."',`phone1`='".$phone1."',`phone2`='".$phone2."',`whatsapp`='".$whatsapp."',`email`='".$emailAd."',`nameForCert`='".$nameForId."',`bbNo`='".$bbno."',`bbDistrict`='".$district."',`bbDate`='".$bbdate."',`bbPhoto`='".$imgContent."',`postalId`='".$postalId."',`nic`='".$nic."',`ppNo`='".$ppno."' WHERE clubId=".$_SESSION["clubId"];
                }else{ 
                    header('Location:athlete.php?er=wi');
                } 
            } else {
                $query = "UPDATE `athlete` SET `athleteName`='".$name."',`gender`='".$gender."',`dob`='".$dob."',`address`='".$postal."',`phone1`='".$phone1."',`phone2`='".$phone2."',`whatsapp`='".$whatsapp."',`email`='".$emailAd."',`nameForCert`='".$nameForId."',`bbNo`='".$bbno."',`bbDistrict`='".$district."',`bbDate`='".$bbdate."',`postalId`='".$postalId."',`nic`='".$nic."',`ppNo`='".$ppno."' WHERE clubId=".$_SESSION["clubId"];
            }
            if(mysqli_query($con, $query)){ 
                header('Location:athlete.php?er=us');
            } else {
                header('Location:athlete.php?er=er');
            }
        } else {
            header('Location:athlete.php');
        }
    } else {
        header('Location:athlete.php');    
    }
?>