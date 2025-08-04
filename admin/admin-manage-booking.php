<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['a_id'];
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<?php include('vendor/inc/a-head.php'); ?>
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
      body {
        background-color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        height: 100%;
        margin: 0;
        padding: 0;
        display: flex; /* Use flexbox */
        flex-direction: column; /* Column direction */
    }
    
    #wrapper {
        flex: 1; /* Allow wrapper to grow and take available space */
    }

    .breadcrumb {
      background-color: #3d2a1c;
      color: #f3e0c7;
    }

    .breadcrumb a {
      color: #d4a373;
    }
    
    .card {
        border-radius: 12px;
        background-color: #C4A484; 
        color: white;
    }

    .card-header {
      background-color: #C4A484; 
      color: white;
    }
    
    .card-footer {
        background-color: #C4A484;
        font-weight: bold;
        color: #d7ccc8;
    }

    .table {
        background-color: #fdf5e6; /* Cream color for table background */
        color: black; /* Text color */
    }

    .table thead th {
        background-color: #4e3b31; /* Dark brown for header */
        color: white; /* White text color for contrast */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fdf5e6; /* Cream color for odd rows */
    }
    
    .table-hover tbody tr:hover {
        background-color: #f5f5f5; /* Lighter shade for hover effect */
    }
    
    .badge-success {
        background-color: #28a745;
    }
    
    .badge-danger {
        background-color: #dc3545;
    }
 </style>
</head>

<body id="page-top">
  <?php include("vendor/inc/a-nav.php"); ?>

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('vendor/inc/a-sidebar.php'); ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Manage Bookings</a>
          </li>
        </ol>

        <!-- Bookings Section -->
        <div class="card">
          <div class="card-header">
            <i class="fas fa-book"></i> Bookings
          </div>
          <div class="card-body">
          <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Package</th>
                    <th>Category Room</th>
                    <th>Price Room</th>
                    <th>Booking Date</th>
                    <th>End Date</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
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
                    <td><?php echo $row->u_package; ?></td>
                    <td><?php echo $row->u_car_type; ?></td>
                    <td><?php echo $row->u_car_regno; ?></td>
                    <td><?php echo $row->u_car_bookdate ? date("d/m/Y", strtotime($row->u_car_bookdate)) : ''; ?></td>
                    <td><?php echo $row->u_enddate ? date("d/m/Y", strtotime($row->u_enddate)) : ''; ?></td>
                    <td><?php echo $row->u_car_booktime; ?></td>
                    <td><?php echo $row->u_car_returntime; ?></td>
                    <td>
                      <?php
                        if ($row->u_car_book_status == "Pending") {
                          echo '<span class="badge badge-warning">' . $row->u_car_book_status . '</span>';
                        } else {
                          echo '<span class="badge badge-success">' . $row->u_car_book_status . '</span>';
                        }
                      ?>
                    </td>
                    <td>
                      <a href="print_booking.php?u_id=<?php echo $row->u_id; ?>" 
                         data-toggle="tooltip" data-placement="left" title="Print">
                        <i class="bi bi-printer-fill text-success" style="font-size: 20px; margin-right: 5px;"></i>
                      </a>
                      <a href="admin-approve-booking.php?u_id=<?php echo $row->u_id; ?>" 
                         class="badge badge-success" 
                         style="background-color: green; color: white; text-decoration: none; margin-right: 5px;">
                        <i class="fa fa-check"></i> Approve
                      </a>
                      <a href="admin-delete-booking.php?u_id=<?php echo $row->u_id; ?>" 
                         class="badge badge-danger" 
                         style="color: white; text-decoration: none;">
                        <i class="fa fa-trash"></i> Delete
                      </a>
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
               echo "Updated: " . date("h:i:sa");
            ?>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <?php include("vendor/inc/a-footer.php"); ?>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Tooltip Initialization -->
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</body>
</html>


</html>
