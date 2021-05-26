<?php
	include_once('db.php');
    include_once('smtpSettings.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['conditions'])){
            $password = rand(100000, 999999);
            $getCard = "SELECT * FROM club WHERE operatorMobile='".$_SESSION["phone"]."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) == 0){
                if($_SESSION["optradio"] == "School"){
                    $_SESSION["optradio"] = 1;
                } else {
                    $_SESSION["optradio"] = 2;
                }
                if($_SESSION["regRadio"] == "New"){
                    $_SESSION["regRadio"] = 1;
                } else {
                    $_SESSION["regRadio"] = 2;
                }
                if($_SESSION["category"] == "Swimming"){
                    $_SESSION["category"] = 1;
                } else if($_SESSION["category"] == "Water Polo") {
                    $_SESSION["category"] = 2;
                } else if($_SESSION["category"] == "High Diving") {
                    $_SESSION["category"] = 3;
                } else if($_SESSION["category"] == "Free Swimming") {
                    $_SESSION["category"] = 4;
                }
                $addCard = "INSERT INTO club (clubType,clubName,district,operatorName,operatorEmail,operatorMobile,operatorPassword,operatorWhatsapp,operatorNic,regType,requestLetter,affiliationCat,postalAddress,clubContactOne,clubContactTwo,clubEmailOne,clubEmailTwo,inchargeName,inchargeMobile,inchargeEmail) VALUES('".$_SESSION["optradio"]."','".$_SESSION["name"]."','".$_SESSION["district"]."','".$_SESSION["operatorName"]."','".$_SESSION["operatorEmail"]."','".$_SESSION["phone"]."','".$password."','".$_SESSION["whatsapp"]."','".$_SESSION["operatorNic"]."','".$_SESSION["regRadio"]."','".$_SESSION["requestLetter"]."','".$_SESSION["category"]."','".$_SESSION["clubAddress"]."','".$_SESSION["clubPhone1"]."','".$_SESSION["clubPhone2"]."','".$_SESSION["clubEmail1"]."','".$_SESSION["clubEmail2"]."','".$_SESSION["inchargeName"]."','".$_SESSION["inchargePhone"]."','".$_SESSION["inchargeEmail"]."')";

                    $to = $_SESSION["operatorEmail"];
                    $mail->addAddress($to, $to);
                    $mail->Subject = "Account Created Successfully at SLASU";
                    $mail->Body ="<h1>Your account was created successfully at Sri Lanka Aquatic Sports Union.</h1><br/>
                                <p>Use following credentails to login to the system.</p>
                                <p> Link : http://localhost:1234/slasu/login.html <br/>
                                <p> User Name : ".$_SESSION["phone"]."</P><br/>
                                <p> Password : ".$password."</P><br/><br/><br/>
                                <p>Please change your password after login to the system.</p><br/><br/><br/>
                                <p>Thank You</p><br/>
                                <p>Admin,</p><br/>
                                <p>SLASU</p>";
                    if (!$mail->send()) {
                        session_destroy();
                    header('Location:../club-registration.php?er=mf');
                    }
                if(mysqli_query($con, $addCard)){
                    //success
                    session_destroy();
                    header('Location:../club-registration.php?er=su');
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