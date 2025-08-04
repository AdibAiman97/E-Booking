<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['a_id'];

// Add User
if (isset($_POST['add_user'])) {
    $u_fname = $_POST['u_fname'];
    $u_lname = $_POST['u_lname'];
    $u_phone = $_POST['u_phone'];
    $u_addr = $_POST['u_addr'];
    $u_email = $_POST['u_email'];
    $u_pwd = $_POST['u_pwd'];
    $u_cat = $_POST['u_cat'];
    $u_category = $_POST['u_category']; // This can be adjusted as needed

    $query = "INSERT INTO tms_user (u_fname, u_lname, u_phone, u_addr, u_category, u_email, u_pwd, u_cat) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('ssssssss', $u_fname, $u_lname, $u_phone, $u_addr, $u_category, $u_email, $u_pwd,$u_cat);
    $stmt->execute();

    if ($stmt) {
        $succ = "User Added";
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
    <!-- Navigation Bar -->

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("vendor/inc/a-sidebar.php"); ?>
        <!-- End Sidebar -->

        <div id="content-wrapper">
            <div class="container-fluid">
                <?php if (isset($succ)) { ?>
                    <script>
                        setTimeout(function () {
                            swal("Success!", "<?php echo $succ; ?>!", "success");
                        }, 100);
                    </script>
                <?php } ?>
                <?php if (isset($err)) { ?>
                    <script>
                        setTimeout(function () {
                            swal("Failed!", "<?php echo $err; ?>!", "error");
                        }, 100);
                    </script>
                <?php } ?>

                <!-- Breadcrumbs -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Add User</a>
                    </li>
                </ol>

                <div class="card-body">
                    <!-- Form -->
                    <form method="POST"> 
                        <div class="form-group">
                            <label for="u_fname" class="text-white">First Name</label>
                            <input type="text" required class="form-control" id="u_fname" name="u_fname">
                        </div>
                        <div class="form-group">
                            <label for="u_lname" class="text-white">Last Name</label>
                            <input type="text" class="form-control" id="u_lname" name="u_lname">
                        </div>
                        <div class="form-group">
                            <label for="u_phone" class="text-white">Contact</label>
                            <input type="text" class="form-control" id="u_phone" name="u_phone">
                        </div>
                        <div class="form-group">
                            <label for="u_addr" class="text-white">Address</label>
                            <input type="text" class="form-control" id="u_addr" name="u_addr">
                        </div>

                        <div class="form-group" style="display:none">
                            <label for="u_category">Category</label>
                            <input type="text" class="form-control" id="u_category" value="User" name="u_category">
                        </div>

                        <div class="form-group">
                            <label for="u_email" class="text-white">Email Address</label>
                            <input type="email" class="form-control" id="u_email" name="u_email">
                        </div>
                        <div class="form-group">
                            <label for="cat_size" class="text-white">Cat Breed</label>
                            <select class="form-control" name="u_cat" id="u_cat">
                                <option value="">--Select Cat Breed--</option>
                                <option value="British">British</option>
                                <option value="Asian">Asian</option>
                                <option value="Korat">Korat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="u_pwd" class="text-white">Password</label>
                            <input type="password" class="form-control" name="u_pwd" id="u_pwd">
                        </div>

                        <button type="submit" name="add_user" class="btn btn-success">Add User</button>
                    </form>
                </div>

                <!-- Sticky Footer -->
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
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="vendor/js/sb-admin.min.js"></script>
        <script src="vendor/js/demo/datatables-demo.js"></script>
        <script src="vendor/js/demo/chart-area-demo.js"></script>
        <script src="vendor/js/swal.js"></script>
    </body>
</html>
