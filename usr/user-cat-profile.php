<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['u_id'];

  if (isset($_POST['update_profile'])) {
    $u_id = $_SESSION['u_id'];
    $u_cat=$_POST['u_cat'];
    $u_cat_name=$_POST['u_cat_name'];
    $u_cat_gender=$_POST['u_cat_gender'];
    $u_cat_coat=$_POST['u_cat_coat'];
    $u_cat_spayed=$_POST['u_cat_spayed'];
    $u_cat_weight=$_POST['u_cat_weight'];

    $query = "UPDATE tms_user SET u_cat=?, u_cat_name=?, u_cat_gender=?, u_cat_coat=?, u_cat_spayed=?, u_cat_weight=? WHERE u_id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssssssi', $u_cat, $u_cat_name, $u_cat_gender, $u_cat_coat, $u_cat_spayed, $u_cat_weight, $u_id);
    $stmt->execute();

    if ($stmt) {
      $succ = "Profile Updated";
    } else {
      $err = "Please Try Again Later";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include('vendor/inc/head.php'); ?>

<!-- Custom CSS for Brown Theme -->
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

    .card {
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
  .form-control-with-unit {
        position: relative;
    }

    .form-control-with-unit input {
        padding-right: 40px; /* Add padding to prevent text overlap */
    }

    .form-control-with-unit .unit {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: gray;
        font-weight: bold;
    }
</style>

<body id="page-top">

  <!-- Navigation Bar -->
  <?php include("vendor/inc/nav.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php"); ?>

    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Success and Error Alerts -->
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

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Cat Profile</li>
          <li class="breadcrumb-item active" style="color: #f3e0c7;">Update Cat Profile</li>
        </ol>

        <hr>

        <!-- Profile Update Card -->
        <div class="card">
          <div class="card-header">
            Update Cat Profile
          </div>
          <div class="card-body"> <!-- Tan Background -->
            <?php
              $aid = $_SESSION['u_id'];
              $ret = "SELECT * FROM tms_user WHERE u_id=?";
              $stmt = $mysqli->prepare($ret);
              $stmt->bind_param('i', $aid);
              $stmt->execute();
              $res = $stmt->get_result();

              while ($row = $res->fetch_object()) {
            ?>
            <form method="POST">
              <div class="form-group">
                <label for="u_cat">Cat Breed</label>
                <input type="text" value="<?php echo $row->u_cat; ?>" required class="form-control" name="u_cat">
              </div>

              <div class="form-group">
                <label for="u_lname">Cat Name</label>
                <input type="text" value="<?php echo $row->u_cat_name; ?>" class="form-control" name="u_cat_name">
              </div>

              <div class="form-group">
                <label for="u_phone">Gender</label>
                <input type="text" value="<?php echo $row->u_cat_gender; ?>" class="form-control" name="u_cat_gender">
              </div>

              <div class="form-group">
                <label for="u_addr">Coat Type</label>
                <input type="text" value="<?php echo $row->u_cat_coat; ?>" class="form-control" name="u_cat_coat">
              </div>

              <div class="form-group">
                <label for="u_addr">Spayed</label>
                <input type="text" value="<?php echo $row->u_cat_spayed; ?>" class="form-control" name="u_cat_spayed">
              </div>

              <div class="form-group">
                  <label for="weightInput" class="text-white">Weight</label>
                  <div class="form-control-with-unit">
                      <input 
                          type="number" 
                          id="weightInput" 
                          value="<?php echo $row->u_cat_weight;?>" 
                          class="form-control" 
                          name="u_cat_weight" 
                          required>
                      <span class="unit">kg</span>
                  </div>
              </div>

              <button type="submit" name="update_profile" class="btn btn-block">
                <i class="fas fa-edit mr-2"></i> Update Cat Profile
              </button>
            </form>
            <?php } ?>
          </div>
        </div>

        <hr>

        <!-- Footer -->
        <?php include("vendor/inc/footer.php"); ?>

      </div>
    </div>
  </div>

  <!-- Scroll to Top Button -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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

  <!-- JavaScript Files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/js/sb-admin.min.js"></script>
  <script src="vendor/js/swal.js"></script>

</body>
</html>
