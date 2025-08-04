<?php
session_start();
include('vendor/inc/config.php');
include('vendor/inc/checklogin.php');
check_login();
$aid = $_SESSION['u_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<?php include('vendor/inc/head.php'); ?>
<head>
  <style>
     .breadcrumb {
      background-color: #3d2a1c;
      color: #f3e0c7;
    }

    .breadcrumb a {
      color: #d4a373;
    }
    </style>
</head>
<body id="page-top">
  <!-- Navigation Bar -->
  <?php include("vendor/inc/nav.php"); ?>

  <div id="wrapper">
    <!-- Sidebar -->
    <?php include("vendor/inc/sidebar.php"); ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Bookings</a></li>
          <li class="breadcrumb-item">View & Print Receipt</li>
        </ol>
        <hr>

        <div class="card">
          <div class="card-header">Booking Receipt</div>
          <div class="card-body">
            <?php
            $aid = $_GET['u_id'];
            $ret = "SELECT * FROM tms_user WHERE u_id=?";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('i', $aid);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
            ?>
              <div id="printableArea" class="receipt-container">
                <div class="logo-container text-center">
                  <img src="<?php echo (!empty($user['photo'])) ? '../images/' . $user['photo'] : '../logo1.png'; ?>" class="logo img-fluid" alt="Company Logo" />
                </div>

                <h3 class="text-center receipt-title">Customer Receipt</h3>
                <p class="text-center">Thank you for your booking!</p>

                <hr>

                <div class="receipt-details">
                  <p><strong>Receipt No:</strong> ID<?php echo $row->u_id; ?></p>
                  <p><strong>Date:</strong> <?php echo date("d/m/Y"); ?></p>
                </div>

                <hr>

                <table class="receipt-table">
                  <tr>
                    <td><strong>First Name:</strong></td>
                    <td><?php echo $row->u_fname; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Last Name:</strong></td>
                    <td><?php echo $row->u_lname; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Contact:</strong></td>
                    <td><?php echo $row->u_phone; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Address:</strong></td>
                    <td><?php echo $row->u_addr; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Email:</strong></td>
                    <td><?php echo $row->u_email; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Package:</strong></td>
                    <td><?php echo $row->u_package; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Category Room:</strong></td>
                    <td><?php echo $row->u_car_type; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Price Room:</strong></td>
                    <td><?php echo $row->u_car_regno; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Booking Date:</strong></td>
                    <td><?php echo $row->u_car_bookdate ? date("d/m/Y", strtotime($row->u_car_bookdate)) : ''; ?></td>
                  </tr>
                  <tr>
                    <td><strong>End Date:</strong></td>
                    <td><?php echo $row->u_enddate ? date("d/m/Y", strtotime($row->u_enddate)) : ''; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Check in Time:</strong></td>
                    <td><?php echo date("h:i:sa", strtotime($row->u_car_booktime)); ?></td>
                  </tr>
                  <tr>
                    <td><strong>Check out Time:</strong></td>
                    <td><?php echo date("h:i:sa", strtotime($row->u_car_returntime)); ?></td>
                  </tr>
                  <tr>
                    <td><strong>Booking Status:</strong></td>
                    <td><?php echo $row->u_car_book_status; ?></td>
                  </tr>
                </table>

                <hr>
                <p class="text-center">Please present this receipt upon arrival.</p>
              </div>

              <button class="btn btn-warning mr-2" onclick="printPreview()">
        <i class="mdi mdi-printer"></i> Print
    </button>
                
              </button>
            <?php } ?>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script>
        function printPreview() {
            window.print();
        }
    </script>

  <style>
    .receipt-container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
      border: 1px dashed #333;
      background-color: #f9f9f9;
      font-family: 'Arial', sans-serif;
    }

    .logo-container {
      margin-bottom: 20px;
    }

    .logo {
      max-width: 150px;
      height: auto;
      margin: 0 auto;
    }

    .receipt-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .receipt-table {
      width: 100%;
      margin-top: 10px;
      border-collapse: collapse;
    }

    .receipt-table td {
      padding: 8px 0;
    }

    .receipt-table tr td:first-child {
      font-weight: bold;
    }

    hr {
      border: 1px dashed #333;
    }

    .text-center {
      text-align: center;
    }
    .logo {
        max-width: 150px; /* Set a maximum width for regular view */
        height: auto;     /* Maintain aspect ratio */
        margin: 0 auto;
    }

    @media print {
      body * {
        visibility: hidden;
      }
      #printableArea, #printableArea * {
        visibility: visible;
      }
      #printableArea {
        position: absolute;
        top: 0%;
        left: 6%;
        width: 80%;
        height: auto;
        margin: 0 auto;
      }

      .logo {
            max-width: 100px; /* Adjust the size for print view */
            height: auto;      /* Maintain aspect ratio */
        }
    }
   
  </style>
</body>

</html>
