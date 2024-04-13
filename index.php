 
<?php
   include('./session.php');
?>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">
<head>
    <title>Welcome</title>
</head><?php
        include('../Bug_Tracking_System/links.php');
        ?>

<body>
    <?php
                // include('navbar.php');
                include('./Navigations/sidebar.php');

            ?>
 
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

           


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
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="./assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="./assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">Isha Bhojani</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                     </li>
    <li>
    <a class="dropdown-item" href="edit_profile.php?id=<?php echo $id; ?>"
                    method="post">
   
                                    <!-- href="./edit_profile.php?id=<?php echo $id ?>" -->
    
    <i class="bx bx-user me-2"></i>
    <span class="align-middle">My Profile
    </span>
    </a>
    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./logout.php">
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

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-8 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Welcome Admin Dashboards </h5>
                                                

                                               
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Bootstrap Table with Header - Dark -->
                            <div class="card">
                                <h5 class="card-header">Project list</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Project</th>
                                                <th>Client</th>
                                                <th>Tester</th>
                                                <th>Developers</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                                                <td>Albert Cook</td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
                                                <td>Barry Hunter</td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>

                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="badge bg-label-success me-1">Completed</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
                                                <td>Trevor Baker</td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>

                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>

                                                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
                                                </td>
                                                <td>Jerry Milton</td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                            <img src="./assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                                            <img src="./assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                                            <img src="./assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/ Bootstrap Table with Header Dark -->


                            <!-- Core JS -->
                            <!-- build:js assets/vendor/js/core.js -->
                            <script src="./assets/vendor/libs/jquery/jquery.js"></script>
                            <script src="./assets/vendor/libs/popper/popper.js"></script>
                            <script src="./assets/vendor/js/bootstrap.js"></script>
                            <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

                            <script src="./assets/vendor/js/menu.js"></script>
                            <!-- endbuild -->

                            <!-- Vendors JS -->
                            <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>

                            <!-- Main JS -->
                            <script src="./assets/js/main.js"></script>

                            <!-- Page JS -->
                            <script src="./assets/js/dashboards-analytics.js"></script>

                            <!-- Place this tag in your head or just before your close body tag. -->
                            <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>