<?php
	include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['nic']) && !empty($_POST['adrs']) && !empty($_POST['cp1']) && !empty($_POST['iname']) && !empty($_POST['imobile'])){
                $email   = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['email'])));
                $name = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['name'])));
                $nic = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['nic'])));
                $adrs = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['adrs'])));
                $cp1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['cp1'])));
                if(!empty($_POST['wtzap'])){
                    $wtzap = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['wtzap'])));
                } else {
                    $wtzap = "";
                }
                if(!empty($_POST['cp2'])){
                    $cp2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['cp2'])));
                } else {
                    $cp2 = "";
                }
                if(!empty($_POST['cemail1'])){
                    $cemail1 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['cemail1'])));
                } else {
                    $cemail1 = "";
                }
                if(!empty($_POST['cemail2'])){
                    $cemail2 = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['cemail2'])));
                } else {
                    $cemail2 = "";
                }
                $iname = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['iname'])));
                $imobile = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['imobile'])));
                if(!empty($_POST['iemail'])){
                    $iemail = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['iemail'])));
                } else {
                    $iemail = "";
                }
                $updateEmployeeAll = "UPDATE `club` SET `operatorName`='".$name."',`operatorEmail`='".$email."',`operatorWhatsapp`='".$wtzap."',`operatorNic`='".$nic."',`postalAddress`='".$adrs."',`clubContactOne`='".$cp1."',`clubContactTwo`='".$cp2."',`clubEmailOne`='".$cemail1."',`clubEmailTwo`='".$cemail2."',`inchargeName`='".$iname."',`inchargeMobile`='".$imobile."',`inchargeEmail`='".$iemail."' WHERE clubId=".$_SESSION["clubId"];
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