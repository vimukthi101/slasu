<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['username'])){
            $username = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['username'])));
            $getCard = "SELECT firstName, email FROM admin WHERE userName='".$username."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
                while($statusRow = mysqli_fetch_array($resultCard)){
                    $email = $statusRow['email'];
                    $firstName = $statusRow['firstName'];
                }
                $password = rand(100000, 999999);
                $addCard = "UPDATE `admin` SET `password`='".$password."' WHERE userName='".$username."'";
                if(mysqli_query($con, $addCard)){
                    //success
                    $from = "info@aquatics.lk";
                    $headers = "From:" . $from;
                    $subject = "Password Reset For SLASU";
$message = "Hi ".$firstName.",

Use following password to login to the system.

Password : ".$password."

Please change your password after login to the system.

Thank You
Admin,
SLASU";
                    if (mail($email, $subject, $message, $headers)){
                        header('Location:../admin-login.php?er=cm');
                    } else {
                        header('Location:adminForgot.php?er=mf');
                    }
                } else {
                    //query failed
                    header('Location:adminForgot.php?er=qf');
                }
            } else {
                //card exists
                header('Location:adminForgot.php?er=ce');
            }
        } else {
            header('Location:adminForgot.php?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:../admin-login.php');	
    }
?>