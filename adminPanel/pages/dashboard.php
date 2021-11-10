<?php
    include_once('../../php/db.php');
    if(!isset($_SESSION[''])){
        session_start();
    }
    if(isset($_SESSION["clubId"])){
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
        .card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  background-color: rgb(174, 214, 241);
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

.footer {
  position: inherit;
  left: 0;
  bottom: 0;
  width: 100%;
}
    </style>
    <script>
            function startTime() {
                var today=new Date();
                var day = today.getDate();
                var month = today.getMonth();
                var year = today.getFullYear();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('txt').innerHTML = "Date: " + day + "/" + month + "/" + year + "<br>" + "Clock: " + h+":"+m+":"+s;
                var t = setTimeout(function(){startTime()},500);
            }

            function checkTime(i) {
                if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
            }
        </script>
</head>

<body onload="startTime()">
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
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="sendPayment.php"
                                aria-expanded="false">
                                <i class="mdi mdi-cash-multiple"></i>
                                <span class="hide-menu">Registration</span>
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
                                    <li class="">
                                        <a href="dashboard.php">Home</a>
                                    </li>
                                    <li class="mdi mdi-arrow-right-bold" aria-current="page">Dashboard</li>
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
                    <div class="col-4">
                        <div class="col-9">
                            <div class="card">
                                <div class="container">
                                    <br/>
                                    <h4 class="page-title" style="text-transform:uppercase;color: black;"><?php echo $_SESSION["clubName"] ?></h4>
                                    <h4 class="page-title" style="text-transform:uppercase;color: black;"><?php echo $_SESSION["clubIdCode"] ?></h4>
                                    <?php
                                        if($_SESSION["status"] == 2){
                                            echo '<label class="label label-success" style="text-transform:uppercase;font-size: 15px;">Status : Active</label>';
                                        } else {
                                            echo '<label class="label label-danger" style="text-transform:uppercase;font-size: 15px;">Status : Inactive</label>';
                                        }
                                    ?>
                                    <br/>
                                  </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="card">
                                <div class="container">
                                    <br/>
                                    <?php
                                        $pDate = 'SELECT date FROM `payment` where clubId='.$_SESSION["clubId"].' order by date desc limit 1';
                                        $dateR = mysqli_query($con, $pDate);
                                        if(mysqli_num_rows($dateR) != 0){
                                            while($rowDateP = mysqli_fetch_array($dateR)){
                                                $datePayment = $rowDateP['date'];
                                            }
                                        } else {
                                            $datePayment = "No Payments Done";
                                        }
                                    ?>
                                    <h4 class="page-title" style="text-transform:uppercase;color: black;">Last Payment</h4>
                                    <label class="label label-info" style="text-transform:uppercase;font-size: 15px;"><?php echo $datePayment; ?></label>
                                    <br/>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $athlete = 'SELECT count(*) FROM `athlete` where paymentStatus=2 AND clubId='.$_SESSION["clubId"];
                        $athleteR = mysqli_query($con, $athlete);
                        if(mysqli_num_rows($athleteR) != 0){
                            while($rowA = mysqli_fetch_array($athleteR)){
                                $countA = $rowA['count(*)'];
                                if($countA < 9){
                                    $countA = "0".$countA;
                                }
                            }
                        }
                        echo '<div class="col-3">
                                <div class="card">
                                    <div class="container" style="text-align: center;">
                                        <h4 style="font-size: 130px;color: black;">'.$countA.'</h4>
                                        <p>Total Athletes</p>
                                    </div>
                                </div>
                             </div>';
                    ?>
                    <?php
                        $coach = 'SELECT count(*) FROM `coach` where paymentStatus=2 AND clubId='.$_SESSION["clubId"];
                        $coachR = mysqli_query($con, $coach);
                        if(mysqli_num_rows($coachR) != 0){
                            while($rowR = mysqli_fetch_array($coachR)){
                                $countR = $rowR['count(*)'];
                                if($countR < 9){
                                    $countR = "0".$countR;
                                }
                            }
                        }
                        echo '<div class="col-3">
                                <div class="card">
                                    <div class="container" style="text-align: center;">
                                        <h4 style="font-size: 130px;color: black;">'.$countR.'</h4>
                                        <p>Total Coaches</p>
                                      </div>
                                </div>
                            </div>';
                    ?>
                    
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="col-9">
                            <div class="card">
                                <div class="container">
                                    <br/>
                                    <h4 style="font-size: 20px;color: black;" id="txt"></h4>
                                    <br/>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $payCo = 'SELECT count(*) FROM `coach` WHERE paymentStatus IN (0,3,4) AND clubId='.$_SESSION["clubId"];
                        $payRCo = mysqli_query($con, $payCo);
                        if(mysqli_num_rows($payRCo) != 0){
                            while($rowPayCo = mysqli_fetch_array($payRCo)){
                                $countPayCo = $rowPayCo['count(*)'];
                                if($countPayCo < 9){
                                    $countPayCo = "0".$countPayCo;
                                }
                            }
                        }
                        echo '<div class="col-3">
                                <div class="card">
                                    <div class="container" style="text-align: center;">
                                        <h4 style="font-size: 130px;color: black;">'.$countPayCo.'</h4>
                                        <p>Coaches Remaining For Payment</p>
                                      </div>
                                </div>
                            </div>';
                    ?>
                    <?php
                        $payC = 'SELECT count(*) FROM `athlete` WHERE paymentStatus IN (0,3,4) AND clubId='.$_SESSION["clubId"];
                        $payRC = mysqli_query($con, $payC);
                        if(mysqli_num_rows($payRC) != 0){
                            while($rowPayC = mysqli_fetch_array($payRC)){
                                $countPayC = $rowPayC['count(*)'];
                                if($countPayC < 9){
                                    $countPayC = "0".$countPayC;
                                }
                            }
                        }
                        echo '<div class="col-3">
                                <div class="card">
                                    <div class="container" style="text-align: center;">
                                        <h4 style="font-size: 130px;color: black;">'.$countPayC.'</h4>
                                        <p>Athletes Remaining For Payment</p>
                                      </div>
                                </div>
                            </div>';
                    ?>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="col-9">
                            <div class="">
                                <div class="">
                                    <br/>
                                    
                                    <br/>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $pay = 'SELECT count(*) FROM `payment` where status != "4" AND clubId='.$_SESSION["clubId"];
                        $payR = mysqli_query($con, $pay);
                        if(mysqli_num_rows($payR) != 0){
                            while($rowPay = mysqli_fetch_array($payR)){
                                $countPay = $rowPay['count(*)'];
                                if($countPay < 9){
                                    $countPay = "0".$countPay;
                                }
                            }
                        }
                        echo '<div class="col-3">
                                <div class="card">
                                    <div class="container" style="text-align: center;">
                                        <h4 style="font-size: 130px;color: black;">'.$countPay.'</h4>
                                        <p>All Payments</p>
                                      </div>
                                </div>
                            </div>';
                    ?>
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