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
            $query = "INSERT INTO `admin`(`firstName`, `secondName`, `userName`, `email`, `mobile`, `nic`, `password`, `role`) VALUES ('".$firstName."','".$secondName."','".$uName."','".$email."','".$mobile."','".$nic."','".$password."','admin')";
            if(mysqli_query($con, $query)){ 
                //success
                $subject = "Admin Account Created Successfully at SLASU";
                $message = "<h1>Your account was created successfully at Sri Lanka Aquatic Sports Union.</h1><br/>
                            <p>Use following credentails to login to the system.</p>
                            <p> Link : http://localhost:1234/slasu/admin-login.php <br/>
                            <p> User Name : ".$uName."</P><br/>
                            <p> Password : ".$password."</P><br/><br/><br/>
                            <p>Please change your password after login to the system.</p><br/><br/><br/>
                            <p>Thank You</p><br/>
                            <p>Super Admin,</p><br/>
                            <p>SLASU</p>";
                if (mail($email, $subject, $message)){
                    header('Location:admin.php?er=cs');
                } else {
                    header('Location:admin.php?er=mf');
                }
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