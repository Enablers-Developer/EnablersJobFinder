<?php
session_start();
if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include("header.php");
  ?>
</head>

<body class="hold-transition skin-white sidebar-mini">
  <div>

    <?php
    $excludeCompany = true;
    $excludeAboutUs = true;
    include("./Components/Navbar.php");
    ?>

    <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header">
        <div class="container">
          <div class="row latest-job margin-top-50 margin-bottom-20">
            <h1 class="text-center margin-bottom-20 fw-bold">Login</h1>
            <div class="col-md-6 latest-job ">
              <div class="small-box bg-primary padding-5">
                <div class="inner">
                  <h3 class="text-center">Candidates Login</h3>
                </div>
                <a href="login-candidates.php" class="small-box-footer">
                  Login <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
            <div class="col-md-6 latest-job">
              <div class="small-box bg-dark padding-5">
                <div class="inner">
                  <h3 class="text-center text-white">Company Login</h3>
                </div>
                <a href="login-company.php" class="small-box-footer">
                  Login <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php
    include("./Components/Footer.php");
    ?>

    <div class="control-sidebar-bg"></div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>
</body>

</html>