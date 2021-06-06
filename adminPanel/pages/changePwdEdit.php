<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['pwd']) && !empty($_POST['cpwd'])){
            $pwd   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['pwd'])));
            $cpwd = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['cpwd'])));
            if(strcmp($pwd, $cpwd) == 0){
                $updateEmployeeAll = "UPDATE `club` SET `operatorPassword`='".$pwd."' WHERE clubId=".$_SESSION["clubId"];
                if(mysqli_query($con, $updateEmployeeAll)){ 
                    header('Location:../../php/logout.php');
                } else {
                    header('Location:profile.php?er=er');
                }
            } else {
                header('Location:changepwd.php?de');
            }
                
        } else {
            header('Location:changepwd.php');
        }
    } else {
        header('Location:changepwd.php');    
    }
?>