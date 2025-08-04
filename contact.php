<!DOCTYPE html>
<html lang="en">

<?php include("vendor/inc/head.php"); ?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contact Us | HAKIMIE'S E-BOOKING CAT HOTEL</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      background-color: gray;
      font-family: 'Arial', sans-serif;
    }

    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    /* Contact Card Styling */
    .card-contact {
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      max-width: 800px;
      width: 100%;
      margin: 20px;
    }

    .card-header {
      background-color: #3E2723;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 1.5rem;
      font-weight: bold;
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

    .card-body {
      background-color: #FFF;
      padding: 30px;
    }
        /* Navigation Bar */
        .navbar {
        background-color: #4B3D3D;
    }
    .navbar a {
        color: #f3e0c7 !important;
    }

    .form-control {
      border-radius: 25px;
      padding: 15px;
      font-size: 16px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
    }

    .btn-success {
      background-color: #5D4037;
      border: none;
      border-radius: 25px;
      padding: 15px 30px;
      font-size: 16px;
      width: 100%;
      transition: background-color 0.3s;
    }

    .btn-success:hover {
      background-color: #3E2723;
    }


    /* Responsive Layout */
    @media (max-width: 576px) {
      .card-body {
        padding: 20px;
      }
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <?php include("vendor/inc/nav.php"); ?>

  <!-- Page Content -->
  <div class="container">
    <!-- Contact Form Card -->
    <div class="card card-contact">
      <div class="card-header">Send us a Message</div>
      <div class="card-body">
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
          </div>
          <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
          </div>
          <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
          </div>
          <div class="form-group">
            <label for="message">Message:</label>
            <textarea rows="3" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-success" id="sendMessageButton">Send Message</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2024 HAKIMIE'S E-BOOKING CAT HOTEL | All Rights Reserved</p>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

</body>

</html>
