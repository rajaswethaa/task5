<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['aid']) == 0) {
    header('location:index.php');
} else {
    if(isset($_POST['submit'])) {
        $tno = $_POST['tableno'];
        $addedby = $_SESSION['aid'];
        $query = mysqli_query($con, "INSERT INTO tblrestables(tableNumber, AddedBy) VALUES('$tno', '$addedby')");
        if($query) {
            echo "<script>alert('Table added successfully.');</script>";
            echo "<script type='text/javascript'> document.location = 'add-table.php'; </script>";
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
  <title>Restaurant Table Booking System | Add Table</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="../plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="../plugins/dropzone/min/dropzone.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php include_once("includes/navbar.php"); ?>
<?php include_once("includes/sidebar.php"); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Table</li>
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
              <h3 class="card-title">Table Details</h3>
            </div>
            <form name="addtable" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="tableno">Table No</label>
                  <input type="text" class="form-control" id="tableno" name="tableno" placeholder="Enter Table Number" required>
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
<script src="../plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
    $('.select2').select2();
    $('.select2bs4').select2({ theme: 'bootstrap4' });
  });
</script>
</body>
</html>
<?php } ?>
