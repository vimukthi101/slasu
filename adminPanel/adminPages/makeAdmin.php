<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['id'])){
            $adminId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
            $query = "UPDATE `admin` SET `role`='admin' WHERE adminId=".$adminId;
            if(mysqli_query($con, $query)){ 
                header('Location:admin.php?er=us');
            } else {
                header('Location:admin.php?er=er');
            }
        } else {
            header('Location:admin.php');
        }
    } else {
        header('Location:admin.php');    
    }
?>