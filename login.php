<?php
include("./Config.php");



session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];

  $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'and role = '$role'";
  $result = mysqli_query($db, $sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['login_user'] = $row['name'];
        $_SESSION['email'] = $row['email'];

        $_SESSION['user_img'] = $row['image'];

        $_SESSION['user_id'] = $row['id'];
        // $_SESSION['login_user_id'] = $row['id'];

        $_SESSION['role'] = $row['role'];

        // echo $_SESSION['role'];

        if ($row['role']=='admin') {
          echo '<script>alert("Admin Login Successful"); window.location.href = "dashboard.php";</script>';
        // exit;
          // die();
        }else if ($row['role']=='tester') {
            echo '<script>alert("Tester Login Successful"); window.location.href = "tester_dashboard.php";</script>';
          // die();
        }else if ($row['role']=='developer') {
           echo '<script>alert("Developer Login Successful"); window.location.href = "developer_dashboard.php";</script>';      
           
        }

        // 
        // if ($row['role']=='admin') {
        //   header('location:dashboard.php');
        //   // die();
        // }else if ($row['role']=='tester') {
        //   header('location: ../Bug_Tracking_System/navbar/tester_navbar.php');
        //   // die();
        // }else if ($row['role']=='developer') {
        //   header('location: ../Bug_Tracking_System/navbar/developer_navbar.php');
        //   die();
        // }
        // $sucess="Login Successful";
        echo '<script>alert("Login Successful"); window.location.href = "dashboard.php";</script>';
        exit;
    } else {
        $error = "Invalid email or password";
    }
}

// 
?>




<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="./assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">

    <div class="authentication-wrapper authentication-basic container-p-y">

      <div class="authentication-inner">
        <?php if(isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>
         <!-- <?php if(isset($sucess)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $sucess; ?>
            </div>
        <?php } ?> -->
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.php" class="app-brand-link gap-2">
               
                <span class="app-brand-text demo text-body fw-bolder">Bug Tracker</span>
              </a>
            </div>
            <!-- /Logo -->
<!-- <?php echo $error ?> -->
<!-- -->
            <h4 class="mb-2">Bug Tracker! 👋</h4>
            <p class="mb-4">Please sign-in to your account</p>

            <form id="" class="mb-3" action="" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                 
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Enter your Password" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class=""></i>
                  </span>

                </div>
                 <a href="#">
                    <span style="color: #3260cb !important;">Forgot Password?</span>
                  </a>
              </div>
             <!--  <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div> -->
              <div class="mb-3">
                <label  class="form-label">Role</label>
                <select class="form-control" name="role">
                  <option>select Role</option>
                  <option value="admin">Admin</option>
                  <option value="developer">Developer</option>
                  <option value="tester">Tester</option>
                </select>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./assets/vendor/libs/popper/popper.js"></script>
  <script src="./assets/vendor/js/bootstrap.js"></script>
  <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="./assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="./assets/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

</html>

