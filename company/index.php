<?php

session_start();

if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
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

<body class="hold-transition skin-green sidebar-mini">
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
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">

              <h3>Overview</h3>
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-info"></i> In this dashboard you are able to change your account settings, post and
                manage your jobs. Got a question? Do not hesitate to drop us a mail.
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Job Posted</span>
                      <?php
                      $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        $total = $result->num_rows;
                      } else {
                        $total = 0;
                      }

                      ?>
                      <span class="info-box-number"><?php echo $total; ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box bg-c-yellow">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-browsers"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Application For Jobs</span>
                      <?php
                      $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]'";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        $total = $result->num_rows;
                      } else {
                        $total = 0;
                      }
                      ?>
                      <span class="info-box-number"><?php echo $total; ?></span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>



    </div>

    <?php
    include("../Components/Footer.php");
    ?>



  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/adminlte.min.js"></script>
</body>

</html>