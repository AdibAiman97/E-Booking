<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['change_pwd']))
    {

            $a_pwd=$_POST['a_pwd'];//update password
            $query=" UPDATE tms_admin SET a_pwd = ? WHERE a_id = ?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('si', $a_pwd, $aid);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Password Changed";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/a-head.php');?>
<!-- Custom CSS for Brown Theme -->
<style>
  body {
    background-color: white; /* Light background for contrast */
    color: #f3e0c7; /* Light brown text */
  }

  .breadcrumb {
      background-color: #3d2a1c;
      color: #f3e0c7;
    }

    .breadcrumb a {
      color: #d4a373;
    }

  .card {
    background-color: #3C2F2F;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    color: #f3e0c7;
  }

  .card-header {
    background-color: #5C4033;
    font-weight: bold;
  }

  .form-control {
    background-color: #d2b48c;
    color: #3C2F2F;
    border: 1px solid #b3864b;
    border-radius: 8px;
  }

  .form-control::placeholder {
    color: #7a5e42;
  }

  .btn {
    background-color: #4B3D3D;
    color: #f3e0c7;
    border-radius: 8px;
  }

  .btn:hover {
    background-color: #5C4033;
  }

  .form-group label {
    font-weight: bold;
    color: #f3e0c7;
  }
</style>
<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/a-nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/a-sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <span style=>Profile Admin</span>
        </ol>

        <hr>
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Change Password Admin</h4>
          </div>
          <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="oldPassword" class="text-white">Old Password</label>
                    <input type="password" id="oldPassword" name="old_pwd" class="form-control" required placeholder="Enter Old Password">
                </div>
                <div class="form-group">
                    <label for="newPassword" class="text-white">New Password</label>
                    <input type="password" id="newPassword" name="new_pwd" class="form-control" required placeholder="Enter New Password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="text-white">Confirm New Password</label>
                    <input type="password" id="confirmPassword" name="confirm_pwd" class="form-control" required placeholder="Confirm New Password">
                </div>
                <button type="submit" name="change_pwd" class="btn btn-block">Change Password</button>
            </form>
        </div>
    </div>
</div> 

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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
