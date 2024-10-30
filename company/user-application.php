<?php
session_start();
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}
require_once("../db.php");
$sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]' AND id_user='$_GET[id]'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
  header("Location: index.php");
  exit();
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
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                    <li class="active"><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM users WHERE id_user='$_GET[id]'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>
                      <div class="pull-left">
                        <h2><b><i><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></i></b></h2>
                      </div>
                      <div class="pull-right">
                        <a href="job-applications.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i
                            class="fa fa-arrow-circle-left"></i> Back</a>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      <div>
                        <?php
                        echo 'Email: ' . $row['email'];
                        echo '<br>';
                        echo 'City: ' . $row['city'];
                        echo '<br>';
                        if ($row['resume'] != "") {
                          echo '<a href="../uploads/resume/' . $row['resume'] . '" class="btn btn-info" download="Resume">Download Resume</a>';
                        }
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        ?>
                        <div class="row">
                          <div class="col-md-3 pull-left">
                            <a href="under-review.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>"
                              class="btn btn-success">Mark Under Review</a>
                          </div>
                          <div class="col-md-3 pull-right">
                            <a href="reject.php?id=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $_GET['id_jobpost']; ?>"
                              class="btn btn-danger">Reject Application</a>
                          </div>
                        </div>
                      </div>

                      <div>
                      </div>
                      <?php
                    }
                  }
                  ?>
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
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="../js/adminlte.min.js"></script>

</body>

</html>