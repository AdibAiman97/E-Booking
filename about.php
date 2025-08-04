<!DOCTYPE html>
<html lang="en">

<?php include("vendor/inc/head.php"); ?>

<head>
  <style>
    /* General Styles */
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column; /* Use flexbox for sticky footer */
    }

    .container {
      flex: 1; /* Make the container take available space */
      padding: 20px;
    }

    /* Sticky Footer */
    .footer {
       background-color: #4B3D3D;
        color: white;
        text-align: center;
        padding: 10px 0;
        width: 100%;
        margin-top: auto; /* Push footer to bottom */
        position: relative;
    }

    /* Cards */
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
      transition: transform 0.3s;
    }

    .card:hover {
      transform: scale(1.05); /* Zoom on hover */
    }
    /* Navigation Bar */
    .navbar {
        background-color: #4B3D3D;
    }
    .navbar a {
        color: #f3e0c7 !important;
    }

    .card-header {
      background-color: #4e3b31;
      color: white;
      font-weight: bold;
      text-align: center;
    }

    /* Images */
    .img-fluid {
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Add shadow to images */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .card {
        margin-bottom: 15px;
      }

      .navbar-brand {
        font-size: 1.2rem;
      }
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php"); ?>
  <br>
<br>
<br>
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-1">About HAKIEMI'S E-BOOKING CAT HOTEL</h1>

    <!-- Image Header -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <img class="img-fluid rounded" src="about-food-2.png" alt="About Food 2">
      </div>
      <div class="col-lg-6 mb-4">
        <img class="img-fluid rounded" src="about-food-3.png" alt="About Food 3">
      </div>
    </div>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header">About Us</h4>
          <div class="card-body">
            <p class="card-text">
              Welcome to HAKIEMI'S E-BOOKING CAT HOTEL, your cat’s home away from home! Founded by passionate cat lovers, we provide top-notch care for your beloved felines.
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Join Our Family</h4>
          <div class="card-body">
            <p class="card-text">
              When you choose HAKIEMI'S E-BOOKING CAT HOTEL, you join a community of fellow cat enthusiasts. Come visit us, meet our staff, and explore our facilities!
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2024 HAKIEMI'S E-BOOKING CAT HOTEL | All Rights Reserved</p>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
