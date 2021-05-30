<?php
	include_once('db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['conditions'])){
            $getCard = "SELECT * FROM coach WHERE nic='".$_SESSION["nic"]."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) == 0){
                if($_SESSION["optradio"] == "School"){
                    $_SESSION["optradio"] = 1;
                } else {
                    $_SESSION["optradio"] = 2;
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
                if($_SESSION["gender"] == "Male"){
                    $_SESSION["gender"] = 1;
                } else {
                    $_SESSION["gender"] = 2;
                }
                $addCard = "INSERT INTO coach (regType,clubId,affiliationCat,coachName,gender,coachMobileOne,coachMobileTwo,coachWhatsapp,coachEmail,coachNameForId,photoForId,application,dob,homeAddress,designation,nic,nicPhoto,qualifications,ppNo) VALUES('".$_SESSION["optradio"]."','".$_SESSION["clubList"]."','".$_SESSION["category"]."','".$_SESSION["name"]."','".$_SESSION["gender"]."','".$_SESSION["phone1"]."','".$_SESSION["phone2"]."','".$_SESSION["whatsapp"]."','".$_SESSION["emailAd"]."','".$_SESSION["nameForId"]."','".$_SESSION["photo"]."','".$_SESSION["application"]."','".$_SESSION["dob"]."','".$_SESSION["address"]."','".$_SESSION["designation"]."','".$_SESSION["nic"]."','".$_SESSION["nicPhoto"]."','".$_SESSION["qualification"]."','".$_SESSION["ppno"]."')";
                if(mysqli_query($con, $addCard)){
                    //success
                    session_destroy();
                    header('Location:../coach-registration.php?er=su');
                } else {
                    //query failed
                    session_destroy();
                    header('Location:../coach-registration.php?er=qf');
                }
            } else {
                //card exists
                session_destroy();
                header('Location:../coach-registration.php?er=ce');
            }
        } else {
            //empty fields redirect to cards
            session_destroy();
            header('Location:../coach-registration.php?er=em');
        }
    } else {
        //if submit button is not clicked
        session_destroy();
        header('Location:../register.html');	
    }
?>