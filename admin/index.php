<?php

session_start();

if (isset($_SESSION['id_admin'])) {
  header("Location: dashboard.php");
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

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../index.php"><b>Job</b> Finder - Admin</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Admin Login</p>

      <form action="checklogin.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
        <?php
        if (isset($_SESSION['loginError'])) {
          ?>
          <div>
            <p class="text-center">Invalid Email/Password! Try Again!</p>
          </div>
          <?php
          unset($_SESSION['loginError']);
        }
        ?>

      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

</body>

</html>