<!--Server Side Scripting To inject Login-->
<?php
  //session_start();
  include('vendor/inc/config.php');
  //include('vendor/inc/checklogin.php');
  //check_login();
  //$aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['add_user']))
    {

            $u_fname=$_POST['u_fname'];
            $u_lname = $_POST['u_lname'];
            $u_phone=$_POST['u_phone'];
            $u_addr=$_POST['u_addr'];
            $u_email=$_POST['u_email'];
            $u_pwd=$_POST['u_pwd'];
            $u_category=$_POST['u_category'];
            $query="insert into tms_user (u_fname, u_lname, u_phone, u_addr, u_category, u_email, u_pwd) values(?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('sssssss', $u_fname,  $u_lname, $u_phone, $u_addr, $u_category, $u_email, $u_pwd);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Account Created Proceed To Log In";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!--End Server Side Scriptiong-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Transport Management System, Saccos, Matwana Culture">
  <meta name="author" content="MartDevelopers">

  <title>Register Account</title>

  <!-- Custom Fonts and Styles -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/css/sb-admin.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body {
      background-color: #D2B48C;
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
    }

    .card-register {
      background-color: #4B3D3D;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      padding: 30px;
      max-width: 700px;
      width: 100%;
      position: relative;
      text-align: center;
    }

    .card-header {
      font-size: 24px;
      color: #fbffc0;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .form-control {
      background-color: #C4A484;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 15px;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      background-color: white;
      outline: none;
      box-shadow: 0 0 8px rgba(255, 255, 255, 0.2);
    }

    .btn-success {
      background-color: #fbffc0;
      color: black;
      border-radius: 10px;
      padding: 12px;
      font-weight: bold;
      margin-top: 10px;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .btn-success:hover {
      background-color: #e1e4c7;
    }

    .text-center a {
      color: #fbffc0;
      text-decoration: none;
      font-weight: 500;
      margin-top: 15px;
      display: inline-block;
      transition: color 0.3s;
    }

    .text-center a:hover {
      color: #ffffff;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="card card-register mx-auto">
      <div class="card-header">Create an Account</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <input type="text" required class="form-control" id="firstName" name="u_fname" 
                       placeholder="First Name">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" id="lastName" name="u_lname" 
                       placeholder="Last Name">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" id="phone" name="u_phone" 
                       placeholder="Contact">
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="address" name="u_addr" 
                   placeholder="Address">
          </div>

          <input type="hidden" id="category" name="u_category" value="User">

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="u_email" 
                   placeholder="Email Address">
          </div>

          <div class="form-group">
            <input type="password" class="form-control" id="password" name="u_pwd" 
                   placeholder="Password">
          </div>

          <button type="submit" name="add_user" class="btn btn-success">Create Account</button>
        </form>

        <div class="text-center">
          <a href="/E-BOOKING/index.php">Login Page</a> |
          <a href="usr-forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/js/swal.js"></script>

  <!-- Alert Notifications -->
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

</body>

</html>


