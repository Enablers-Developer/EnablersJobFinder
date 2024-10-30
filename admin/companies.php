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
                    <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                    <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                    <li class="active"><a href="companies.php"><i class="fa fa-building"></i> Companies</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">

              <h3>Companies</h3>
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-hover">
                      <thead>
                        <th>Company Name</th>
                        <th>Account Creator Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * FROM company";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                              <td><?php echo $row['companyname']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['contactno']; ?></td>
                              <td><?php echo $row['city']; ?></td>
                              <td><?php echo $row['state']; ?></td>
                              <td><?php echo $row['country']; ?></td>
                              <td>
                                <?php
                                if ($row['active'] == '1') {
                                  echo "Activated";
                                } else if ($row['active'] == '2') {
                                  ?>
                                    <a href="reject-company.php?id=<?php echo $row['id_company']; ?>">Reject</a> <a
                                      href="approve-company.php?id=<?php echo $row['id_company']; ?>">Approve</a>
                                  <?php
                                } else if ($row['active'] == '3') {
                                  ?>
                                      <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>
                                  <?php
                                } else if ($row['active'] == '0') {
                                  echo "Rejected";
                                }
                                ?>
                              </td>
                              <td><a href="delete-company.php?id=<?php echo $row['id_company']; ?>">Delete</a></td>
                            </tr>
                            <?php
                          }
                        }
                        ?>
                      </tbody>
                    </table>
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
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="../js/adminlte.min.js"></script>

  <script>
    $(function () {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>