<?php
session_start();
if (empty($_SESSION['id_user'])) {
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
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                    <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                    <li><a href="../index.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <h2><i>Edit Profile</i></h2>
              <form action="update-profile.php" method="post" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="row">
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label for="fname">First Name</label>
                          <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name"
                            onkeypress="return validateName(event);" value="<?php echo $row['firstname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="lname">Last Name</label>
                          <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name"
                            onkeypress="return validateName(event);" value="<?php echo $row['lastname']; ?>" required="">
                        </div>
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control input-lg" id="email" placeholder="Email"
                            value="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" name="address" class="form-control input-lg" rows="5"
                            placeholder="Address"><?php echo $row['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="city">City</label>
                          <input type="text" class="form-control input-lg" id="city" name="city"
                            onkeypress="return validateName(event);" value="<?php echo $row['city']; ?>" placeholder="city">
                        </div>
                        <div class="form-group">
                          <label for="state">State</label>
                          <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state"
                            onkeypress="return validateName(event);" value="<?php echo $row['state']; ?>">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-flat btn-success">Update Profile</button>
                        </div>
                      </div>
                      <div class="col-md-6 latest-job ">
                        <div class="form-group">
                          <label for="contactno">Contact Number</label>
                          <input type="text" class="form-control input-lg" id="contactno" name="contactno"
                            placeholder="Contact Number" onkeypress="return validatePhone(event);" maxlength="10"
                            minlength="10" value="<?php echo $row['contactno']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="qualification">Highest Qualification</label>
                          <input type="text" class="form-control input-lg" id="qualification" name="qualification"
                            placeholder="Highest Qualification" value="<?php echo $row['qualification']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="stream">Stream</label>
                          <input type="text" class="form-control input-lg" id="stream" name="stream" placeholder="stream"
                            value="<?php echo $row['stream']; ?>">
                        </div>
                        <div class="form-group">
                          <label>Skills</label>
                          <textarea class="form-control input-lg" rows="4" name="skills"
                            onkeypress="return validateName(event);"><?php echo $row['skills']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label>About Me</label>
                          <textarea class="form-control input-lg" rows="4"
                            name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Upload/Change Resume</label>
                          <input type="file" name="resume" class="btn btn-default">
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                }
                ?>
              </form>
              <?php if (isset($_SESSION['uploadError'])) { ?>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
                  </div>
                </div>
              <?php } ?>
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
      if (event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39) {
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