<?php
	include_once('db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['conditions'])){
            if($optradio == "Unattached"){
                $clubId = 0;
            } else {
                $getClubName = "SELECT clubId from club WHERE clubName='".$_SESSION["clubList"]."'";
                $coachR = mysqli_query($con, $getClubName);
                $rowCount = mysqli_num_rows($coachR);
                if($rowCount != 0){
                    while($rowR = mysqli_fetch_array($coachR)){
                        $clubId = $rowR['clubId'];
                    }
                } else {
                    //query failed
                    session_destroy();
                    header('Location:../athlete-registration.php?er=qf');
                }
            }
            $getCard = "SELECT * FROM athlete WHERE clubId='".$clubId."' and phone1='".$_SESSION["phone1"]."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) == 0){
                if($_SESSION["optradio"] == "School"){
                    $_SESSION["optradio"] = 1;
                } else if ($_SESSION["optradio"] == "Club"){
                    $_SESSION["optradio"] = 2;
                } else {
                    $_SESSION["optradio"] = 3;
                }
                if($_SESSION["category"] == "Swimming"){
                    $_SESSION["category"] = 1;
                } else if($_SESSION["category"] == "Artistic Swimming") {
                    $_SESSION["category"] = 2;
                } else if($_SESSION["category"] == "Water Polo") {
                    $_SESSION["category"] = 3;
                } else if($_SESSION["category"] == "Diving") {
                    $_SESSION["category"] = 4;
                }
                if($_SESSION["gender"] == "Male"){
                    $_SESSION["gender"] = 1;
                } else {
                    $_SESSION["gender"] = 2;
                }
                $addCard = "INSERT INTO athlete (regType,clubId,affiliationCat,athleteName,gender,dob,address,phone1,phone2,whatsapp,email,nameForCert,bbNo,bbDistrict,bbDate,bbPhoto,postalId,nic,ppNo) VALUES('".$_SESSION["optradio"]."','".$clubId."','".$_SESSION["category"]."','".$_SESSION["name"]."','".$_SESSION["gender"]."','".$_SESSION["dob"]."','".$_SESSION["postal"]."','".$_SESSION["phone1"]."','".$_SESSION["phone2"]."','".$_SESSION["whatsapp"]."','".$_SESSION["emailAd"]."','".$_SESSION["nameForId"]."','".$_SESSION["bbno"]."','".$_SESSION["district"]."','".$_SESSION["bbdate"]."','".$_SESSION["bbPhoto"]."','".$_SESSION["postalId"]."','".$_SESSION["nic"]."','".$_SESSION["ppno"]."')";
                if(mysqli_query($con, $addCard)){
                    //success
                    session_destroy();
                    header('Location:../athlete-registration.php?er=su');
                } else {
                    //query failed
                    session_destroy();
                    header('Location:../athlete-registration.php?er=qf');
                }
            } else {
                //card exists
                session_destroy();
                header('Location:../athlete-registration.php?er=ce');
            }
        } else {
            //empty fields redirect to cards
            session_destroy();
            header('Location:../athlete-registration.php?er=em');
        }
    } else {
        //if submit button is not clicked
        session_destroy();
        header('Location:../register.html');	
    }
?>