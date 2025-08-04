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
<head>
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

 <?php include("vendor/inc/a-nav.php");?>


  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('vendor/inc/a-sidebar.php');?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <span>View Customer</span>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-users"></i>
    Registered Customer
    <a href="admin-add-user.php" class="btn btn-outline-primary btn-sm" style="background-color: #4e3b31; border: 2px solid black; color: white;">Add Customer</a>
  </div>
  <div class="card-body">
  <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
      <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #5C4B4B; color: white;">
          <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Email</th>
            <th>Cat Breed</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $ret = "SELECT * FROM tms_user WHERE u_category = 'User'";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute();
            $res = $stmt->get_result();
            $cnt = 1;
            while ($row = $res->fetch_object()) {
          ?>
            <tr>
              <td><?php echo $cnt; ?></td>
              <td><?php echo $row->u_fname; ?> <?php echo $row->u_lname; ?></td>
              <td><?php echo $row->u_phone; ?></td>
              <td><?php echo $row->u_addr; ?></td>
              <td><?php echo $row->u_email; ?></td>
              <td><?php echo $row->u_cat; ?></td>
            </tr>
          <?php 
              $cnt++;
            } 
          ?>
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
