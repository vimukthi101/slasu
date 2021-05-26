<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['optradio']) && !empty($_POST['name']) && !empty($_POST['district']) && !empty($_POST['operatorName']) && !empty($_POST['operatorEmail']) && !empty($_POST['phone']) && !empty($_POST['operatorNic']) && !empty($_POST['regRadio']) && !empty($_POST['category']) && !empty($_POST['clubAddress']) && !empty($_POST['clubPhone1']) && !empty($_POST['inchargeName']) && !empty($_POST['inchargePhone'])){
                $optradio   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['optradio'])));
                $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
                $district = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['district'])));
                $operatorName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorName'])));
                $operatorEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorEmail'])));
                $phone = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['phone'])));
                if(!empty($_POST['whatsapp'])){
                    $whatsapp = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['whatsapp'])));
                } else {
                    $whatsapp = "";
                }
                $operatorNic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['operatorNic'])));
                $regRadio = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['regRadio'])));
                if(!empty($_POST['requestLetter'])){
                    $requestLetter = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['requestLetter'])));
                } else {
                    $requestLetter = "";
                }
                $category = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['category'])));
                $clubAddress = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubAddress'])));
                $clubPhone1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone1'])));
                if(!empty($_POST['clubPhone2'])){
                    $clubPhone2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['clubPhone2'])));
                } else {
                    $clubPhone2 = "";
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
                $inchargeName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeName'])));
                $inchargePhone = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargePhone'])));
                if(!empty($_POST['inchargeEmail'])){
                    $inchargeEmail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['inchargeEmail'])));
                } else {
                    $inchargeEmail = "";
                }
                echo 'hello';
        } else {
            //empty fields
            header('Location:../club-registration.html?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:register.html');	
    }
?>