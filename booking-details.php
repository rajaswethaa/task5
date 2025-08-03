<?php
include_once('admin/includes/config.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $emailid = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $bookingdate = $_POST['bookingdate'];
    $bookingtime = $_POST['bookingtime'];
    $noadults = $_POST['noadults'];
    $nochildrens = $_POST['nochildrens'];
    $bno = mt_rand(100000000, 9999999999);

    $query = mysqli_query($con, "INSERT INTO tblbookings (bookingNo, fullName, emailId, phoneNumber, bookingDate, bookingTime, noAdults, noChildrens) 
    VALUES ('$bno', '$fname', '$emailid', '$phonenumber', '$bookingdate', '$bookingtime', '$noadults', '$nochildrens')");

    if ($query) {
        echo "<script>alert('Your order sent successfully. Booking number is $bno');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurent Table Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/wickedpicker.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
</head>

<body>
    <h1 class="header-w3ls">RTBS | Check Status</h1>
    <div class="appointment-w3">
        <form action="search-result.php" method="post">
            <div class="personal">
                <div class="main">
                    <div class="form-left-w3l">
                        <input type="text" class="top-up" name="searchdata" placeholder="Search by booking no or contact no" required>
                    </div>
                </div>
            </div>
            <div class="btnn">
                <input type="submit" value="Search" name="submit">
            </div>
            <div class="copy">
                <p>Check Booking <a href="check-status.php" target="_blank">Status</a></p>
            </div>
            <div class="copy">
                <p>Admin Panel <a href="admin/" target="_blank">Login here</a></p>
            </div>
        </form>
    </div>

    <script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
        });
    </script>
    <script type="text/javascript" src="js/wickedpicker.js"></script>
    <script type="text/javascript">
        $('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
    </script>
</body>
</html>
