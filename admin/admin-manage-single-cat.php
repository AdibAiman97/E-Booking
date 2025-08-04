<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add USer
  if(isset($_POST['update_user']))
    {
            $u_id= $_GET['u_id'];
            $u_fname=$_POST['u_fname'];
            $u_lname = $_POST['u_lname'];
            $u_phone=$_POST['u_phone'];
            $u_email=$_POST['u_email'];
            $u_cat=$_POST['u_cat'];
            $u_cat_name=$_POST['u_cat_name'];
            $u_cat_gender=$_POST['u_cat_gender'];
            $u_cat_coat=$_POST['u_cat_coat'];
            $u_cat_spayed=$_POST['u_cat_spayed'];
            $u_cat_weight=$_POST['u_cat_weight'];
            $query="update tms_user set u_fname=?, u_lname=?, u_phone=?, u_email=?, u_cat=?, u_cat_name=?, u_cat_gender=?, u_cat_coat=?, u_cat_spayed=?, u_cat_weight=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssssssi', $u_fname,  $u_lname, $u_phone, $u_email, $u_cat, $u_cat_name, $u_cat_gender, $u_cat_coat, $u_cat_spayed, $u_cat_weight, $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "User Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>
<!DOCTYPE html>
<html lang="en">

<?php include('vendor/inc/a-head.php');?>
<head>
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

    .card-body {
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
</head>
<body id="page-top">
 <!--Start Navigation Bar-->
  <?php include("vendor/inc/a-nav.php");?>
  <!--Navigation Bar-->

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include("vendor/inc/a-sidebar.php");?>
    <!--End Sidebar-->
    <div id="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
                    },
                        100);
        </script>

        <?php } ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <span>Manage Cat</a>
        </li>
        </ol>
        
        <div class="card">
        <div class="card-header">
          Update Customer Cat
        </div>
        <div class="card-body">
          <!--Add User Form-->
          <?php
            $aid=$_GET['u_id'];
            $ret="select * from tms_user where u_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
         <form method="POST"> 
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">First Name</label>
        <input type="text" value="<?php echo $row->u_fname;?>" required class="form-control" id="exampleInputEmail1" name="u_fname" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $row->u_lname;?>" id="exampleInputEmail1" name="u_lname" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Contact</label>
        <input type="text" class="form-control" value="<?php echo $row->u_phone;?>" id="exampleInputEmail1" name="u_phone" readonly>
   
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Email address</label>
        <input type="email" value="<?php echo $row->u_email;?>" class="form-control" name="u_email" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Cat Breed</label>
        <input type="text" value="<?php echo $row->u_cat;?>" class="form-control" name="u_cat" readonly>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Cat Name</label>
        <input type="text" value="<?php echo $row->u_cat_name;?>" class="form-control" name="u_cat_name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Cat Gender</label>
        <select class="form-control" name="u_cat_gender" id="u_cat_gender">
                                <option value="">--Select Cat Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Coat Type</label>
        <input type="text" value="<?php echo $row->u_cat_coat;?>" class="form-control" name="u_cat_coat" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-white">Spayed</label>
        <input type="text" value="<?php echo $row->u_cat_spayed;?>" class="form-control" name="u_cat_spayed" required>
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

    <button type="submit" name="update_user" class="btn btn-success">Update Cat</button>
</form>
          <!-- End Form-->
        <?php }?>
        </div>
      </div>
       

      

    </div>
    <!-- /.content-wrapper -->
<!-- Sticky Footer -->
<?php include("vendor/inc/a-footer.php");?>
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
          <a class="btn btn-danger" href="admin-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="vendor/js/demo/datatables-demo.js"></script>
  <script src="vendor/js/demo/chart-area-demo.js"></script>
 <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>
