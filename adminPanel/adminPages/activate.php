<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['id'])){
            $id   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
            $updateEmployeeAll = "UPDATE `club` SET `status`='2' WHERE clubId=".$id;
            if(mysqli_query($con, $updateEmployeeAll)){ 
                header('Location:club.php?er=au');
            } else {
                header('Location:club.php?er=er');
            } 
        } else {
            header('Location:club.php');
        }
    } else {
        header('Location:club.php');    
    }
?>