<?php
  session_start();
  include('vendor/inc/config.php');
  include('vendor/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
  //Add Booking
  if(isset($_POST['book_vehicle']))
    {
            $u_id = $_GET['u_id'];
            //$u_fname=$_POST['u_fname'];
            //$u_lname = $_POST['u_lname'];
            //$u_phone=$_POST['u_phone'];
            //$u_addr=$_POST['u_addr'];
            $u_car_type = $_POST['u_car_type'];
            $u_car_regno  = $_POST['u_car_regno'];
            $u_car_bookdate = $_POST['u_car_bookdate'];
            $u_car_book_status  = $_POST['u_car_book_status'];
            $u_car_booktime  = $_POST['u_car_booktime'];
            $u_car_returntime  = $_POST['u_car_returntime'];
            $u_package = $_POST['u_package'];
            $u_enddate = $_POST['u_enddate'];
            $query="update tms_user set u_car_type=?, u_car_bookdate=?, u_car_regno=?, u_car_book_status=?, u_car_booktime=?, u_car_returntime=?, u_package=?, u_enddate=? where u_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssssi', $u_car_type, $u_car_bookdate, $u_car_regno, $u_car_book_status, $u_car_booktime, $u_car_returntime, $u_package, $u_enddate,  $u_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "User Booking Added";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />
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
  #calendar-container {
      max-width: 700px;
      margin: 0 auto;
    }

    #calendar {
      max-width: 100%;
      margin: 20px auto;
      padding: 0 10px;
    }
</style>
</head>

<?php include('vendor/inc/a-head.php');?>

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
        <ol class="breadcrumb"style="background-color: #3d2a1c;
        color: #f3e0c7;">
          <li class="breadcrumb-item">
          <a href="#">Manage Booking</a>
          </li>
          </ol>
        
        <div class="card">
        <div class="card-header" style="background-color: #5C4033;">
          Approve Bookings
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
          <form method="POST" enctype="multipart/form-data"> 
    <div class="form-group">
        <label for="u_fname" class="text-white">First Name</label>
        <input type="text" required class="form-control" id="u_fname" name="u_fname" value="<?php echo $row->u_fname; ?>"readonly>
    </div>
    <div class="form-group">
        <label for="u_lname" class="text-white">Last Name</label>
        <input type="text" class="form-control" id="u_lname" name="u_lname" value="<?php echo $row->u_lname; ?>"readonly>
    </div>
    <div class="form-group">
        <label for="u_phone" class="text-white">Contact</label>
        <input type="text" class="form-control" id="u_phone" name="u_phone" value="<?php echo $row->u_phone; ?>"readonly>
    </div>
    <div class="form-group" style="display:none;">
        <label for="u_category" class="text-white">Category</label>
        <input type="text" class="form-control" id="u_category" value="User" name="u_category">
    </div>
    <div class="form-group">
        <label for="u_email" class="text-white">Email Address</label>
        <input type="email" class="form-control" id="u_email" name="u_email" value="<?php echo $row->u_email; ?>"readonly>
    </div>
    <div class="form-group">
    <label for="u_package" class="text-white">Package</label>
    <select class="form-control" name="u_package" id="u_package" 
            onchange="fetchRoomDetails()" 
            >
        <option selected disabled>Select Package</option>
        <?php
            $ret = "SELECT DISTINCT v_package FROM tms_vehicle"; 
            $stmt = $mysqli->prepare($ret);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
        ?>
            <option value="<?php echo $row->v_package; ?>">
                <?php echo $row->v_package; ?>
            </option>
        <?php } ?> 
    </select>
</div>

<div class="form-group">
    <label for="u_car_type" class="text-white">Category Rooms</label>
    <select class="form-control" name="u_car_type" id="u_car_type" 
            >
        <option selected disabled>Select Category</option>
    </select>
</div>

