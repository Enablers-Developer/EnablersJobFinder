<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include("../header.php");
  ?>
</head>

<body class="hold-transition skin-white sidebar-mini">
  <div class="wrapper">

    <?php
    $excludeJobs = true;
    $excludeCompany = true;
    $excludeAboutUs = true;
    $links = true;
    include("../Components/Navbar.php");
    ?>

    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b>Admin</b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                    <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                    <li><a href="companies.php"><i class="fa fa-building"></i> Companies</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">

              <h3>Job Portal Statistics</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Active Company Registered</span>
                      <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pending Company Approval</span>
                      <?php
                      $sql = "SELECT * FROM company WHERE active='2'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Registered Candidates</span>
                      <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Pending Candidates Confirmation</span>
                      <?php
                      $sql = "SELECT * FROM users WHERE active='0'";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Job Posts</span>
                      <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-browsers"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Total Applications</span>
                      <?php
                      $sql = "SELECT * FROM apply_job_post";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $totalno; ?></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>



    </div>

    <?php include("../Components/Footer.php"); ?>


    <div class="control-sidebar-bg"></div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/adminlte.min.js"></script>
</body>

</html>