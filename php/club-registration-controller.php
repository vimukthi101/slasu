<?php
	//errors will not be shown
	//error_reporting(0);
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['optradio']) && !empty($_POST['name']) && !empty($_POST['district']) && !empty($_POST['operatorName']) && !empty($_POST['operatorEmail']) && !empty($_POST['phone']) && !empty($_POST['operatorNic']) && !empty($_POST['regRadio']) && !empty($_POST['category']) && !empty($_POST['clubAddress']) && !empty($_POST['clubPhone1']) && !empty($_POST['inchargeName']) && !empty($_POST['inchargePhone'])){
            if(preg_match('/[A-Za-z]+/',$_POST['name']) && preg_match('/[A-Za-z]+/',$_POST['operatorName']) && preg_match('^(?:19|20)?\d{2}[0-9]{10}|[0-9]{9}[x|X|v|V]$',$_POST['operatorNic']) && preg_match('/[A-Za-z]+/',$_POST['inchargeName'])){
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
                $password = rand(100000, 999999);
                $getCard = "SELECT * FROM club WHERE operatorMobile='".$phone."'";
                $resultCard = mysqli_query($con, $getCard);
                if(mysqli_num_rows($resultCard) == 0){
                    $addCard = "INSERT INTO club (clubType,clubName,district,operatorName,operatorEmail,operatorMobile,operatorPassword,operatorWhatsapp,operatorNic,regType,requestLetter,affiliationCat,postalAddress,clubContactOne,clubContactTwo,clubEmailOne,clubEmailTwo,inchargeName,inchargeMobile,inchargeEmail) VALUES('".$optradio."','".$name."','".$district."','".$operatorName."','".$operatorEmail."','".$phone."','".$password."','".$whatsapp."','".$operatorNic."','".$regRadio."','".$requestLetter."','".$category."','".$clubAddress."','".$clubPhone1."','".$clubPhone2."','".$clubEmail1."','".$clubEmail2."','".$inchargeName."','".$inchargePhone."','".$inchargeEmail."')";
                    if(mysqli_query($con, $addCard)){
                        //success
                        header('Location:club-registration.html?er=su');
                    } else {
                        //query failed
                        header('Location:club-registration.html?er=qf');
                    }
                } else {
                    //card exists
                    header('Location:club-registration.html?er=ce');
                }   
            } else {
                //wrong card number format
                header('Location:club-registration.html?er=wf');
            }
        } else {
            //empty fields redirect to cards
            header('Location:club-registration.html?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:register.html');	
    }
?>