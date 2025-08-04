<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['a_id'];

  // Approve Booking
  if (isset($_POST['approve_booking'])) {
    $u_id = $_GET['u_id'];
    $u_car_book_status = $_POST['u_car_book_status'];
    
    $query = "UPDATE tms_user SET u_car_book_status=? WHERE u_id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('si', $u_car_book_status, $u_id);
    $stmt->execute();

    if ($stmt) {
      $succ = "Booking Approved";
    } else {
      $err = "Please Try Again Later";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/a-head.php'); ?>
<head>
<style>
  body {
    background-color: white; /* Dark Chocolate Background */
    color: #f3e0c7; /* Light Brown Text */
  }

  .breadcrumb {
      background-color: #3d2a1c;
      color: #f3e0c7;
    }

    .breadcrumb a {
      color: #d4a373;
    }

    .card-body {
    background-color: #3C2F2F; /* Coffee Brown */
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  }

  .card-header {
    background-color: #5C4033; /* Dark Brown */
    color: #f3e0c7;
    font-weight: bold;
  }

  .form-control {
    background-color: #d2b48c; /* Tan Background */
    color: #3C2F2F;
    border: 1px solid #b3864b;
    border-radius: 8px;
  }

  .btn {
    background-color: #4B3D3D;
    color: #f3e0c7;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s;
  }

  .btn:hover {
    background-color: #5C4033; /* Darker Brown on Hover */
  }
</style>
</head>

<body id="page-top">
  <!-- Start Navigation Bar -->
  <?php include("vendor/inc/a-nav.php"); ?>
  <!-- End Navigation Bar -->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/a-sidebar.php"); ?>
    <!-- End Sidebar -->

    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Success and Error Alerts -->
        <?php if (isset($succ)) { ?>
          <script>
            setTimeout(function() {
              swal("Success!", "<?php echo $succ; ?>!", "success");
            }, 100);
          </script>
        <?php } ?>
        
        <?php if (isset($err)) { ?>
          <script>
            setTimeout(function() {
              swal("Failed!", "<?php echo $err; ?>!", "error");
            }, 100);
          </script>
        <?php } ?>

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="#">Manage Bookings</a>
          </li>
          </ol>

        <!-- Approve Booking Card -->
        <div class="card">
          <div class="card-header">Approve Booking</div>
          <div class="card-body">

            <!-- Form to Approve Booking -->
            <?php
              $aid = $_GET['u_id'];
              $ret = "SELECT * FROM tms_user WHERE u_id = ?";
              $stmt = $mysqli->prepare($ret);
              $stmt->bind_param('i', $aid);
              $stmt->execute();
              $res = $stmt->get_result();

              while ($row = $res->fetch_object()) {
            ?>
              <form method="POST">
    <div class="form-group">
        <label for="u_fname" class="text-white">First Name</label>
        <input type="text" readonly value="<?php echo $row->u_fname; ?>" class="form-control" name="u_fname">
    </div>

    <div class="form-group">
        <label for="u_lname" class="text-white">Last Name</label>
        <input type="text" readonly value="<?php echo $row->u_lname; ?>" class="form-control" name="u_lname">
    </div>

    <div class="form-group">
        <label for="u_phone" class="text-white">Contact</label>
        <input type="text" readonly value="<?php echo $row->u_phone; ?>" class="form-control" name="u_phone"readonly>
    </div>

    <div class="form-group">
        <label for="u_addr" class="text-white">Address</label>
        <input type="text" readonly value="<?php echo $row->u_addr; ?>" class="form-control" name="u_addr"readonly>
    </div>

    <div class="form-group">
        <label for="u_email" class="text-white">Email Address</label>
        <input type="email" readonly value="<?php echo $row->u_email; ?>" class="form-control" name="u_email"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_type" class="text-white">Category Rooms</label>
        <input type="text" readonly value="<?php echo $row->u_car_type; ?>" class="form-control" name="u_car_type"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_regno" class="text-white">Price Rooms</label>
        <input type="text" readonly value="<?php echo $row->u_car_regno; ?>" class="form-control" name="u_car_regno"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_bookdate" class="text-white">Booking Date</label>
        <input type="text" readonly value="<?php echo $row->u_car_bookdate; ?>" class="form-control" name="u_car_bookdate"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_booktime" class="text-white">Check In</label>
        <input type="text" readonly value="<?php echo $row->u_car_booktime; ?>" class="form-control" name="u_car_booktime"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_returntime" class="text-white">Check Out</label>
        <input type="text" readonly value="<?php echo $row->u_car_returntime; ?>" class="form-control" name="u_car_returntime"readonly>
    </div>

    <div class="form-group">
        <label for="u_car_book_status" class="text-white">Status</label>
        <select class="form-control" name="u_car_book_status" id="u_car_book_status"readonly>
            <option>Approved</option>
            <option>Pending</option>
        </select>
    </div>

    <button type="submit" name="approve_booking" class="btn btn-success">Approve Booking</button>
</form>

            <?php } ?>

          </div>
        </div>

        <!-- Sticky Footer -->
        <?php include("vendor/inc/a-footer.php"); ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-danger" href="admin-logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="vendor/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="vendor/js/demo/datatables-demo.js"></script>
    <script src="vendor/js/swal.js"></script>

</body>

</html>
