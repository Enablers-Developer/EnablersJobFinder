<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");



$sql1 = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  $row = $result1->fetch_assoc();
}

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
            <div class="col-md-9 bg-white padding-2">
              <div class="pull-left">
                <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
              </div>
              <div class="pull-right">
                <a href="active-jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i
                    class="fa fa-arrow-circle-left"></i> Back</a>
              </div>
              <div class="clearfix"></div>
              <hr>
              <div>
                <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i>
                    <?php echo $row['city']; ?></span> <i class="fa fa-calendar text-green"></i>
                  <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>
              </div>
              <div>
                <?php echo stripcslashes($row['description']); ?>
              </div>


            </div>
            <div class="col-md-3">
              <div class="thumbnail">
                <div class="caption text-center">
                  <h3><?php echo $row['companyname']; ?></h3>
                  <hr>
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

    <div class="control-sidebar-bg"></div>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/adminlte.min.js"></script>
</body>

</html>