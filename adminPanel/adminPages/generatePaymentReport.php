<?php
    include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["adminId"])){
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
                        <!-- <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 me-1"></i>
                                    <div class="ms-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li> -->
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
                                <span class="hide-menu">Unattached Registration</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="payments.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash"></i>
                                <span class="hide-menu">Approve Payment</span>
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
                                    <li class="">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">Reports</li>
                                </ol>
                            </nav>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Generate Reports</h4>
                            </div>
                            <form role="form" action="exportToPdf-allPayments.php" method="POST">
                                <div class="row">    
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">               
                                                <label class="form-check-label">Report Format</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <label class="form-check-label">
                                                    <input type="radio" value="excel" class="form-check-input" id="excel" name="regRadio" required>Excel</label>
                                            </div>
                                        </div>
                                    </div>  -->
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <label class="form-check-label">
                                                    <input type="radio" value="pdf" class="form-check-input" id="pdf" name="regRadio" required>PDF</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">               
                                                <label class="form-check-label">Report Fields</label>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="paymentCode">
                                                <label class="form-check-label" for="clubCode">Invoice No.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="clubId">
                                                <label class="form-check-label" for="clubCode">Club Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="amount">
                                                <label class="form-check-label" for="clubCode">Amount</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="notes">
                                                <label class="form-check-label" for="clubCode">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="athleteList">
                                                <label class="form-check-label" for="clubCode">Athlete List</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="coachList">
                                                <label class="form-check-label" for="clubCode">Coach List</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="date">
                                                <label class="form-check-label" for="clubCode">Date</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="adminComment">
                                                <label class="form-check-label" for="clubCode">Admin Comment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="status">
                                                <label class="form-check-label" for="clubCode">Status</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="affiliationFeeStatus">
                                                <label class="form-check-label" for="clubCode">Affiliation Fee Status</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="enrollmentFeeStatus">
                                                <label class="form-check-label" for="clubCode">Enrollment Fee Status</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="paymentMode">
                                                <label class="form-check-label" for="clubCode">Payment Mode</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="checkbox" class="form-check-input" name="fieldList[]" value="chequeNo">
                                                <label class="form-check-label" for="clubCode">Receipt No.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">               
                                                <input type="submit" name="submit" value="Download" id="submit" class="form-control btn-success" style="margin: auto;"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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