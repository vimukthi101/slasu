<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['username'])){
            $username = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['username'])));
            $getCard = "SELECT operatorName, operatorEmail FROM club WHERE operatorMobile=".$username;
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
                while($statusRow = mysqli_fetch_array($resultCard)){
                    $email = $statusRow['operatorEmail'];
                    $operatorName = $statusRow['operatorName'];
                }
                $password = rand(100000, 999999);
                $addCard = "UPDATE `club` SET `operatorPassword`='".$password."' WHERE `operatorMobile`=".$username;
                if(mysqli_query($con, $addCard)){
                    //success
                    $from = "info@aquatics.lk";
                    $headers = "From:" . $from;
                    $subject = "Password Reset For SLASU";
$message = "Hi ".$operatorName.",

Use following password to login to the system.

Password : ".$password."

Please change your password after login to the system.

Thank You
Admin,
SLASU";
                    if (mail($email, $subject, $message, $headers)){
                        header('Location:../login.php?er=cm');
                    } else {
                        header('Location:forgot.php?er=mf');
                    }
                } else {
                    //query failed
                    header('Location:forgot.php?er=qf');
                }
            } else {
                //card exists
                header('Location:forgot.php?er=ce');
            }
        } else {
            header('Location:forgot.php?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:../login.php');	
    }
?>