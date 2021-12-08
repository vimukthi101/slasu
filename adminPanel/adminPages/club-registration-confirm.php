<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['clubId']) && !empty($_POST['status']) && !empty($_POST['category']) && !empty($_POST['district']) && !empty($_POST['clubAddress']) && !empty($_POST['clubPhone1']) && !empty($_POST['operatorName']) && !empty($_POST['oMobile']) && !empty($_POST['operatorEmail']) && !empty($_POST['operatorNic']) && !empty($_POST['inchargeName']) && !empty($_POST['inchargePhone'])){
            $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
            $clubId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubId'])));
            $status = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['status'])));
            if($status == "Inactive"){
                $status = 1;
            } else if($status == "Active") {
                $status = 2;
            }  else if($status == "Disabled") {
                $status = 3;
            }
            $category = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['category'])));
            if($category == "Ordinary Member (Colombo District)"){
                $category = 1;
            } else if($category == "Ordinary Member (Other Districts)") {
                $category = 2;
            } else if($category == "Novice Members") {
                $category = 3;
            } else if($category == "Participant Members (Govt./ Semi Govt. Schools)") {
                $category = 4;
            } else if($category == "Participant Members (International Schools and Ancillary Clubs)") {
                $category = 5;
            }
            $district = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['district'])));
            $clubPhone1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone1'])));
            $operatorName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorName'])));
            $oMobile = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['oMobile'])));
            $operatorEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorEmail'])));
            $operatorNic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorNic'])));
            $inchargeName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeName'])));
            $inchargePhone = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargePhone'])));
            if(!empty($_POST['clubPhone2'])){
                $clubPhone2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone2'])));
            } else {
                $clubPhone2 = "";
            }
            if(!empty($_POST['clubAddress'])){
                $clubAddress = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubAddress'])));
            } else {
                $clubAddress = "";
            }
            if(!empty($_POST['clubEmail1'])){
                $clubEmail1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubEmail1'])));
            } else {
                $clubEmail1 = "";
            }
            if(!empty($_POST['clubEmail2'])){
                $clubEmail2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubEmail2'])));
            } else {
                $clubEmail2 = "";
            }
            if(!empty($_POST['whatsapp'])){
                $whatsapp = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['whatsapp'])));
            } else {
                $whatsapp = "";
            }
            if(!empty($_POST['inchargeEmail'])){
                $inchargeEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeEmail'])));
            } else {
                $inchargeEmail = "";
            }
            if(!empty($_FILES["application"]["name"])){
                $fileName = $_FILES['application']['name'];
                $tmpName  = $_FILES['application']['tmp_name'];
                $fileType = $_FILES['application']['type'];
                $allowTypes = array('application/pdf'); 
                if(in_array($fileType, $allowTypes)){ 
                    $fp = fopen($tmpName, 'r');
                    $content = fread($fp, filesize($tmpName));
                    $applicationContent = addslashes($content);
                    fclose($fp);
                    $query = "UPDATE `club` SET `clubName`='".$name."',`status`='".$status."',`affiliationCat`='".$category."',`district`='".$district."',`postalAddress`='".$clubAddress."',`clubContactOne`='".$clubPhone1."',`clubContactTwo`='".$clubPhone2."',`clubEmailOne`='".$clubEmail1."',`clubEmailTwo`='".$clubEmail2."',`operatorName`='".$operatorName."',`operatorMobile`='".$oMobile."',`operatorEmail`='".$operatorEmail."',`operatorWhatsapp`='".$whatsapp."',`operatorNic`='".$operatorNic."',`inchargeName`='".$inchargeName."',`inchargeMobile`='".$inchargePhone."',`inchargeEmail`='".$inchargeEmail."',`requestLetter`='".$applicationContent."' WHERE clubId=".$clubId;
                }else{ 
                    header('Location:club.php?er=wi');
                } 
            } else {
                $query = "UPDATE `club` SET `clubName`='".$name."',`status`='".$status."',`affiliationCat`='".$category."',`district`='".$district."',`postalAddress`='".$clubAddress."',`clubContactOne`='".$clubPhone1."',`clubContactTwo`='".$clubPhone2."',`clubEmailOne`='".$clubEmail1."',`clubEmailTwo`='".$clubEmail2."',`operatorName`='".$operatorName."',`operatorMobile`='".$oMobile."',`operatorEmail`='".$operatorEmail."',`operatorWhatsapp`='".$whatsapp."',`operatorNic`='".$operatorNic."',`inchargeName`='".$inchargeName."',`inchargeMobile`='".$inchargePhone."',`inchargeEmail`='".$inchargeEmail."' WHERE clubId=".$clubId;
            }
            $getCard = "SELECT * FROM club WHERE clubId='".$clubId."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
                while($row = mysqli_fetch_array($resultCard)){
                    $operatorPassword = $row['operatorPassword'];
                    $operatorMobileNum = $row['operatorMobile'];
                }
            }
            if(mysqli_query($con, $query)){      
                if($operatorMobileNum != $oMobile){
                    //success
                    $from = "info@aquatics.lk";
                    $headers = "From:" . $from;
                    $to = $operatorEmail;
                    $subject = $name." - Account Updated Successfully at SLASU";
$message = "Hi ".$operatorName.",

Your account was updated successfully at Sri Lanka Aquatic Sports Union by an Admin.

You'll be able to login to the system once the account is activated by the admin. Please use following credentails to login to the system.

Club Name : ".$name."

Link : https://www.aquatics.lk/login.php
User Name : ".$oMobile."
Password : ".$operatorPassword."

Thank You
Admin,
SLASU";
                    if (mail($to, $subject, $message, $headers)){
                        header('Location:club.php?er=us');
                    } else {
                        header('Location:club.php?er=er');
                    }
                } else {
                    header('Location:club.php?er=us');
                }
            } else {
                header('Location:club.php?er=er');
            }
        } else {
            header('Location:club.php?er=2');
        }
    } else {
        header('Location:club.php');    
    }
?>