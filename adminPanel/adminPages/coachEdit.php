<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['phone1']) && !empty($_POST['nameForId']) && !empty($_POST['dob']) && !empty($_POST['address']) && !empty($_POST['nic'])){
            $su1 = 0;
            $su2 = 0;
            $su3 = 0;
            $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
            $gender = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['gender'])));
            if($gender == "Male"){
                $gender = 1;
            } else {
                $gender = 2;
            }
            $phone1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['phone1'])));
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
            $nameForId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nameForId'])));
            $dob = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['dob'])));
            $address = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['address'])));
            $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
            if(!empty($_POST['designation'])){
                $designation = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['designation'])));
            } else {
                $designation = "";
            }
            if(!empty($_POST['qualification'])){
                $qualification = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['qualification'])));
            } else {
                $qualification = "";
            }
            if(!empty($_POST['ppno'])){
                $ppno = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['ppno'])));
            } else {
                $ppno = "";
            }
            $allowTypes = array('jpg','png','jpeg'); 
            if(!empty($_FILES["photo"]["name"])){
                $fileNameBB = basename($_FILES["photo"]["name"]); 
                $fileTypeBB = pathinfo($fileNameBB, PATHINFO_EXTENSION);
                if(in_array($fileTypeBB, $allowTypes)){ 
                    $imageBB = $_FILES['photo']['tmp_name']; 
                    $imgContentBB = addslashes(file_get_contents($imageBB));
                    $query1 = "UPDATE `coach` SET `photoForId`='".$imgContentBB."' WHERE clubId=".$_SESSION["clubId"];
                    if(!mysqli_query($con, $query1)){
                        $su1 = 1;
                    }
                }else{ 
                    header('Location:coach.php?er=wi');
                } 
            }
            if(!empty($_FILES["nicPhoto"]["name"])){
                $fileNameNic = basename($_FILES["nicPhoto"]["name"]); 
                $fileTypeNic = pathinfo($fileNameNic, PATHINFO_EXTENSION);
                if(in_array($fileTypeNic, $allowTypes)){ 
                    $imageNic = $_FILES['nicPhoto']['tmp_name']; 
                    $imgContentNic = addslashes(file_get_contents($imageNic));
                    $query2 = "UPDATE `coach` SET `nicPhoto`='".$imgContentNic."' WHERE clubId=".$_SESSION["clubId"];
                    if(!mysqli_query($con, $query2)){
                        $su2 = 1;
                    }
                }else{ 
                    header('Location:coach.php?er=wi');
                } 
            }
            $query3 = "UPDATE `coach` SET `coachName`='".$name."',`gender`='".$gender."',`coachMobileOne`='".$phone1."',`coachMobileTwo`='".$phone2."',`coachWhatsapp`='".$whatsapp."',`coachEmail`='".$emailAd."',`coachNameForId`='".$nameForId."',`dob`='".$dob."',`homeAddress`='".$address."',`designation`='".$designation."',`nic`='".$nic."',`qualifications`='".$qualification."',`ppNo`='".$ppno."' WHERE clubId=".$_SESSION["clubId"];
            if(!mysqli_query($con, $query3)){ 
                $su3 = 1;
            } 
            if($su1 == 1 || $su2 == 1 || $su3 == 1){
                header('Location:coach.php?er=er');
            } else {
                header('Location:coach.php?er=us');
            }
        } else {
            header('Location:coach.php?er=1');
        }
    } else {
        header('Location:coach.php?er=2');    
    }
?>