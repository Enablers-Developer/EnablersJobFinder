<?php
session_start();
require_once("db.php");
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include("header.php");
  ?>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div>

    <?php
    $excludeCompany = true;
    $excludeJobs = true;
    $excludeJobs2 = true;
    $excludeAboutUs = true;
    include("./Components/Navbar.php");
    ?>

    <div class="content-wrapper" style="margin-left: 0px;">
      <!-- Starting of the searchbar section -->
      <section class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
              <h1 class="text-center fw-bold">Latest Jobs</h1>
              <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Ending of the searchbar section -->

      <!-- Starting of filter section -->
      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Filters</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                    <li class="treeview menu-open">
                      <a href="#"><i class="fa fa-plane text-red"></i> City <span class="pull-right"><i
                            class="fa fa-angle-down pull-right"></i></span></a>
                      <ul class="treeview-menu">
                        <li><a href="" class="citySearch" data-target="Lahore"><i
                              class="fa fa-circle-o text-yellow"></i> Lahore</a></li>
                        <li><a href="" class="citySearch" data-target="Islamabad"><i
                              class="fa fa-circle-o text-yellow"></i> Islamabad</a></li>
                        <li><a href="" class="citySearch" data-target="Karachi"><i
                              class="fa fa-circle-o text-yellow"></i> Karachi</a></li>
                        <li><a href="" class="citySearch" data-target="Faisalabad"><i
                              class="fa fa-circle-o text-yellow"></i> Faisalabad</a></li>
                        <li><a href="" class="citySearch" data-target="multan"><i
                              class="fa fa-circle-o text-yellow"></i> Multan</a></li>
                      </ul>
                    </li>
                    <li class="treeview menu-open">
                      <a href="#"><i class="fa fa-plane text-red"></i> Experience <span class="pull-right"><i
                            class="fa fa-angle-down pull-right"></i></span></a>
                      <ul class="treeview-menu">
                        <li><a href="" class="experienceSearch" data-target='1'><i
                              class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                        <li><a href="" class="experienceSearch" data-target='2'><i
                              class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                        <li><a href="" class="experienceSearch" data-target='3'><i
                              class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                        <li><a href="" class="experienceSearch" data-target='4'><i
                              class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                        <li><a href="" class="experienceSearch" data-target='5'><i
                              class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Ending of the filter section -->


            <!-- Starting of the jobs section -->
            <div class="col-md-9">
              <?php

              $limit = 4;

              $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $total_records = $row['id'];
                $total_pages = ceil($total_records / $limit);
              } else {
                $total_pages = 1;
              }

              ?>
              <div id="target-content">

              </div>
              <div class="text-center">
                <ul class="pagination text-center" id="pagination"></ul>
              </div>

            </div>
          </div>
        </div>
        <!-- Ending of the job post section -->
      </section>



    </div>

    <?php
    include("./Components/Footer.php");
    ?>

    <div class="control-sidebar-bg"></div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/adminlte.min.js"></script>
  <script src="js/jquery.twbsPagination.min.js"></script>

  <script>
    function Pagination() {
      $("#pagination").twbsPagination({
        totalPages: <?php echo $total_pages; ?>,
        visible: 5,
        onPageClick: function (e, page) {
          e.preventDefault();
          $("#target-content").html("loading....");
          $("#target-content").load("jobpagination.php?page=" + page);
        }
      });
    }
  </script>

  <script>
    $(function () {
      Pagination();
    });
  </script>

  <script>
    $("#searchBtn").on("click", function (e) {
      e.preventDefault();
      var searchResult = $("#searchBar").val();
      var filter = "searchBar";
      if (searchResult != "") {
        $("#pagination").twbsPagination('destroy');
        Search(searchResult, filter);
      } else {
        $("#pagination").twbsPagination('destroy');
        Pagination();
      }
    });
  </script>

  <script>
    $(".experienceSearch").on("click", function (e) {
      e.preventDefault();
      var searchResult = $(this).data("target");
      var filter = "experience";
      if (searchResult != "") {
        $("#pagination").twbsPagination('destroy');
        Search(searchResult, filter);
      } else {
        $("#pagination").twbsPagination('destroy');
        Pagination();
      }
    });
  </script>

  <script>
    $(".citySearch").on("click", function (e) {
      e.preventDefault();
      var searchResult = $(this).data("target");
      var filter = "city";
      if (searchResult != "") {
        $("#pagination").twbsPagination('destroy');
        Search(searchResult, filter);
      } else {
        $("#pagination").twbsPagination('destroy');
        Pagination();
      }
    });
  </script>

  <script>
    function Search(val, filter) {
      $("#pagination").twbsPagination({
        totalPages: <?php echo $total_pages; ?>,
        visible: 5,
        onPageClick: function (e, page) {
          e.preventDefault();
          val = encodeURIComponent(val);
          $("#target-content").html("loading....");
          $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" + filter);
        }
      });
    }
  </script>


</body>

</html>