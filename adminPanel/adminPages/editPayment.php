<?php
	include_once('../../php/db.php');
	if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["adminId"])){
	    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']) && isset($_POST['id'])){
	        if(!empty($_POST['id'])){
	        	$id = htmlspecialchars(mysqli_real_escape_string($con, trim($_POST['id'])));
	            $getCard = "SELECT * FROM payment WHERE paymentId='".$id."'";
	            $resultCard = mysqli_query($con, $getCard);
	            if(mysqli_num_rows($resultCard) != 0){
	            	while($row = mysqli_fetch_array($resultCard)){
	                    $athleteId = $row['paymentId'];
                        $affiliationFeeStatus = $row['affiliationFeeStatus'];
                        $enrollmentFeeStatus = $row['enrollmentFeeStatus'];
                        $athleteList = $row['athleteList'];
                        $coachList = $row['coachList'];
                        $athleteCode = $row['paymentCode'];
                        $clubId = $row['clubId'];
                        $clubIdCode = $athleteCode.$athleteId;
                        $amount = $row['amount'];
                        $notes = $row['notes'];
                        $date = $row['date'];
                        $status = $row['status'];
                        $array = explode(",",$athleteList);
                        $array2 = explode(",",$coachList);
                        $subjectVal = "";
                        for($x=0;$x<count($array);$x++){
                            $subjectVal .= 'SLASU/A/00'.$array[$x].',';
                        }
                        $subjectVal2 = "";
                        for($x=0;$x<count($array2);$x++){
                            $subjectVal2 .= 'SLASU/C/00'.$array2[$x].',';
                        }
                        if($status == 1){
                            $status = "Send For Payment";
                        } else if($status == 2) {
                            $status = "Approved";
                        } else if($status == 3) {
                            $status = "Rejected";
                        } else if($status == 4) {
                            $status = "To Be Renewed";
                        }
                        if(!empty($clubId)){
                            $queryP = 'SELECT * FROM `club` WHERE clubId='.$clubId;
                            $resultP = mysqli_query($con, $queryP);
                            if(mysqli_num_rows($resultP) != 0){
                                while($rowP = mysqli_fetch_array($resultP)){
                                    $clubName = $rowP['clubName'];
                                }
                            }   
                        } else {
                            $clubName = "";
                        }
	            	}
	            } else {
	                //card exists
	                header('Location:payment.php');
	            }
	        } else {
	            //empty fields redirect to cards
	            header('Location:payment.php');
	        }
	    } else {
	        //if submit button is not clicked
	        header('Location:payment.php');	
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
    <title style="text-transform:uppercase;"><?php echo $_SESSION["firstName"] ?></title>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin.php"
                                aria-expanded="false">
                                <i class="mdi mdi-key"></i>
                                <span class="hide-menu">Admins</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="club.php"
                                aria-expanded="false">
                                <i class="mdi mdi-home "></i>
                                <span class="hide-menu">Clubs</span>
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sendPayments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="hide-menu">Send For Payment</span>
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
                        
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class=""><a href="dashboard.php">Home</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page"><a href="payments.php">Payment Status</a></li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">Approve</li>
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
                                <h4 class="card-title">Payment Information</h4>
                            </div>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
		                                    <label class="">Payment Information</label>
		                                    <hr/>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Invoice No</label>
                                            <div class="">
                                                <input type="text" placeholder="'.$clubIdCode.'"
                                                    class="form-control form-control-line" disabled>
                                            </div>
                                        </div>
		                         		<div class="form-group col-md-5">
		                                    <label class="">Club Name</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$clubName.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Amount</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$amount.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Notes</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$notes.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Date</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$date.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Current Status</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$status.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>
		                                <div class="form-group col-md-5">
                                            <label class="">Athlete List</label>
                                            <div class="">
                                                <textarea class="form-control form-control-line" disabled>'.$subjectVal.'</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Coach List</label>
                                            <div class="">
                                                <textarea class="form-control form-control-line" disabled>'.$subjectVal2.'</textarea>
                                            </div>
                                        </div>';
                                        if($affiliationFeeStatus == 1){
                                            echo '<div class="form-group col-md-5">
                                                    <label class="">Affiliation Fee</label>
                                                    <div class="">
                                                        <input type="text" placeholder="Affiliation Fee : Included"
                                                            class="form-control form-control-line" disabled>
                                                    </div>
                                                </div>';
                                        }
                                        if($enrollmentFeeStatus == 1){
                                            echo '<div class="form-group col-md-5">
                                                    <label class="">Enrollment Fee</label>
                                                    <div class="">
                                                        <input type="text" placeholder="Enrollment Fee : Included"
                                                            class="form-control form-control-line" disabled>
                                                    </div>
                                                </div>';
                                        }    
                                        echo '<div class="form-group col-md-12">
                                            <label class="">For Admin Use</label>
                                            <hr/>
                                        </div><form role="form" action="approvePayment.php" method="POST" class="contact-one__form" enctype="multipart/form-data">
                                        <div class="form-group col-md-5">
                                            <label class="">Payment Type</label>
                                            <div class="">
                                                <select class="custom-select form-control" name="paymentMode" id="paymentMode" required>
                                                    <option selected disabled>Select Type...</option>
                                                    <option value="1">Checque Payment</option>
                                                    <option value="2">Bank Deposit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Checque/ Receipt No.</label>
                                            <div class="">
                                                <input type="text" class="form-control form-control-line" name="chequeNo" id="chequeNo" required>
                                            </div>
                                        </div>
		                                <div class="form-group col-md-5">
		                                    <label class="">Admin Comment</label>
		                                    <div class="">
		                                        <textarea class="form-control form-control-line" id="comment" name="comment" required></textarea>
		                                    </div>
		                                </div>
                                        <div class="col-lg-12"><hr/></div>
                                        <div class="col-md-6" style="text-align: center;">
                                                <input type="text" value="'.$id.'" name="athleteId" id="athleteId" required hidden>
                                                <input type="submit" name="submit" value="Approve" onclick="return clicked();" id="submit" class="btn btn-success" style="margin: auto;"></input>
                                        </div>
                                        </form>';
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
<script type="text/javascript">
    function clicked() {
       if (confirm('Do you want to update the details?')) {
           yourformelement.submit();
       } else {
           return false;
       }
    }
</script>
</html>
<?php
} else {
    session_destroy();
    header('Location:../../login.php');
}
?>
