<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">
  <style>
    body {
      background-color: #D2B48C; /* Light brown color */
      height: 100vh; /* Full viewport height */
      margin: 0; /* Remove default margin */
      display: flex; /* Center content vertically and horizontally */
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif; /* Use Poppins font */
    }

.card-login {
  background-color: #4B3D3D;
  border-radius: 15px;
  padding: 40px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
  max-width: 600px; /* Limit max width */
  width: 100%; /* Full width */
}

    .card-header {
      text-align: center;
      font-size: 24px;
      color: #fbffc0;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .form-control {
      background-color:#C4A484 ; /* Input background color */
      color: #ffffff; /* Input text color */
      border: none;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      background-color: white; /* Lighter input color on focus */
      outline: none;
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
    }

    .btn-success {
      background-color: #fbffc0; /* Button color */
      color: black; /* Button text color */
      border-radius: 10px;
      padding: 12px;
      font-weight: bold;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: #e1e4c7; /* Button hover color */
    }

    .text-center a {
      color: #fbffc0; /* Link color */
      text-decoration: none;
      font-weight: 500;
      margin-top: 15px;
      display: inline-block;
      transition: color 0.3s;
    }

    .text-center a:hover {
      color: #ffffff; /* Link hover color */
    }
    h4 {
        font-size: 24px;
  color: #fbffc0; /* Set color for heading */
}

p {
    font-size: 16px;
  color: white; /* Set color for paragraph */
}

  </style>
</head>

<body>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <button type="submit" class="btn btn-success btn-block">Reset Password</button>
        </form>
        <div class="text-center">
          <a href="/E-BOOKING/index.php">Login Page</a> |
          <a href="usr-register.php">Register an Account</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Sweet Alert JS -->
  <script src="vendor/js/swal.js"></script>
</body>

</html>


