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
                    <li class="active"><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
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
              <h2><i>My Company</i></h2>
              <p>In this section you can change your company details</p>
              <div class="row">
                <form action="update-company.php" method="post" enctype="multipart/form-data">
                  <?php
                  $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      ?>
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label>Company Name</label>
                          <input type="text" class="form-control input-lg" name="companyname"
                            value="<?php echo $row['companyname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label>Website</label>
                          <input type="text" class="form-control input-lg" name="website"
                            value="<?php echo $row['website']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control input-lg" id="email" placeholder="Email"
                            value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>About Me</label>
                          <textarea class="form-control input-lg" rows="4"
                            name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-success">Update Company Profile</button>
                        </div>
                      </div>
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label for="contactno">Contact Number</label>
                          <input type="text" class="form-control input-lg" id="contactno" name="contactno"
                            placeholder="Contact Number" onkeypress="return validatePhone(event);" minlength="10"
                            maxlength="10" value="<?php echo $row['contactno']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control input-lg" id="city" name="city"
                            onkeypress="return validateName(event);" value="<?php echo $row['city']; ?>" placeholder="city">
                        </div>
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control input-lg" id="state"
                            onkeypress="return validateName(event);" name="state" placeholder="state"
                            value="<?php echo $row['state']; ?>">
                        </div>

                      </div>
                      <?php
                    }
                  }
                  ?>
                </form>
              </div>
              <?php if (isset($_SESSION['uploadError'])) { ?>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                  </div>
                </div>
                <?php unset($_SESSION['uploadError']);
              } ?>

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
  <script type="text/javascript">
    function validatePhone(event) {

      var key = window.event ? event.keyCode : event.which;

      if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
        return true;
      } else if (key < 48 || key > 57) {
        return false;
      } else return true;
    }

    function validateName(event) {

      var key = window.event ? event.keyCode : event.which;

      if (event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 32) {

        return true;
      } else if (key < 65 || key > 90 && key < 97 || key > 122) {
        return false;
      } else return true;
    }

  </script>
</body>

</html>