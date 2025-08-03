<?php 
session_start();
include('includes/config.php');
if(strlen($_SESSION['aid'])==0) { 
    header('location:index.php');
} else {
    if(isset($_POST['update'])){
        $fname = $_POST['fullname'];
        $email = $_POST['emailid'];
        $mobileno = $_POST['mobilenumber'];
        $adminid = intval($_SESSION['aid']);
        $query = mysqli_query($con,"update tbladmin set AdminName='$fname',MobileNumber='$mobileno',Email='$email' where ID='$adminid'");
        if($query){
            echo "<script>alert('Profile details updated successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
        } else {
            echo "<script>alert('Something went wron. Please try again.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PreSchool Enrollment System | My Profile</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php include_once("includes/navbar.php");?>
<?php include_once("includes/sidebar.php");?>
<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>My Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<?php 
$adminid = intval($_SESSION['aid']);
$query = mysqli_query($con,"select * from tbladmin where ID='$adminid'");
while($result = mysqli_fetch_array($query)){
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update the Info</h3>
          </div>
          <form name="subadmin" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputusername">Username (used for login)</label>
                <input type="text" name="sadminusername" id="sadminusername" class="form-control" value="<?php echo $result['AdminuserName'];?>" readonly>
              </div>
              <div class="form-group">
                <label for="exampleInputFullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $result['AdminName'];?>" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="emailid" name="emailid" required value="<?php echo $result['Email'];?>">
              </div>
              <div class="form-group">
                <label for="text">Mobile Number</label>
                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" pattern="[0-9]{10}" title="10 numeric characters only" maxlength="10" required value="<?php echo $result['MobileNumber'];?>">
              </div>
              <div class="form-group">
                <label for="text">Registration Date</label>
                <input type="text" class="form-control" id="regdate" name="regdate" required value="<?php echo $result['AdminRegdate'];?>" readonly>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
</div>
<?php include_once('includes/footer.php');?>
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
