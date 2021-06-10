<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['fname']) && !empty($_POST['nic'])){
                $fname   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['fname'])));
                $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
                if(!empty($_POST['sname'])){
                    $sname = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['sname'])));
                } else {
                    $sname = "";
                }
                if(!empty($_POST['wtzap'])){
                    $wtzap = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['wtzap'])));
                } else {
                    $wtzap = "";
                }
                if(!empty($_POST['email'])){
                    $email = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['email'])));
                } else {
                    $email = "";
                }
                $updateEmployeeAll = "UPDATE `admin` SET `firstName`='".$fname."',`secondName`='".$sname."',`email`='".$email."',`mobile`='".$wtzap."',`nic`='".$nic."' WHERE adminId=".$_SESSION["adminId"];
                if(mysqli_query($con, $updateEmployeeAll)){ 
                    header('Location:profile.php?er=su');
                } else {
                    header('Location:profile.php?er=er');
                }
        } else {
            header('Location:profile.php');
        }
    } else {
        header('Location:profile.php');    
    }
?>