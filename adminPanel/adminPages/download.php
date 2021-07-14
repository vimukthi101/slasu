<?php
include_once('../../php/db.php');
if(!isset($_SESSION[''])){
    session_start();
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $getCard = "SELECT clubCode,requestLetter FROM club WHERE clubId='".$id."'";
    $resultCard = mysqli_query($con, $getCard);
    if(mysqli_num_rows($resultCard) != 0){
        while($row = mysqli_fetch_array($resultCard)){
            $clubCode = $row['clubCode'];
            $clubIdCode = $clubCode.$id;
            $requestLetter = $row['requestLetter'];
            header("Content-type: application/pdf");
            header("Content-Disposition: attachment; filename=ClubApplication-".$clubIdCode.".pdf");
            echo $requestLetter;
        }
    }
} else {
    header('Location:club.php');
}
?>