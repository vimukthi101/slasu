<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['firstName'])  && !empty($_POST['uName']) && !empty($_POST['email']) && !empty($_POST['nic'])){
            $firstName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['firstName'])));
            $uName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['uName'])));
            if(!empty($_POST['secondName'])){
                $secondName = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['secondName'])));
            } else {
                $secondName = "";
            }
            if(!empty($_POST['mobile'])){
                $mobile = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['mobile'])));
            } else {
                $mobile = "";
            }
            $email = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['email'])));
            $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
            $password = rand(100000, 999999);
            $get = "SELECT * FROM admin WHERE `userName`='".$uName."' OR `email`='".$email."'";
            $resultCard = mysqli_query($con, $get);
            if(mysqli_num_rows($resultCard) != 0){
                header('Location:admin.php?er=ae');
            } else {
                $query = "INSERT INTO `admin`(`firstName`, `secondName`, `userName`, `email`, `mobile`, `nic`, `password`, `role`) VALUES ('".$firstName."','".$secondName."','".$uName."','".$email."','".$mobile."','".$nic."','".$password."','admin')";
                if(mysqli_query($con, $query)){ 
                //success
                    $from = "info@thestory.host";
                    $subject = "Admin Account Created Successfully at SLASU";
                    $headers = "From:" . $from;
$message = "Hi ".$firstName.",

Your account was created successfully at Sri Lanka Aquatic Sports Union.

Use following credentails to login to the system.

Link : http://localhost:1234/slasu/admin-login.php
User Name : ".$uName."
Password : ".$password."

Please change your password after login to the system.

Thank You
Super Admin,
SLASU";
                    if (mail($email, $subject, $message, $headers)){
                        header('Location:admin.php?er=cs');
                    } else {
                        header('Location:admin.php?er=mf');
                    }
                } else {
                    header('Location:admin.php?er=er');
                }
            }
        } else {
            header('Location:admin.php');
        }
    } else {
        header('Location:admin.php');    
    }
?>