<div class="form-group">
    <label for="u_car_regno" class="text-white">Price Rooms</label>
    <select class="form-control" name="u_car_regno" id="u_car_regno" 
            >
        <option selected disabled>Select Price</option>
    </select>
</div>

    <div class="form-group">
        <label for="u_car_bookdate" class="text-white">Booking Date</label>
        <input type="date" class="form-control" id="u_car_bookdate" name="u_car_bookdate">
    </div>
    <div class="form-group">
        <label for="u_enddate" class="text-white">End Date</label>
        <input type="date" class="form-control" id="u_enddate" name="u_enddate">
    </div>
    <div class="form-group">
    <label for="u_car_booktime" class="text-white">Check In Time</label>
    <input type="time" class="form-control" id="u_car_booktime" name="u_car_booktime">
  </div>
  <div class="form-group">
    <label for="u_car_returntime" class="text-white">Check Out Time</label>
    <input type="time" class="form-control" id="u_car_returntime" name="u_car_returntime">
  </div>

    <div class="form-group">
        <label for="u_car_book_status" class="text-white">Status</label>
        <select class="form-control" name="u_car_book_status" id="u_car_book_status">
            <option>Approved</option>
            <option>Pending</option>
        </select>
    </div>
    <button type="submit" name="book_vehicle" class="btn btn-success" style="background-color: #5C4033;
    color: #f3e0c7;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s;">Confirm Booking</button>
</form>

          <!-- End Form-->
        <?php }?>
        </div>
      </div>
       
      <hr>
     
        <!-- Booking Calendar -->
        <div id="calendar-container">
          <div id="calendar"></div>
        </div>
      <!-- Sticky Footer -->
      <?php include("vendor/inc/a-footer.php");?>

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
<!-- Success Alert -->
<?php if (isset($succ)) { ?>
    <script>
        setTimeout(function() {
            swal("Success!", "<?php echo htmlspecialchars($succ); ?>", "success");
        }, 100);
    </script>
<?php } ?>

<!-- Error Alert -->
<?php if (isset($err)) { ?>
    <script>
        setTimeout(function() {
            swal("Failed!", "<?php echo htmlspecialchars($err); ?>", "error");
        }, 100);
    </script>
<?php } ?>

 <script>
  function fetchRoomDetails() {
    const package = document.getElementById("u_package").value;

    // Make an AJAX request to fetch data
    fetch(`get_room_details.php?package=${encodeURIComponent(package)}`)
        .then(response => response.json())
        .then(data => {
            // Populate the Category Rooms dropdown
            const categorySelect = document.getElementById("u_car_type");
            categorySelect.innerHTML = '<option selected disabled>Select Category</option>';
            data.categories.forEach(category => {
                const option = document.createElement("option");
                option.text = category;
                categorySelect.add(option);
            });

            // Populate the Price Rooms dropdown
            const priceSelect = document.getElementById("u_car_regno");
            priceSelect.innerHTML = '<option selected disabled>Select Price</option>';
            data.prices.forEach(price => {
                const option = document.createElement("option");
                option.text = price;
                priceSelect.add(option);
            });
        })
        .catch(error => console.error('Error fetching room details:', error));
}
$(document).ready(function() {
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      events: [
        <?php
          $query = "SELECT u_car_bookdate, u_car_book_status FROM tms_user WHERE u_car_type IS NOT NULL";
          $stmt = $mysqli->prepare($query);
          if ($stmt) {
              $stmt->execute();
              $result = $stmt->get_result();
              while ($event = $result->fetch_assoc()) {
                  $statusColor = ($event['u_car_book_status'] == 'Approved') ? 'green' : (($event['u_car_book_status'] == 'Pending') ? 'yellow' : 'red');
                  echo "{ title: '" . $event['u_car_book_status'] . "', start: '" . $event['u_car_bookdate'] . "', color: '" . $statusColor . "' },";
              }
          } else {
              echo "console.error('Failed to prepare SQL statement.');";
          }
        ?>
      ]
    });
  });
</script>

  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
</body>
</html>