<?php
	include_once('db.php');
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
        	$username = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['username'])));
        	$password = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['password'])));
            $getCard = "SELECT firstName, adminId, role FROM admin WHERE userName='".$username."' and password='".$password."'";
            $resultCard = mysqli_query($con, $getCard);
            if(mysqli_num_rows($resultCard) != 0){
            	while($statusRow = mysqli_fetch_array($resultCard)){
            		$firstName = $statusRow['firstName'];
            		$adminId = $statusRow['adminId'];
            		$role = $statusRow['role'];
            		session_start();
	            	$_SESSION["firstName"] = $firstName;
	            	$_SESSION["adminId"] = $adminId;
	            	$_SESSION["role"] = $role;
            	}
            	header('Location:../adminPanel/adminPages/dashboard.php');
            } else {
                //card exists
                header('Location:../admin-login.php?er=ce');
            }
        } else {
            //empty fields redirect to cards
            header('Location:../admin-login.php?er=em');
        }
    } else {
        //if submit button is not clicked
        header('Location:../admin-login.php');	
    }
?>