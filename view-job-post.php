<!-- Staring of the PHP Script -->
<?php
session_start();
require_once("db.php");
?>
<!-- Ending of the PHP Script -->

<!-- Starting of the HTML Code -->
<!DOCTYPE html>
<html>

<head>
  <?php
  include("header.php");
  ?>
</head>

<!-- Starting of the main code in the body -->

<body class="hold-transition skin-white  sidebar-mini">
  <div>

    <!-- Starting of the PHP Script for Navbar -->
    <?php
    $excludeCompany = true;
    $excludeAboutUs = true;
    include("./Components/Navbar.php");
    ?>
    <!-- Ending of the PHP Script Navbar -->

    <div class="content-wrapper" style="margin-left: 0px;">

      <!-- Starting of the PHP Script for Details of jobpost (SQL Query) -->
      <?php
      $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          ?>
          <section id="candidates" class="content-header">
            <div class="container">
              <div class="row">
                <div class="col-md-9 bg-white padding-2">
                  <div class="pull-left">
                    <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
                  </div>
                  <div class="pull-right">
                    <a href="jobs.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i
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
                  <?php
                  if (isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
                    <div>
                      <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>"
                        class="btn btn-success btn-flat margin-top-50">Apply</a>
                    </div>
                  <?php } ?>


                </div>
                <div class="col-md-3">
                  <div class="thumbnail">
                    <div class="caption text-center">
                      <h3><?php echo $row['companyname']; ?></h3>
                      <p><a href="#" class="btn btn-primary btn-flat" role="button">More Info</a>
                        <hr>
                      <div class="row">
                        <div class="col-md-4"><a href=""><i class="fa fa-address-card-o"></i> Apply</a></div>
                        <div class="col-md-4"><a href=""><i class="fa fa-warning"></i> Report</a></div>
                        <div class="col-md-4"><a href=""><i class="fa fa-envelope"></i> Email</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <?php
        }
      }
      ?>
    </div>

    <!-- Starting of the Footer component -->
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

<!-- Ending of the HTML Code -->