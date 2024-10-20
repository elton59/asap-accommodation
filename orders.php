<!DOCTYPE html>
<?php
include("db.php");
include("navbar.php");
if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

if (isset($_GET['uid']) && isset($_GET['pid'])) {
    $order_id = $_GET['uid'];
    $product_id = $_GET['pid'];

    // Get the quantity from the orders table
    $orderDetails = $mysqli->query("SELECT quantity FROM orders WHERE id = $order_id") or die($mysqli->error);
    $order = $orderDetails->fetch_assoc();
    $orderQuantity = $order['quantity'];

    // Reduce available stock_in and increase stock_out for the product
    $updateStock = $mysqli->query("UPDATE products SET stock_out = (stock_out + $orderQuantity) WHERE id = $product_id") or die($mysqli->error);

    // Update products table: set product_status to 'approved'
    $updateProduct = $mysqli->query("UPDATE products SET status = 'approved' WHERE id = $product_id") or die($mysqli->error);

    // Update orders table: set order_status to 'occupied'
    $updateOrder = $mysqli->query("UPDATE orders SET order_status = 'occupied' WHERE id = $order_id") or die($mysqli->error);

    if ($updateProduct && $updateOrder && $updateStock) {
        echo "Room occupied successfully!";
    }
}

if (isset($_GET['lid']) && isset($_GET['pid'])) {
    $order_id = $_GET['lid'];
    $product_id = $_GET['pid'];

    // Get the quantity from the orders table
    $orderDetails = $mysqli->query("SELECT quantity FROM orders WHERE id = $order_id") or die($mysqli->error);
    $order = $orderDetails->fetch_assoc();
    $orderQuantity = $order['quantity'];

    // Reduce available stock_in and increase stock_out for the product
    $updateStock = $mysqli->query("UPDATE products SET stock_out = (stock_out - $orderQuantity) WHERE id = $product_id") or die($mysqli->error);

    // Update products table: set product_status to 'approved'
    $updateProduct = $mysqli->query("UPDATE products SET status = 'approved' WHERE id = $product_id") or die($mysqli->error);

    // Update orders table: set order_status to 'exited'
    $updateOrder = $mysqli->query("UPDATE orders SET order_status = 'exited' WHERE id = $order_id") or die($mysqli->error);

    if ($updateProduct && $updateOrder && $updateStock) {
        echo "Room exited successfully!";
    }
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ASAP Accommodation</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body class="grey lighten-3">
<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">
        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Bookings</h2>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-12">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Bookings</span>
                </h4>
                <!-- Cart -->
                <ul class='list-group mb-3 z-depth-1'>
                    <?php
                    $total = 0;
                    $cemail = $_SESSION['username'];
                    $result = $mysqli->query("SELECT orders.quantity as qty, products.cost_per_item as pci, orders.id as orderid, orders.order_status as order_status, orders.orderdate as orderdate, orders.leave_date as leave_date, orders.product_id as products_id, products.product_name as prodname, products.description as proddesc, products.type as product_type, products.location as product_location, customers.customer_id as custid FROM orders JOIN products ON orders.product_id = products.id JOIN customers ON customers.customer_id = orders.customer_id WHERE customers.email = '$cemail' AND orders.order_status != 'pending'");
                    while ($row = $result->fetch_assoc()) {
                        $orderid = $row['orderid'];
                        $order_status = $row['order_status'];
                        $productname = $row['prodname'];
                        $description = $row['proddesc'];
                        $orderdate = $row['orderdate'];
                        $leave_date = $row['leave_date'];
                        $pci = $row['pci'];
                        $qty = $row['qty'];
                        $product_type = $row['product_type'];
                        $product_location = $row['product_location'];
                        $cost = $qty * $pci;
                        $total += $cost;
                        echo "
                        <li class='list-group-item d-flex justify-content-between lh-condensed'>
                            <div>
                                <h6 class='my-0'>$productname</h6>
                                <small class='text-muted'>$description</small><br/>
                                <small class='text-muted'>Type: $product_type</small><br/>
                                <small class='text-muted'>Location: $product_location</small><br/>
                                <small class='text-muted'>Quantity: $qty</small><br/>
                                <small class='text-muted'>Booking Date: $orderdate</small><br/>
                                <small class='text-muted'>Leaving Date: $leave_date</small>
                            </div>
                            <span class='text-muted'>Ksh: $cost</span>&nbsp
                            <span class='text-muted'>
                                <p style='color:red'>$order_status</p>
                            </span>
                        </li>
                    ";
                    }
                    echo "
                      <div class='button-container'>
                        <a href='oreport.php?cemail=$cemail' class='btn btn-danger'>Export to PDF</a>
                      </div>
                    ";
                    ?>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-12 mb-12">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Occupy Room</span>
                </h4>
                <!-- Cart -->
                <ul class='list-group mb-3 z-depth-1'>
                    <?php
                    $total = 0;
                    $cemail = $_SESSION['username'];
                    $result = $mysqli->query("SELECT orders.quantity as qty, products.cost_per_item as pci, orders.id as orderid, orders.order_status as order_status, orders.orderdate as orderdate, orders.leave_date as leave_date, products.product_name as prodname, orders.product_id as product_id, products.description as proddesc, products.type as product_type, products.location as product_location, customers.customer_id as custid FROM orders JOIN products ON orders.product_id = products.id JOIN customers ON customers.customer_id = orders.customer_id WHERE customers.email = '$cemail' AND orders.order_status = 'serviced'");
                    while ($row = $result->fetch_assoc()) {
                        $orderid = $row['orderid'];
                        $order_status = $row['order_status'];
                        $productname = $row['prodname'];
                        $pid = $row['product_id'];
                        $orderdate = $row['orderdate'];
                        $leave_date = $row['leave_date'];
                        $description = $row['proddesc'];
                        $pci = $row['pci'];
                        $qty = $row['qty'];
                        $product_type = $row['product_type'];
                        $product_location = $row['product_location'];
                        $cost = $qty * $pci;
                        $total += $cost;
                        echo "
                        <li class='list-group-item d-flex justify-content-between lh-condensed'>
                            <div>
                                <h6 class='my-0'>$productname</h6>
                                <small class='text-muted'>$description</small><br/>
                                <small class='text-muted'>Type: $product_type</small><br/>
                                <small class='text-muted'>Location: $product_location</small><br/>
                                <small class='text-muted'>Quantity: $qty</small><br/>
                                <small class='text-muted'>Booking Date: $orderdate</small><br/>
                                <small class='text-muted'>Leaving Date: $leave_date</small>
                            </div>
                            <span class='text-muted'>Ksh: $cost</span>&nbsp
                            <span class='text-muted'>
                                <p style='color:orange'>$order_status</p>
                            </span>
                            <span class='text-muted'>
                                <a href='orders.php?uid=$orderid&pid=$pid' class='text-m btn btn-success'>Occupy</a>
                            </span>
                        </li>
                    ";
                    }
                    ?>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-12 mb-12">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Exit Room</span>
                </h4>
                <!-- Cart -->
                <ul class='list-group mb-3 z-depth-1'>
                    <?php
                    $total = 0;
                    $cemail = $_SESSION['username'];
                    $result = $mysqli->query("SELECT orders.quantity as qty, products.cost_per_item as pci, orders.id as orderid, orders.order_status as order_status, orders.orderdate as orderdate, orders.leave_date as leave_date, orders.product_id as product_id, products.product_name as prodname, products.description as proddesc, products.type as product_type, products.location as product_location, customers.customer_id as custid FROM orders JOIN products ON orders.product_id = products.id JOIN customers ON customers.customer_id = orders.customer_id WHERE customers.email = '$cemail' AND orders.order_status = 'occupied'");
                    while ($row = $result->fetch_assoc()) {
                        $orderid = $row['orderid'];
                        $order_status = $row['order_status'];
                        $productname = $row['prodname'];
                        $pid = $row['product_id'];
                        $orderdate = $row['orderdate'];
                        $leave_date = $row['leave_date'];
                        $description = $row['proddesc'];
                        $pci = $row['pci'];
                        $qty = $row['qty'];
                        $product_type = $row['product_type'];
                        $product_location = $row['product_location'];
                        $cost = $qty * $pci;
                        $total += $cost;
                        echo "
                        <li class='list-group-item d-flex justify-content-between lh-condensed'>
                            <div>
                                <h6 class='my-0'>$productname</h6>
                                <small class='text-muted'>$description</small><br/>
                                <small class='text-muted'>Type: $product_type</small><br/>
                                <small class='text-muted'>Location: $product_location</small><br/>
                                <small class='text-muted'>Quantity: $qty</small><br/>
                                <small class='text-muted'>Booking Date: $orderdate</small><br/>
                                <small class='text-muted'>Leaving Date: $leave_date</small>
                            </div>
                            <span class='text-muted'>Ksh: $cost</span>&nbsp
                            <span class='text-muted'>
                                <p style='color:red'>$order_status</p>
                            </span>
                            <span class='text-muted'>
                                <a href='orders.php?lid=$orderid&pid=$pid' class='text-m btn btn-warning'>Exit</a>
                            </span>
                        </li>
                    ";
                    }
                    ?>
                </ul>
            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<script>
    function showRejectPopup(orderId) {
        if (confirm("Are you sure you want to reject this order?")) {
            window.location.href = 'reject_order.php?order_id=' + orderId;
        }
    }
</script>

</body> 
</html>
