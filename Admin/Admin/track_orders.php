<?php
session_start();
include  ("../db.php");
include("navbar.php");
include("sidebar.php");

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

// Fetch the booking reports data
$query = "
    SELECT 
        orders.id as order_id, 
        products.product_name as property_name, 
        orders.orderdate as booking_date, 
        customers.firstname as customer_name, 
        customers.email as customer_email, 
        orders.order_status as order_status
    FROM 
        orders 
    JOIN 
        products ON orders.product_id = products.id 
    JOIN 
        customers ON orders.customer_id = customers.customer_id 
    WHERE 
        orders.order_status = 'occupied' OR orders.order_status = 'exited'
    ORDER BY 
        orders.orderdate DESC
";
$result = $mysqli->query($query) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Property Booking Reports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h2 class="text-center">Property Booking Reports</h2>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Property Name</th>
                                            <th>Booked By</th>
                                            <th>Customer Email</th>
                                            <th>Booking Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr>
                                                <td><?php echo $row['order_id']; ?></td>
                                                <td><?php echo $row['property_name']; ?></td>
                                                <td><?php echo $row['customer_name']; ?></td>
                                                <td><?php echo $row['customer_email']; ?></td>
                                                <td><?php echo $row['booking_date']; ?></td>
                                                <td><?php echo $row['order_status']; ?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <a href="oreport.php" class="btn btn-danger"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>&copy; 2024 <a href="http://TEVIN OBIERO.html">TEVIN OBIERO</a>.</strong>
        All rights reserved.
    </footer>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
