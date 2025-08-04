<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['a_id'];
?>

<style>
/* Your existing styles here */
.card {
    transition: all 0.3s ease-in-out;
    border-radius: 12px;
    background-color: #4e3b31; /* Card background color */
    color: black; /* Text color for better contrast */
}
.card:hover {
    transform: scale(1.05);
}
.card-footer {
    background-color: #4e3b31;
    font-weight: bold;
}

.breadcrumb {
      background-color: #3d2a1c;
      color: #f3e0c7;
    }

.breadcrumb a {
      color: #d4a373;
    }
.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}
.badge-success {
    background-color: #28a745;
}
.badge-danger {
    background-color: #dc3545;
}
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    display: flex;          /* Use flexbox */
    flex-direction: column; /* Column direction */
}
#wrapper {
    flex: 1;               /* Allow wrapper to grow and take available space */
}
.footer {
    margin-top: auto;      /* Push footer to the bottom */
}
/* Sticky footer */
.footer {
    background-color: #f39c12;
    color: brown;
    text-align: center;
    padding: 10px 0;
    position: relative; /* Prevents overlap */
    bottom: 0;
    width: 100%;
    margin-top: auto; /* Push footer to the bottom */
}
/* Table styles */
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #efebe9; /* Subtle brownish-beige for table rows */
}

/* Table header style */
.table thead th {
    background-color: #4e3b31; /* Dark brown for header */
    color: white; /* White text color for contrast */
}

/* Table body row style */
.table tbody tr {
 background-color: #fdf5e6; 
 color: black;
}

/* Optional: Change hover effect for table rows */
.table-hover tbody tr:hover {
    background-color: #e6d8c3; /* Lighter shade for hover effect */
}
.custom-footer-link {
    color: #4e3b31; 
    text-decoration: none;
    font-weight: bold;
}

.custom-footer-link:hover {
    color: #f3e0c7; 
}

</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Vehicle Booking System Transport Saccos, Matatu Industry">
  <meta name="author" content="MartDevelopers">

  <title> HAKIEMI'S E-BOOKING CAT HOTEL - Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">
  <!--Start Navigation Bar-->
  <?php include("vendor/inc/a-nav.php"); ?>
  <!--Navigation Bar-->

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include("vendor/inc/a-sidebar.php"); ?>
    <!--End Sidebar-->
    
    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="background-color: #3d2a1c; color: #f3e0c7;">
        <li class="breadcrumb-item">
                <a href="user-dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Overview</li>
        </ol>

        <div class="row text-center">
    <?php
    $cards = [
        [
            'title' => 'Customer', 
            'icon' => 'fas fa-users', 
            'link' => 'admin-view-user.php',
            'query' => "SELECT count(*) FROM tms_user WHERE u_category = 'User'"
        ],
        [
            'title' => 'Room', 
            'icon' => 'fas fa-cat', 
            'link' => 'admin-view-vehicle.php',
            'query' => "SELECT count(*) FROM tms_vehicle"
        ],
        [
            'title' => 'Booking', 
            'icon' => 'fas fa-address-book', 
            'link' => 'admin-view-booking.php',
            'query' => "SELECT count(*) FROM tms_user WHERE u_car_book_status = 'Approved' OR u_car_book_status = 'Pending'"
        ]
    ];

    foreach ($cards as $card) {
        // Execute the query for each card
        $stmt = $mysqli->prepare($card['query']);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
    ?>
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card border-0 shadow-sm h-100" style="background-color: #D2B48C;">
                <div class="card-body d-flex align-items-center justify-content-center flex-column">
                    <div class="card-body-icon mb-3">
                        <i class="<?php echo $card['icon']; ?> fa-1x"></i>
                    </div>
                    <h5 class="card-title">
                        <span class="badge badge-secondary"><?php echo $count; ?></span> 
                        <?php echo $card['title']; ?>
                    </h5>
                </div>
                <a class="card-footer text-center custom-footer-link" href="<?php echo $card['link']; ?>">
                    View Details <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    <?php } ?>
</div>


        <!--Bookings Table-->
        <div class="card mb-3" style="border: none;">
  <div class="card-header" style="background-color: #4B3D3D; color: white; font-weight: bold; font-size: 1.5em;">
    <i class="fas fa-table"></i>
    Bookings
  </div>
  <div class="card-body" style="background: #f8f9fa; color: black;">
  <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
      <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead style="background-color: #5C4B4B; color: white;">
          <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Phone</th>
            <th>Package</th>
            <th>Category Room</th>
            <th>Price Room</th>
            <th>Booking Date</th>
            <th>End Date</th>
            <th>Check In Time</th>
            <th>Check Out Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody style="background-color: #fdf5e6; color: black;"> <!-- Creamy color -->
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
                echo '<span class="badge" style="background-color: orange; color: white;">' . $row->u_car_book_status . '</span>'; 
              } else {
                echo '<span class="badge" style="background-color: #28a745; color: white;">' . $row->u_car_book_status . '</span>'; 
              } 
              ?>
            </td>
          </tr>
          <?php $cnt++; } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted" style="background-color: #4B3D3D; color: white;">
                    <?php 
                        date_default_timezone_set('Asia/Kuala_Lumpur'); // Set Malaysian time zone
                        $currentTime = date("h:i:sa"); // Get current time in 12-hour format with am/pm
                    ?>
                    <span style="font-weight: bold; color: white;">Generated at: <?php echo $currentTime; ?></span>
                </div>


    </div>
    <!-- /.container-fluid -->

    <!-- Footer -->
    <?php include("vendor/inc/a-footer.php"); ?>
    <!-- End Footer -->

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
                <h5 class="modal-title">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="admin-logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/js/sb-admin.min.js"></script>

</body>

</html>
