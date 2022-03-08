<?php
session_start();
require_once "../queryHandlerclass/query.php";
if (isset($_SESSION['alert'])){
    ?>
    <script> window.alert("<?=$_SESSION['alert']?>")</script><?php
    unset($_SESSION['alert']);
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Tabib HTML5 Health Directory Template</title>
    <meta name="author" content="Nile-Theme">
    <meta name="robots" content="index follow">
    <meta name="googlebot" content="index follow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="directory, doctor, doctor directory, Health directory, listing, map, medical, medical directory, professional directory, reservation, reviews">
    <meta name="description" content="Health Care & Medical Services Directory">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800%7CPoppins:300i,300,400,700,400i,500%7CDancing+Script:700%7CDancing+Script:700" rel="stylesheet">
    <!-- animate -->
    <link rel="stylesheet" href="../assets/css/animate.css" />
    <!-- owl Carousel assets -->
    <link href="../assets/css/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/owl.theme.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- hover anmation -->
    <link rel="stylesheet" href="../assets/css/hover-min.css">
    <!-- flag icon -->
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- colors -->
    <link rel="stylesheet" href="../assets/css/colors/main.css">
    <!-- elegant icon -->
    <link rel="stylesheet" href="../assets/css/elegant_icon.css">
    <!-- admin style -->
    <link rel="stylesheet" href="../assets/css/sb-admin.css">
    <!-- jquery library  -->
    <script  src="../assets/js/jquery-3.2.1.min.js"></script>
    <!-- fontawesome  -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


</head>

<body>


    <header class="background-white box-shadow fixed-top z-index-99">
        <nav class="container-fluid header-in">
            <div class="row">
                <div class="col-xl-2 col-lg-2">
                    <a id="logo" href="index.html" class="d-inline-block margin-tb-15px"><img src="../assets/img/logo-1.png" alt=""></a>
                    <a class="mobile-toggle padding-13px background-main-color" href="#"><i class="fas fa-bars"></i></a>
                </div>
               
                <div class="col-xl-4 d-none d-xl-block">
                    <hr class="margin-bottom-0px d-block d-sm-none">

                    <div class="nav-item dropdown float-left">
                        <?php
                        $adminusername = $_SESSION['ADMIN_NAME'] ;
                        $sql_statement = queryHandler::getData("admins","img_path","username = '$adminusername'");
                        if ($sql_statement) {
                            $result = $sql_statement->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                        <a href="dashboard-my-profile.php" class="margin-top-15px d-inline-block text-grey-3 margin-right-15px"><img src="imgs/<?=isset($result['img_path'])? "{$result['img_path']}":"profile.png"?>" class="height-30px border-radius-30" alt=""><?=" ".$_SESSION['ADMIN_NAME']." "?></a>
                    </div>

                    <div class="nav-item float-left">
                        <a href="#" class="nav-link margin-top-10px" data-toggle="modal" data-target="#exampleModal">
                            <div class="text-grey-3"><i class="fa fa-fw fa-sign-out-alt"></i>Logout</div>
                        </a>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <!-- // Header  -->


        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark z-index-9  fixed-top" id="mainNav">

            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav navbar-sidenav background-main-color admin-nav" id="admin-nav">
                    <li class="nav-item">
                        <span class="nav-title-text">Main</span>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        <a class="nav-link" href="dashboard-home.php">
                            <i class="fas fa-fw fa-home"></i><span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My items">
                        <a class="nav-link" href="dashboard-my-doctors.php">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">My Doctors</span>
                  </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Favorites">
                        <a class="nav-link" href="dashboard-my-patients.php">
                    <i class="fa fa-fw fa-heart"></i>
                    <span class="nav-link-text">My patients</span>
                  </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
                        <a class="nav-link" href="dashboard-bookings.php">
                            <i class="far fa-fw fa-bookmark"></i>
                            <span class="nav-link-text">Bookings</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
                        <a class="nav-link" href="dashboard-reviews.php">
                    <i class="fa fa-fw fa-star"></i>
                    <span class="nav-link-text">Reviews</span>
                  </a>
                    </li>
                
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Listing">
                        <a class="nav-link active" href="dashboard-add-doctor.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Add Doctor</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Listing">
                        <a class="nav-link " href="dashboard-add-admin.php">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Add Admin</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <span class="nav-title-text">User Area</span>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My Profile">
                        <a class="nav-link" href="dashboard-my-profile.php">
                            <i class="fa fa-fw fa-user-circle"></i>
                            <span class="nav-link-text">My Profile</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sing Out">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out-alt"></i>
                            <span class="nav-link-text">Sign Out</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid overflow-hidden">
                <div class="row margin-tb-90px margin-lr-10px sm-mrl-0px">
                    <!-- Page Title -->
                    <div id="page-title" class="padding-30px background-white full-width box-shadow">
                        <div class="container">
                            <ol class="breadcrumb opacity-5">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Add Doctor</li>
                            </ol>
                            <h1 class="font-weight-300">Add Doctor</h1>
                        </div>
                    </div>
                    <div class="margin-tb-45px full-width">
                        <div class="padding-30px background-white border-radius-20 box-shadow">
                            <h3><i class="far fa-list-alt margin-right-10px text-main-color"></i> Basic Informations </h3>
                            <hr>
                            <form method = "post" action="addDoctorProcess.php" enctype="application/x-www-form-urlencoded">
                                <div class="form-group margin-bottom-20px">
                                    <label><i class="far fa-list-alt margin-right-10px"></i>Doc. username</label>
                                    <input type="text" name="docUsername" class="form-control form-control-sm" id="ListingTitle" placeholder="Doc. username">
                                </div>

                                <div class="form-group margin-bottom-20px">
                                    <label><i class="far fa-flag margin-right-10px"></i> Password</label>
                                    <input type="password"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                           title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                           name="password" class="form-control form-control-sm" id="ListingKeywords" placeholder="password">
                                </div>

                                <div class="form-group margin-bottom-20px">
                                    <label><i class="far fa-flag margin-right-10px"></i>Confirm Password</label>
                                    <input type="password" name="confpassword"
                                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                           title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                           class="form-control form-control-sm" id="ListingKeywords" placeholder="Confirm password">
                                </div>


                                <div class="row">
                                <div class="col-md-6">
                                    <label><i class="fas fa-info margin-right-10px"></i> First Name</label>
                                    <input type="text" name="firstname" class="form-control form-control-sm" placeholder="First Name">
                                </div class="row">
                                    <div class="col-md-6">
                                        <label><i class="fas fa-link margin-right-10px"></i> Last Name</label>
                                        <input type="text"  name="lastname" class="form-control form-control-sm" placeholder="Last Name">
                                    </div>
                                </div><br>
                                <div class="form-group margin-bottom-20px">
                                    <label><i class="fas fa-info margin-right-10px"></i> Specialization</label>
                                    <input type="text" name="specialization" class="form-control form-control-sm" placeholder="specialization">
                                </div>
                                <div class="form-group margin-bottom-20px">
                                    <label><i class="fas fa-info margin-right-10px"></i> Address</label>
                                    <input type="text" name="address" class="form-control form-control-sm" placeholder="Address">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 margin-bottom-20px">
                                        <label><i class="fas fa-mobile-alt margin-right-10px"></i> Phone</label>
                                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="phone ">
                                    </div>
                                    <div class="col-md-6 margin-bottom-20px">
                                        <label><i class="far fa-envelope-open margin-right-10px"></i> Email</label>
                                        <input type="text" name="email" class="form-control form-control-sm" placeholder="info@yourname.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label><i class="fas fa-info margin-right-10px"></i> Time of presence</label>
                                        <input type="time" name="timepres" class="form-control form-control-sm" placeholder="Time Of Arrival">
                                    </div>
                                    <div class="col-md-6">
                                        <label><i class="fas fa-link margin-right-10px"></i> Stay time</label>
                                        <input type="number" min="1" max="6" name="staytime" class="form-control form-control-sm" placeholder="number of hours">
                                    </div>
                                </div><br>
                                <input  style="cursor: pointer" type="submit" class="btn btn-lg border-2  btn-primary btn-block border-radius-15 padding-15px box-shadow" value="Add Doctor" name="submit">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <span>© 2018 tabib Health Directory | All Right Reserved <a class="text-grey-2 margin-left-15px" href="https://themeforest.net/user/nile-theme/portfolio" target="_blank">Powered by : Nile Theme</a></span>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fa fa-angle-up"></i>
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="page-login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/sticky-sidebar.js"></script>
        <script src="../assets/js/YouTubePopUp.jquery.js"></script>
        <script src="../assets/js/owl.carousel.min.js"></script>
        <script src="../assets/js/imagesloaded.min.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/custom.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>


    </body>

    </html>
