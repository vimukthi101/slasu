<?php
	if(!isset($_SESSION[''])){
		session_start();
	}
	include_once('../../php/db.php');
	if(isset($_SESSION['adminId']) ){
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['delete'])){
			if(!empty($_POST['delete'])){
				$tId = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['delete'])));
				$gettt = "SELECT * FROM admin WHERE adminId='".$tId."'";
				$resulttt = mysqli_query($con, $gettt);
				if(mysqli_num_rows($resulttt) != 0){
					$deletett = "DELETE FROM admin WHERE adminId='".$tId."'";
					if(mysqli_query($con, $deletett)){
						//success
						header('Location:admin.php?er=su');
					} else {
						//query failed
						header('Location:admin.php');
					}
				} else {
					//no tt
					header('Location:admin.php');
				}
			} else {
				//empty fields redirect to cards
				header('Location:admin.php');
			}
		} else {
			//redirect to form not submit 404
			header('Location:admin.php');	
		}
	} else {
		//error page 404
		header('Location:admin.php');
	}	
?>