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

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b>Job</b> Finder</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Candidates Login</p>

      <form method="post" action="checklogin.php">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <a href="#">I forgot my password</a>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
      </form>

      <br>

      <?php
      if (isset($_SESSION['registerCompleted'])) {
        ?>
        <div>
          <p id="successMessage" class="text-center">Check your email!</p>
        </div>
        <?php
        unset($_SESSION['registerCompleted']);
      }
      ?>
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

      <?php
      if (isset($_SESSION['userActivated'])) {
        ?>
        <div>
          <p class="text-center">Your Account Is Active. You Can Login</p>
        </div>
        <?php
        unset($_SESSION['userActivated']);
      }
      ?>

      <?php
      if (isset($_SESSION['loginActiveError'])) {
        ?>
        <div>
          <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
        </div>
        <?php
        unset($_SESSION['loginActiveError']);
      }
      ?>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  <script type="text/javascript">
    $(function () {
      $("#successMessage:visible").fadeOut(8000);
    });
  </script>
</body>

</html>