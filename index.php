<?php
  session_start();
  include('admin/vendor/inc/config.php');
  include('usr/vendor/inc/config.php');

  // Handle login
  if (isset($_POST['login'])) {
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Choose the correct table based on the role
    if ($role == 'admin') {
      $stmt = $mysqli->prepare("SELECT a_email, a_pwd, a_id FROM tms_admin WHERE a_email=? AND a_pwd=?");
    } else if ($role == 'user') {
      $stmt = $mysqli->prepare("SELECT u_email, u_pwd, u_id FROM tms_user WHERE u_email=? AND u_pwd=?");
    }

    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->bind_result($email, $password, $user_id);
    $rs = $stmt->fetch();

    if ($rs) {
      if ($role == 'admin') {
        $_SESSION['a_id'] = $user_id;
        header("location:admin/admin-dashboard.php");
      } else {
        $_SESSION['u_id'] = $user_id;
        $_SESSION['login'] = $email;
        header("location:usr/user-dashboard.php");
      }
    } else {
      $error = "Access Denied. Please Check Your Credentials.";
    }
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("vendor/inc/head.php"); ?>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
    }

    /* Carousel Styles */
    .carousel-item {
      height: 100vh;
      background-size: cover;
      background-position: center;
    }

    /* Login Form Overlay */
    .login-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
      width: 30%;
      max-width: 600px;
      padding: 40px;
      background-color: rgba(75, 61, 61, 0.85); /* Semi-transparent background */
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .login-container h2 {
      color: #fbffc0;
      text-align: center;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .form-control {
      background-color: #5C4B4B;
      color: #ffffff;
      border: none;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 15px;
    }

    .btn-block {
      background-color: #fbffc0;
      color: black;
      font-weight: bold;
      border-radius: 8px;
      border: none;
      padding: 12px;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }

    .btn-block:hover {
      background-color: #e1e4c7;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 10px;
      color: #fbffc0;
    }

    .text-center a {
      color: #fbffc0;
      text-decoration: none;
    }

    .text-center a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active" style="background-image: url('home-1.jpeg');"></div>
      <div class="carousel-item" style="background-image: url('home-2.jpeg');"></div>
      <div class="carousel-item" style="background-image: url('home-3.png');"></div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Login Form Overlay -->
  <div class="login-container">
    <h2>Login</h2>
    <form method="POST">
      <select id="role" name="role" class="form-control" required>
        <option value="">--Select User--</option>
        <option value="admin">Admin</option>
        <option value="user">Customer</option>
      </select>

      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

      <div class="remember-me">
        <input type="checkbox" value="remember-me">
        <label>Remember Password</label>
      </div>

      <input type="submit" class="btn btn-block" name="login" value="Login">
    </form>
<br>
    <div class="text-center">
      <a href="usr/usr-register.php">Register an Account</a> |
      <a href="usr/usr-forgot-password.php">Forgot Password?</a>
    </div>
  </div>

  <?php include("vendor/inc/footer.php"); ?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/js/swal.js"></script>

  <?php if (isset($error)) { ?>
    <script>
      setTimeout(function () {
        swal("Failed!", "<?php echo $error; ?>", "error");
      }, 100);
    </script>
  <?php } ?>

</body>
</html>
