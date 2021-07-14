<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $getCard = "SELECT athleteCode,bbPhoto FROM athlete WHERE athleteId='".$id."'";
    $resultCard = mysqli_query($con, $getCard);
    if(mysqli_num_rows($resultCard) != 0){
        while($row = mysqli_fetch_array($resultCard)){
            $clubCode = $row['athleteCode'];
            $clubIdCode = $clubCode.$id;
            $requestLetter = $row['bbPhoto'];
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=AthleteApplication-".$clubIdCode.".pdf");
            echo $requestLetter;
        }
    }
} else {
    header('Location:athlete.php');
}
?>