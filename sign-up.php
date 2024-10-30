<!-- Starting of the PHP Script -->
<?php
session_start();
if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}
?>
<!-- Ending of the PHP Script -->

<!DOCTYPE html>
<html>

<head>
  <?php 
  include("header.php");
  ?>
</head>

<body class="hold-transition skin-white sidebar-mini">
  <div>

    <!-- Starting of the Navbar Component -->
    <?php
    $excludeCompany = true;
    $excludeAboutUs = true;
    include("./Components/Navbar.php");
    ?>
    <!-- Ending of the Navbar Component -->

    <div class="content-wrapper" style="margin-left: 0px;">
      <section class="content-header">
        <div class="container">
          <div class="row latest-job margin-top-50 margin-bottom-20">
            <h1 class="text-center margin-bottom-20 fw-bold">Sign Up</h1>
            <div class="col-md-6 latest-job ">
              <div class="small-box bg-primary padding-5">
                <div class="inner">
                  <h3 class="text-center">User Registration</h3>
                </div>
                <a href="register-candidates.php" class="small-box-footer">
                  Register <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-6 latest-job ">
              <div class="small-box bg-dark padding-5">
                <div class="inner">
                  <h3 class="text-center text-white">Company Registration</h3>
                </div>
                <a href="register-company.php" class="small-box-footer">
                  Register <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Starting of the Footer Component -->
    <?php
    include("./Components/Footer.php");
    ?>
    <!-- Ending of the Footer component -->

    <div class="control-sidebar-bg"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>

</body>

</html>