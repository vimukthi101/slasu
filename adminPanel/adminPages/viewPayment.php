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
                        $athleteCode = $row['paymentCode'];
                        $clubId = $row['clubId'];
                        $clubIdCode = $athleteCode.$athleteId;
                        $amount = $row['amount'];
                        $notes = $row['notes'];
                        $date = $row['date'];
                        $status = $row['status'];
                        $athleteList = $row['athleteList'];
                        $adminComment = $row['adminComment'];
                        $array = explode(",",$athleteList);
                        $subjectVal = "";
                        for($x=0;$x<count($array);$x++){
                            $subjectVal .= 'SLASU/A/00'.$array[$x].',';
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
                        $queryP = 'SELECT * FROM `club` WHERE clubId='.$clubId;
                        $resultP = mysqli_query($con, $queryP);
                        if(mysqli_num_rows($resultP) != 0){
                            while($rowP = mysqli_fetch_array($resultP)){
                                $clubName = $rowP['clubName'];
                            }
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
                                <h4 class="card-title">Payment Information</h4>
                            </div>
                            <div class="row">
                                <div class="col-8 align-self-center">
                            
                                </div>
                                <div class="col-2 align-self-center">
                                    <div>
                                        <form role="form" action="exportToPdf-Payment.php" method="POST">
                                            <input type="submit" class="form-control btn btn-success" value="Export To PDF">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-2 align-self-center">
                            
                                </div>
                            </div>
                            <?php
                            $html = '<div class="form-group col-md-12">
                                            <label class="">Payment Information</label>
                                            <hr/>
                                        </div>
                                            <label class="">Payment REF : '.$clubIdCode.'</label><br/><br/>
                                            <label class="">Club Name : '.$clubName.'</label><br/><br/>
                                            <label class="">Amount : '.$amount.'</label><br/><br/>
                                            <label class="">Notes : '.$notes.'</label><br/><br/>
                                            <label class="">Date : '.$date.'</label><br/><br/>
                                            <label class="">Status : '.$status.'</label><br/><br/>
                                            <label class="">Athlete List : '.$subjectVal.'</label><br/><br/>
                                            <label class="">Admin Comment : '.$adminComment.'</label><br/><br/>';
                                            $_SESSION['html'] = $html;
                            ?>
                            <div class="card-body row">
		                        <?php
		                         echo '<div class="form-group col-md-12">
		                                    <label class="">Payment Information</label>
		                                    <hr/>
		                                </div>
                                        <div class="form-group col-md-5">
                                            <label class="">Payment REF</label>
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
		                                    <label class="">Status</label>
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
		                                    <label class="">Admin Comment</label>
		                                    <div class="">
		                                        <input type="text" placeholder="'.$adminComment.'"
		                                            class="form-control form-control-line" disabled>
		                                    </div>
		                                </div>';
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