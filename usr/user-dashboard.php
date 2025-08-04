<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];
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

<!--Head-->
<?php include('vendor/inc/head.php'); ?>
<!--End Head-->

<body id="page-top">
<!--Navbar-->

<!--End Navbar-->
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
        <ol class="breadcrumb" style="background-color: #3d2a1c;">
            <li class="breadcrumb-item">
                <a href="user-dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row text-center">
            <?php
            $cards = [
                ['My Profile', 'fas fa-user', 'user-view-profile.php', 'View Details'],
                ['My Booking', 'fas fa-clipboard', 'user-view-booking.php', 'View Details'],
                ['Manage Booking', 'fas fa-address-book', 'user-manage-booking.php', 'View Details'],
                ['Room', 'fas fa-cat', 'usr-book-vehicle.php', 'View Details']
            ];
            foreach ($cards as $card) { ?>
                <div class="col-xl-3 col-sm-6 mb-4">
                    <div class="card border-0 shadow-sm h-100"style="background-color: #D2B48C; o-hidden h-100";>

                    <div class="card-body d-flex align-items-center justify-content-center flex-column" style="background-color: #D2B48C; o-hidden h-100";>
                            <div class="card-body-icon mb-3">
                                <i class="<?php echo $card[1]; ?> fa-1x"></i>
                            </div>
                            <h5 class="card-title"><?php echo $card[0]; ?></h5>
                        </div>
                        <a class="card-footer text-center custom-footer-link" href="<?php echo $card[2]; ?>">
                            <?php echo $card[3]; ?> <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--Bookings Table-->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-black"style="background-color: #4B3D3D; color: white; font-weight: bold; font-size: 1.5em";>
                <i class="fas fa-bed"></i> List of Room
            </div>
            <div class="card-body">
              <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hover">
                        <thead class="thead-black">
                            <tr>
                                <th>No</th>
                                <th>Package</th>
                                <th>Category Room</th>
                                <th>Price Room</th>
                                <th>View Room</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ret = "SELECT * FROM tms_vehicle";
                            $stmt = $mysqli->prepare($ret);
                            $stmt->execute();
                            $res = $stmt->get_result();
                            $cnt = 1;
                            while ($row = $res->fetch_object()) {
                            ?>
                               <tr>
                                        <td><?php echo $cnt++; ?></td>
                                        <td><?php echo htmlspecialchars($row->v_package); ?></td>
                                        <td><?php echo htmlspecialchars($row->v_category); ?></td>
                                        <td><?php echo htmlspecialchars($row->v_name); ?></td>
                                        <td>
                                <a href="gallery.php" class="btn btn-primary btn-sm">
                                    View Gallery
                                </a>
                            </td>
                            <td>
                                            <span class="badge <?php echo $row->v_status == 'Available' ? 'badge-success' : 'badge-danger'; ?>">
                                                <?php echo htmlspecialchars($row->v_status); ?>
                                            </span>
                                        </td>
                                    </tr>
                            <?php } ?>
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
    <?php include("vendor/inc/footer.php"); ?>
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
                <a class="btn btn-danger" href="user-logout.php">Logout</a>
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
