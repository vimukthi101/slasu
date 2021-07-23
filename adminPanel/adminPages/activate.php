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
                $gettt = "SELECT clubName,operatorName,operatorEmail FROM club WHERE clubId='".$id."'";
                $resulttt = mysqli_query($con, $gettt);
                if(mysqli_num_rows($resulttt) != 0){
                    while($row = mysqli_fetch_array($resulttt)){
                        $to = $row['operatorEmail'];
                        $operatorName = $row['operatorEmail'];
                        $clubName = $row['clubName'];
                        $from = "info@thestory.host";
                        $headers = "From:" . $from;
                        $subject = $clubName." - Account Activated Successfully at SLASU";
    $message = "Hi ".$operatorName.",

    Your account was activated successfully at Sri Lanka Aquatic Sports Union. Now you can login to the system using the credentails shared when you got registered with us. Also now you'r Athletes and Coaches can get register under your club.

    Please change your password after login to the system.

    Thank You
    Admin,
    SLASU";
                        if (mail($to, $subject, $message, $headers)){
                            header('Location:club.php?er=au');
                        } else {
                            header('Location:club.php?er=af');
                        }
                    }
                } else{
                    header('Location:club.php?er=af');
                }
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