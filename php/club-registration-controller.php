<?php
	include_once('db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['conditions'])){
            $password = rand(100000, 999999);
            $getCard = "SELECT * FROM club WHERE operatorMobile='".$_SESSION["phone"]."' OR clubName='".$_SESSION["name"]."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) == 0){
                if($_SESSION["optradio"] == "School"){
                    $_SESSION["optradio"] = 1;
                    $_SESSION["clubCode"] = "SLASU/S/00";
                } else {
                    $_SESSION["optradio"] = 2;
                    $_SESSION["clubCode"] = "SLASU/CL/00";
                }
                if($_SESSION["regRadio"] == "New"){
                    $_SESSION["regRadio"] = 1;
                    $regAmount = 10000;
                } else {
                    $_SESSION["regRadio"] = 2;
                    $regAmount = 0;
                }
                if($_SESSION["category"] == "Ordinary Member (Colombo District)"){
                    $_SESSION["category"] = 1;
                    $affAmount = 15000;
                } else if($_SESSION["category"] == "Ordinary Member (Other Districts)") {
                    $_SESSION["category"] = 2;
                    $affAmount = 8000;
                } else if($_SESSION["category"] == "Novice Members") {
                    $_SESSION["category"] = 3;
                    $affAmount = 6000;
                } else if($_SESSION["category"] == "Participant Members (Govt./ Semi Govt. Schools)") {
                    $_SESSION["category"] = 4;
                    $affAmount = 4000;
                } else if($_SESSION["category"] == "Participant Members (International Schools and Ancillary Clubs)") {
                    $_SESSION["category"] = 5;
                    $affAmount = 7500;
                }
                $totalAmount = $regAmount + $affAmount;
                $addCard = "INSERT INTO club (clubCode,clubType,clubName,district,operatorName,operatorEmail,operatorMobile,operatorPassword,operatorWhatsapp,operatorNic,regType,requestLetter,affiliationCat,postalAddress,clubContactOne,clubContactTwo,clubEmailOne,clubEmailTwo,inchargeName,inchargeMobile,inchargeEmail) VALUES('".$_SESSION["clubCode"]."','".$_SESSION["optradio"]."','".$_SESSION["name"]."','".$_SESSION["district"]."','".$_SESSION["operatorName"]."','".$_SESSION["operatorEmail"]."','".$_SESSION["phone"]."','".$password."','".$_SESSION["whatsapp"]."','".$_SESSION["operatorNic"]."','".$_SESSION["regRadio"]."','".$_SESSION["requestLetter"]."','".$_SESSION["category"]."','".$_SESSION["clubAddress"]."','".$_SESSION["clubPhone1"]."','".$_SESSION["clubPhone2"]."','".$_SESSION["clubEmail1"]."','".$_SESSION["clubEmail2"]."','".$_SESSION["inchargeName"]."','".$_SESSION["inchargePhone"]."','".$_SESSION["inchargeEmail"]."')";
                if(mysqli_query($con, $addCard)){
                    //success
                    $from = "info@thestory.host";
                    $headers = "From:" . $from;
                    $to = $_SESSION["operatorEmail"];
                    $subject = $_SESSION["name"]." - Account Created Successfully at SLASU";
$message = "Hi ".$_SESSION["operatorName"].",

Your account was created successfully at Sri Lanka Aquatic Sports Union.

You'll be able to login to the system once the account is activated by the admin. Please use following credentails to login to the system once approved.

Club Name : ".$_SESSION["name"]."

Link : https://www.aquatics.lk/login.php
User Name : ".$_SESSION["phone"]."
Password : ".$password."

Payment Information

Total to pay : ".$totalAmount."
Bank Account Details :  
Name of the bank - Peoples Bank, Duke street branch
Account Name - Sri Lanka Aquatic Sports Union (SLASU)
Account number - 001100120003449

Please change your password after login to the system.

Thank You
Admin,
SLASU";
                    if (mail($to, $subject, $message, $headers)){
                        session_destroy();
                        header('Location:../club-registration.php?er=su');
                    } else {
                        session_destroy();
                        header('Location:../club-registration.php?er=mf');
                    }
                } else {
                    //query failed
                    session_destroy();
                    header('Location:../club-registration.php?er=qf');
                }
            } else {
                //card exists
                session_destroy();
                header('Location:../club-registration.php?er=ce');
            }
        } else {
            //empty fields redirect to cards
            session_destroy();
            header('Location:../club-registration.php?er=em');
        }
    } else {
        //if submit button is not clicked
        session_destroy();
        header('Location:../register.html');	
    }
?>