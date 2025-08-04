<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php'); ?>

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
        background-color: #C4A484; /* Card background color */
        color: white; /* Text color for better contrast */
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

<body id="page-top">
    <?php include('vendor/inc/nav.php'); ?>

    <div id="wrapper">
        <?php include('vendor/inc/sidebar.php'); ?>

        <div id="content-wrapper">
            <div class="container-fluid">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="user-dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">Room List</li>
                    <li class="breadcrumb-item">Room Package</li>
                </ol>

                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-cat"></i> Available Room
                    </div>
                    <div class="card-body">
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Package</th>
                                        <th>Price Room</th>
                                        <th>Cat Pax</th>
                                        <th>Category Room</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ret = "SELECT * FROM tms_vehicle WHERE v_status = 'Available'";
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    $cnt = 1;
                                    while ($row = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>
                                            <td><?php echo htmlspecialchars($row->v_package); ?></td>
                                            <td><?php echo htmlspecialchars($row->v_name); ?></td>
                                            <td><?php echo htmlspecialchars($row->v_reg_no); ?></td>
                                            <td><?php echo htmlspecialchars($row->v_category); ?></td>
                                            <td><?php if ($row->v_status == "Available") {
                                                echo '<span class="badge badge-success">' . $row->v_status . '</span>';
                                            } else {
                                                echo '<span class="badge badge-danger">' . $row->v_status . '</span>';
                                            } ?></td>
                                        </tr>
                                    <?php $cnt++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        <?php
                        date_default_timezone_set("Asia/Kuala_Lumpur");
                        echo "Generated At: " . date("h:i:sa");
                        ?>
                    </div>
                </div>

            </div>
            <?php include('vendor/inc/footer.php'); ?>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-danger" href="user-logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="vendor/js/sb-admin.min.js"></script>
    <script src="vendor/js/demo/datatables-demo.js"></script>
</body>
</html>

