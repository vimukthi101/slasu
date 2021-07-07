<?php
	include_once('../../php/db.php');
	if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["clubId"])){
	    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['id'])){
	        if(!empty($_POST['id'])){
	        	$id = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
	            $getCard = "SELECT * FROM athlete WHERE athleteId='".$id."'";
	            $resultCard = mysqli_query($con, $getCard);
	            if(mysqli_num_rows($resultCard) != 0){
	            	while($row = mysqli_fetch_array($resultCard)){
                        $athleteCode = $row['athleteCode'];
    $clubIdCode = $athleteCode.$id;
	                    $affiliationCat = $row['affiliationCat'];
	                    $athleteName = $row['athleteName'];
	                    $gender = $row['gender'];
	                    $dob = $row['dob'];
	                    $address = $row['address'];
	                    $phone1 = $row['phone1'];
	                    $phone2 = $row['phone2'];
	                    $whatsapp = $row['whatsapp'];
	                    $email = $row['email'];
	                    $nameForCert = $row['nameForCert'];
	                    $bbNo = $row['bbNo'];
	                    $bbDistrict = $row['bbDistrict'];
	                    $bbDate = $row['bbDate'];
	                    $bbPhoto = $row['bbPhoto'];
	                    $postalId = $row['postalId'];
	                    $nic = $row['nic'];
	                    $ppNo = $row['ppNo'];
	                    if($gender == 1){
	                        $gender = "Male";
	                    } else if($gender == 2) {
	                        $gender = "Female";
	                    } 
	                    if($affiliationCat == 1){
                            $affiliationCat = "Swimming";
                        } else if($affiliationCat == 2) {
                            $affiliationCat = "Artistic Swimming";
                        } else if($affiliationCat == 3) {
                            $affiliationCat = "Water Polo";
                        } else if($affiliationCat == 4) {
                            $affiliationCat = "Diving";
                        } else if($affiliationCat == 5) {
                            $affiliationCat = "All";
                        }
	            	}
	            } else {
	                //card exists
	                header('Location:athlete.php');
	            }
	        } else {
	            //empty fields redirect to cards
	            header('Location:athlete.php');
	        }
	    } else {
	        //if submit button is not clicked
	        header('Location:athlete.php');	
	    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title style="text-transform:uppercase;"><?php echo $_SESSION["clubName"] ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon/favicon.png">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
        <style type="text/css">
        .footer {
  position: inherit;
  left: 0;
  bottom: 0;
  width: 100%;
}

    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="dashboard.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!-- Light Logo icon -->
                                <img src="../../assets/images/logo-1-1.png" width="200" height="50" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../assets/images/resources/testi-1-1.png" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-network"></i>
                                    My Profile</a>
                                    <a class="dropdown-item" href="changepwd.php"><i class="mdi mdi-key"></i>
                                    Change Password</a>
                                <a class="dropdown-item" href="../../php/logout.php"><i class="mdi mdi-logout"></i>
                                        Log Out</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="athlete.php"
                                aria-expanded="false">
                                <i class="mdi mdi-human-child"></i>
                                <span class="hide-menu">Athletes</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="coach.php"
                                aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Coaches</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash"></i>
                                <span class="hide-menu">Payment Status</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title" style="text-transform:uppercase;"><?php echo $_SESSION["clubName"] ?></h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class=""><a href="dashboard.php">Home</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page"><a href="athlete.php">Athletes</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">View</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Athlete Information</h4>
                            </div>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
		                                    <label class="">Personal Information</label>
		                                    <hr/>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">ID</label>
                                            <div class="">
                                                <input type="text" placeholder="'.$clubIdCode.'"
                                                    class="form-control form-control-line" disabled>
                                            </div>
                                        </div>
		                         		<div class="form-group col-md-5">
		                                    <label class="">Full Name</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$athleteName.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Name For Certificate</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$nameForCert.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Category</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$affiliationCat.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Gender</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$gender.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">DOB</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$dob.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Address</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$address.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Contact Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Primary Contact Number</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$phone1.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Secondary Contact Number</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$phone2.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">WhatsApp Number</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$whatsapp.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Email</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$email.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">ID Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Postal ID</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$postalId.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">NIC</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$nic.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Passport Number</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$ppNo.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Birth Certificate Information</label>
		                                    <hr/>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Birth Certificate Number</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$bbNo.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Birth Certificate Issued District</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$bbDistrict.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Birth Certificate Issued Date</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$bbDate.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-12">
		                                    <label class="">Birth Certificate</label>
		                                    <div class="">
		                                    	<img width="200" height="200" src="data:image/jpeg;base64,'.base64_encode($bbPhoto).'"/>
		                                    </div>
		                                </div>
		                                ';
		                        ?>
                        	</div>	
                        </div>
                    </div>
                </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Sri Lanka Aquatic Sports Union. Designed and Developed by
                <a href="http://striking.lk/" target="_blank">Strking Group</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../dist/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
<?php
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>