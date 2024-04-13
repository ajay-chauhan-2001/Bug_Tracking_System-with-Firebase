<?php  
   include('./session.php');

// $_SESSION['user_id'];
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Create user</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../Bug_Tracking_System/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../Bug_Tracking_System/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../Bug_Tracking_System/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../Bug_Tracking_System/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../Bug_Tracking_System/assets/css/demo.css" />
    <link rel="stylesheet" href="../Bug_Tracking_System/assets/css/dataTables.dataTables.min.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./Bug_Tracking_System/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../Bug_Tracking_System/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../Bug_Tracking_System/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../Bug_Tracking_System/assets/js/config.js"></script>

    <!-- datatable -->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../Bug_Tracking_System/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../Bug_Tracking_System/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
   

    <!-- ../Bug_Tracking_System/assets/vendor/datatables
    C:\xampp\htdocs\Bug_Tracking_System\assets\js -->
</head>

<body id="page-top">
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php
                include('../Bug_Tracking_System/Navigations/sidebar.php');
                // include('../Bug_Tracking_System/Navigations/AdminNavigation.php');
            ?>

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                      <!--   <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div> -->
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar"> 
                                        <!-- avatar avatar-online -->
                                       <!--  <b class="text-muted"><?php echo $_SESSION['login_user'] ?></b> -->
                                       <!-- <img src="./image/1.jpg" width="50" height="50"> -->
                                        <img class="w-px-40 h-auto rounded-circle"  src="image/<?php echo $_SESSION['user_img']; ?>"/>

                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar">
                                                        <img class="w-px-40 h-auto rounded-circle"  src="image/<?php echo $_SESSION['user_img']; ?>"/>

                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <!-- <span class="fw-semibold d-block"><?php echo $_SESSION['login_user']; ?></span> -->
                                                    <b class="text-muted"><?php echo $_SESSION['login_user'] ?></b><br>
                                                     <small class="text-muted"><?php echo $_SESSION['role'] ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    
                                    <li>
                                    <a class="dropdown-item" href="edit_profile.php?id=<?php echo $id; ?>">
                                   
                                    
                                     <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile
                                    </span>
                                    </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="logoutButton" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>


                </nav>

                <!-- / Navbar -->
                 <!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->
<!-- <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   -->
  <!-- Logout Modal-->
 <!-- <button type="button" class="btn btn-primary" id="logoutButton">Logout1</button> -->

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="logout.php" class="btn btn-primary">Logout</a> <!-- Redirect to logout.php for logout action -->
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Show modal when logout button is clicked
document.getElementById('logoutButton').addEventListener('click', function() {
  $('#logoutModal').modal('show'); // Using jQuery to show the modal
});
</script>

               <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                           <!-- <h1>hello</h1> -->
                           
                            <!-- Core JS -->
                            <!-- build:js assets/vendor/js/core.js -->
                            <script src="../Bug_Tracking_System/assets/vendor/libs/jquery/jquery.js"></script>
                            <script src="../Bug_Tracking_System/assets/vendor/libs/popper/popper.js"></script>
                            <script src="../Bug_Tracking_System/assets/vendor/js/bootstrap.js"></script>
                            <script src="../Bug_Tracking_System/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                            <script src="../Bug_Tracking_System/assets/vendor/js/menu.js"></script>
                            <!-- endbuild -->

                            <!-- Vendors JS -->
                            <script src="../Bug_Tracking_System/assets/vendor/libs/apex-charts/apexcharts.js"></script>

                            <!-- Main JS -->
                            <script src="../Bug_Tracking_System/assets/js/main.js"></script>

                            <!-- Page JS -->
                            <script src="../Bug_Tracking_System/assets/js/dashboards-analytics.js"></script>

                            <!-- Place this tag in your head or just before your close body tag. -->
                            <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>