<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['u_id'];

  if (isset($_POST['update_password'])) {
      $u_id = $_SESSION['u_id'];
      $u_pwd = $_POST['u_pwd'];
      $query = "UPDATE tms_user SET u_pwd=? WHERE u_id=?";
      $stmt = $mysqli->prepare($query);
      $rc = $stmt->bind_param('si', $u_pwd, $u_id);
      $stmt->execute();

      if ($stmt) {
          $succ = "Password Updated";
      } else {
          $err = "Please Try Again Later";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/head.php'); ?>

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
  <?php include("vendor/inc/nav.php"); ?>

  <div id="wrapper">
    <?php include("vendor/inc/sidebar.php"); ?>

    <div id="content-wrapper">
      <div class="container-fluid">

        <?php if (isset($succ)) { ?>
        <script>
          setTimeout(function () {
            swal("Success!", "<?php echo $succ; ?>", "success");
          }, 100);
        </script>
        <?php } ?>

        <?php if (isset($err)) { ?>
        <script>
          setTimeout(function () {
            swal("Failed!", "<?php echo $err; ?>", "error");
          }, 100);
        </script>
        <?php } ?>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active"style="color: #f3e0c7">Change Password</li>
        </ol>

        <hr>

        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Change Password</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="form-group">
                <label for="oldPassword">Old Password</label>
                <input type="password" class="form-control" id="oldPassword" placeholder="Enter Old Password" required>
              </div>

              <div class="form-group">
                <label for="newPassword">New Password</label>
                <input type="password" class="form-control" id="newPassword" name="u_pwd" placeholder="Enter New Password" required>
              </div>

              <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required>
              </div>

              <button type="submit" name="update_password" class="btn btn-block">
                Change Password
              </button>
            </form>
          </div>
        </div>

        <hr>

        <?php include("vendor/inc/footer.php"); ?>
      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" if you are ready to end your session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/js/sb-admin.min.js"></script>
  <script src="vendor/js/swal.js"></script>
</body>
</html>


