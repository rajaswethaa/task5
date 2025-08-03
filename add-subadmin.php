<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $username = $_POST['sadminusername'];
        $fname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $password = md5($_POST['inputpwd']);
        $usertype = '0';

        $query = mysqli_query($con, "INSERT INTO tbladmin(AdminuserName, AdminName, MobileNumber, Email, Password, UserType) VALUES ('$username', '$fname', '$mobileno', '$email', '$password', '$usertype')");
        if($query) {
            echo "<script>alert('Sub admin details added successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'add-subadmin.php'; </script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurent Table Booking System | Add Sub admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script>
    function checkAvailability() {
      $("#loaderIcon").show();
      jQuery.ajax({
        url: "check_availability.php",
        data: 'username=' + $("#sadminusername").val(),
        type: "POST",
        success: function(data) {
          $("#user-availability-status").html(data);
          $("#loaderIcon").hide();
        }
      });
    }
  </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once("includes/navbar.php"); ?>
<?php include_once("includes/sidebar.php"); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1>Create Subadmin</h1></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Subadmin</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Fill the Info</h3>
            </div>
            <form name="subadmin" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputusername">Username (used for login)</label>
                  <input type="text" name="sadminusername" id="sadminusername" class="form-control" placeholder="Enter Sub-Admin Username" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" title="Username must be alphanumeric 6 to 12 chars" onBlur="checkAvailability()" required>
                  <span id="user-availability-status" style="font-size:14px;"></span>
                </div>
                <div class="form-group">
                  <label for="exampleInputFullname">Full Name</label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Sub-Admin Full Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label for="text">Mobile Number</label>
                  <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="inputpwd" name="inputpwd" placeholder="Password" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include_once('includes/footer.php'); ?>
</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>
<?php } ?>
