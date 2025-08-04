<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/a-head.php');?>

<body id="page-top">

 <?php include("vendor/inc/a-nav.php");?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/a-sidebar.php');?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="#" style="color: gray;">View Bookings</a>
          </li>
          </ol>

        <!--Bookings-->
        <div class="card mb-3">
    <div class="card-header" style="background-color: #4B3D3D; color: white;">
        <i class="fas fa-book"></i>
        Bookings
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: #5C4B4B; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Reg No</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody style="background-color: #fbffc0;">
                <?php
                    $ret = "SELECT * FROM tms_user WHERE u_car_book_status = 'Approved' OR u_car_book_status = 'Pending'"; 
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    $cnt = 1;
                    while ($row = $res->fetch_object()) {
                ?>
                    <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row->u_fname . ' ' . $row->u_lname; ?></td>
                        <td><?php echo $row->u_phone; ?></td>
                        <td><?php echo $row->u_car_type; ?></td>
                        <td><?php echo $row->u_car_regno; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($row->u_car_bookdate)); ?></td>
                        <td>
                            <?php if ($row->u_car_book_status == "Pending") {
                                echo '<span class="badge badge-warning">' . $row->u_car_book_status . '</span>';
                            } else {
                                echo '<span class="badge badge-success">' . $row->u_car_book_status . '</span>';
                            } ?>
                        </td>
                    </tr>
                <?php $cnt++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">
        <?php
            date_default_timezone_set("Asia/Kuala_Lumpur");
            echo "Updated: " . date("h:i A");
        ?>
    </div>
</div>

      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include("vendor/inc/a-footer.php");?>
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
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
