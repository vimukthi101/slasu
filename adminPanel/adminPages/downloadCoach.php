<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $getCard = "SELECT coachCode,application FROM coach WHERE coachId='".$id."'";
    $resultCard = mysqli_query($con, $getCard);
    if(mysqli_num_rows($resultCard) != 0){
        while($row = mysqli_fetch_array($resultCard)){
            $clubCode = $row['coachCode'];
            $clubIdCode = $clubCode.$id;
            $requestLetter = $row['application'];
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=CoachApplication-".$clubIdCode.".pdf");
            echo $requestLetter;
        }
    }
} else {
    header('Location:coach.php');
}
?>