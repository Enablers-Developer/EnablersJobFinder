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
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                    <li class="active"><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a>
                    </li>
                    <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <h2><i>Create Job Post</i></h2>
              <div class="row">
                <form method="post" action="addpost.php">
                  <div class="col-md-12 latest-job ">
                    <div class="form-group">
                      <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle"
                        placeholder="Job Title">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control input-lg" id="description" name="description"
                        placeholder="Job Description"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" max="1000000"
                        autocomplete="off" name="minimumsalary" placeholder="Minimum Salary" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary"
                        min="1000" max="1000000" placeholder="Maximum Salary" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control  input-lg" id="experience" autocomplete="off"
                        name="experience" placeholder="Experience (in Years) Required" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control  input-lg" id="qualification" name="qualification"
                        placeholder="Qualification Required" required="">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-flat btn-success">Create</button>
                    </div>
                  </div>
                </form>
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