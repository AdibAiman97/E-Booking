<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid = $_SESSION['u_id'];

  // Add User Feedback
  if (isset($_POST['give_feedback'])) {
    $f_uname = $_POST['f_uname'];
    $f_content = $_POST['f_content'];

    $query = "INSERT INTO tms_feedback (f_uname, f_content) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $f_uname, $f_content);
    $stmt->execute();

    if ($stmt) {
      $succ = "Feedback Submitted";
    } else {
      $err = "Please Try Again Later";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include('vendor/inc/head.php'); ?>

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
    background-color: #d2b48c; /* Tan Input Background */
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

<body id="page-top">
  <!-- Start Navigation Bar -->
  <?php include("vendor/inc/nav.php"); ?>
  <!-- End Navigation Bar -->

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php"); ?>
    <!-- End Sidebar -->

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

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="user-dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">Feedbacks</li>
        </ol>

        <hr>

        <!-- Feedback Form Card -->
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Give Feedback</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <?php
                $stmt = $mysqli->prepare("SELECT * FROM tms_user WHERE u_id=?");
                $stmt->bind_param('i', $aid);
                $stmt->execute();
                $res = $stmt->get_result();
                while ($row = $res->fetch_object()) {
              ?>
              <div class="form-group">
                <label for="f_uname">My Name</label>
                <input type="text" required readonly class="form-control" 
                  value="<?php echo $row->u_fname . ' ' . $row->u_lname; ?>" 
                  name="f_uname">
              </div>
              <?php } ?>

              <div class="form-group">
                <label for="f_content">My Testimonial</label>
                <textarea class="form-control" placeholder="Give Your Feedback" 
                  name="f_content" rows="4"></textarea>
              </div>

              <button type="submit" name="give_feedback" class="btn btn-block">
                <i class="fas fa-paper-plane mr-2"></i> Submit Feedback
              </button>
            </form>
          </div>
        </div>

        <hr>

        <!-- Sticky Footer -->
        <?php include("vendor/inc/footer.php"); ?>
      </div>
      <!-- /.container-fluid -->
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
          <a class="btn btn-danger" href="user-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Sweet Alert -->
  <script src="vendor/js/swal.js"></script>
</body>
</html>
