<?php
session_start();
include('admin/vendor/inc/config.php');
// include('vendor/inc/checklogin.php'); // Uncomment if needed
// check_login();
// $aid = $_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include("vendor/inc/head.php"); ?>
<!-- End Head -->

<head>
  <style>
    /* General Styles */
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column; /* Flexbox layout for sticky footer */
    }

    .container {
      flex: 1; /* Let the container take available space */
      padding: 20px;
    }

  /* Footer */
    .footer {
    background-color: #4B3D3D;
    color: white;
    text-align: center;
    padding: 10px 0;
    width: 100%;
    margin-top: auto; /* Push footer to bottom */
    position: relative;
}

    /* Scrollable Gallery Styles */
    .gallery-container {
      max-height: 700px; /* Restrict gallery height */
      overflow-y: auto; /* Enable vertical scrolling */
      padding-right: 10px; /* Spacing for scroll */
    }

    .gallery-item {
      margin-bottom: 20px;
    }
       /* Navigation Bar */
       .navbar {
        background-color: #4B3D3D;
    }
    .navbar a {
        color: #f3e0c7 !important;
    }

    .img-fluid {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .img-fluid:hover {
      transform: scale(1.05);
    }

    .btn-success {
      background-color: #4CAF50;
      border: none;
      transition: background-color 0.3s;
    }

    .btn-success:hover {
      background-color: #45a049;
    }

    /* Responsive Layout */
    @media (max-width: 768px) {
      .row.mb-4 {
        flex-direction: column;
      }

      .btn-success {
        width: 100%; /* Full-width button on small screens */
      }
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include('vendor/inc/nav.php'); ?>

  <!-- Page Content -->
  <div class="container">
    <!-- Page Heading -->
    <h1 class="mt-4 mb-3 text-center">Our Gallery</h1>

    <!-- Scrollable Gallery Container -->
    <div class="gallery-container">
      <?php
      $ret = "SELECT * FROM tms_vehicle ORDER BY RAND() LIMIT 10"; // Get random vehicles
      if ($stmt = $mysqli->prepare($ret)) {
          $stmt->execute();
          $res = $stmt->get_result();

          while ($row = $res->fetch_object()) {
              $v_name = htmlspecialchars($row->v_name);
              $v_category = htmlspecialchars($row->v_category);
              $v_dpic = htmlspecialchars($row->v_dpic);
              $v_status = htmlspecialchars($row->v_status);

              // Determine badge class based on status
              $badgeClass = ($v_status === 'Available') ? 'badge-success' : 'badge-danger';
              $badgeText = ($v_status === 'Available') ? 'Available' : 'Booked';
      ?>
              <!-- Gallery Item -->
              <div class="row mb-4 gallery-item">
                  <div class="col-md-7">
                      <a href="#">
                          <img class="img-fluid rounded mb-3 mb-md-0" 
                               src="vendor/img/<?php echo $v_dpic; ?>" 
                               alt="<?php echo $v_name; ?>">
                      </a>
                  </div>
                  <div class="col-md-5 d-flex flex-column justify-content-center">
                      <h3><?php echo $v_category; ?></h3>
                      <ul class="list-group list-group-horizontal mb-3">
                          <li class="list-group-item"><?php echo $v_name; ?></li>
                          <li class="list-group-item">
                              <span class="badge <?php echo $badgeClass; ?>">
                                  <?php echo $badgeText; ?>
                              </span>
                          </li>
                      </ul>
                      <a class="btn btn-success" href="index.php">Book Now
                          <span class="glyphicon glyphicon-chevron-right"></span>
                      </a>
                  </div>
              </div>
              <hr>
      <?php
          }
          $stmt->close();
      } else {
          echo "<p>Error retrieving vehicles.</p>";
      }
      ?>
    </div>
    <!-- End of Scrollable Gallery -->

  </div> <!-- /.container -->

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2024 HAKIEMI'S E-BOOKING CAT HOTEL | All Rights Reserved</p>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
