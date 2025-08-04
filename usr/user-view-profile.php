<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['u_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('vendor/inc/head.php'); ?>
<!--End Head-->

<style>
  /* Aesthetic Dark Chocolate and Light Brown Theme */
  body {
    background-color: white; /* Dark Chocolate */
    color: #f3e0c7; /* Light Brown Text */
  }

  .breadcrumb {
    background-color: #3d2a1c;
    color: #f3e0c7;
  }

  .breadcrumb a {
    color: #d4a373;
  }

  .card {
    background-color: #3d2a1c; /* Darker Chocolate for Cards */
    border: none;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    color: #f3e0c7;
  }

  .card h5 {
    font-weight: 700;
    color: #d4a373;
  }

  .list-group-item {
    background-color: #3d2a1c;
    border: none;
    color: #f3e0c7;
  }

  .list-group-item b {
    color: #d4a373;
  }

  .btn-outline-primary {
    border-color: #d4a373;
    color: #d4a373;
  }

  .btn-outline-primary:hover {
    background-color: #d4a373;
    color: #3d2a1c;
  }

  .scroll-to-top {
    background-color: #d4a373;
    color: #3d2a1c;
  }
</style>

<body id="page-top">
  <!--Navbar-->
  <?php include('vendor/inc/nav.php'); ?>
  <!--End Navbar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/sidebar.php'); ?>
    <!--End Sidebar-->

    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item ">View Profile</li>
        </ol>

        <?php
          $aid = $_SESSION['u_id'];
          $ret = "SELECT * FROM tms_user WHERE u_id=?";
          $stmt = $mysqli->prepare($ret);
          $stmt->bind_param('i', $aid);
          $stmt->execute();
          $res = $stmt->get_result();

          while ($row = $res->fetch_object()) {
        ?>
        <!-- Profile Details -->
        <div class="card col-md-8 mx-auto my-5">
          <div class="card-body text-center">
            <h5 class="card-title"><?php echo $row->u_fname . ' ' . $row->u_lname; ?></h5>
          </div>

          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <b>Address:</b> <?php echo $row->u_addr; ?>
            </li>
            <li class="list-group-item">
              <b>Contact:</b> <?php echo $row->u_phone; ?>
            </li>
            <li class="list-group-item">
              <b>Email Address:</b> <?php echo $row->u_email; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Breed:</b> <?php echo $row->u_cat; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Name:</b> <?php echo $row->u_cat_name; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Gender:</b> <?php echo $row->u_cat_gender; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Coat Type:</b> <?php echo $row->u_cat_coat; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Spayed:</b> <?php echo $row->u_cat_spayed; ?>
            </li>
          </ul>
          <li class="list-group-item">
              <b>Cat Weight:</b> <?php echo $row->u_cat_weight. 'kg'; ?>
            </li>
          </ul>

          <div class="card-body text-center">
            <a href="user-update-profile.php" class="btn btn-outline-primary mx-2">
              <i class="fa fa-user-edit"></i> Update Profile
            </a>
            <a href="user-cat-profile.php" class="btn btn-outline-primary mx-2">
              <i class="fas fa-cat"></i> Update Cat Profile
            </a>
            <a href="user-change-pwd.php" class="btn btn-outline-primary mx-2">
              <i class="fa fa-key"></i> Change Password
            </a>
          </div>
        </div>
        <?php } ?>

        <!-- Sticky Footer -->
        <?php include("vendor/inc/footer.php"); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="user-logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="vendor/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page -->
    <script src="vendor/js/demo/datatables-demo.js"></script>
    <script src="vendor/js/demo/chart-area-demo.js"></script>

</body>
</html>
