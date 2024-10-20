<!DOCTYPE html>
<?php
include("db.php");
include("navbar.php");

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

$ship = isset($_GET['scost']) ? $_GET['scost'] : 0;

if (isset($_POST['checkout'])) {
    $custid = $_POST['custid'];
    $otime = $_POST['otime'];
    $total = $_POST['total'];
    $tid = $_POST['tid'];
    $oids = explode(',', $_POST['oids']);
    $oidsString = implode(',', $oids);

    // Update orders and insert payment
    $mysqli->query("UPDATE orders SET orderdate='$otime', order_status='awaiting_payment_approval' WHERE id IN ($oidsString)") or die($mysqli->error);
    $mysqli->query("INSERT INTO payments (customer_id, amount, transaction_code, product_id, order_id) VALUES ('$custid', '$total', '$tid', '$oidsString', '$oidsString')") or die($mysqli->error);

    echo "<script>
        window.location.replace('orders.php?$oidsString');
    </script>";
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
        .md-form {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .md-form label {
            position: absolute;
            top: 1rem; /* Adjust this value to fit your design */
            left: 1rem; /* Adjust as needed for padding */
            font-size: 0.8rem; /* Make the font smaller */
            color: #6c757d; /* Change color for better visibility */
            transition: all 0.2s ease; /* Smooth transition for focus state */
        }

        .md-form input:focus + label,
        .md-form input:not(:placeholder-shown) + label {
            top: -1.5rem; /* Keep label above input when focused or has value */
            left: 1rem; /* Align left */
            font-size: 0.75rem; /* Adjust size when focused or filled */
            color: #007bff; /* Change color when focused */
        }
    </style>
</head>

<body class="grey lighten-3">
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">
        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout Form</h2>

        <div class="row">
            <div class="col-md-4 mb-4">
                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">
                        <?php
                        if (isset($_SESSION['username'])) {
                            $total = 0;
                            $cemail = $_SESSION['username'];
                            $result = $mysqli->query("SELECT count(orders.id) as oid FROM orders JOIN customers ON orders.customer_id=customers.customer_id WHERE customers.email='$cemail' AND orders.order_status='pending'") or die($mysqli->error);
                            while ($row = $result->fetch_assoc()) {
                                echo $row['oid'] > 0 ? $row['oid'] : "0";
                            }
                        } else {
                            echo "0";
                        }
                        ?>
                    </span>
                </h4>

                <ul class="list-group mb-3 z-depth-1">
                    <?php
                    $total = 0;
                    $cemail = $_SESSION['username'];
                    $result = $mysqli->query("SELECT orders.quantity as qty, products.cost_per_item as pci, orders.id as orderid, products.product_name as prodname, orders.no_of_days as nod FROM orders JOIN products ON orders.product_id=products.id JOIN customers ON customers.customer_id=orders.customer_id WHERE customers.email='$cemail' AND orders.order_status='pending'") or die($mysqli->error);
                    while ($row = $result->fetch_assoc()) {
                        $orderid = $row['orderid'];
                        $productname = $row['prodname'];
                        $qty = $row['qty'];
                        $pci = $row['pci'];
                        $no_of_days = $row['nod'];
                        $cost = $qty * $pci * $no_of_days; // multiply by no_of_days from orders table
                        $total += $cost;

                        echo "
                        <li class='list-group-item d-flex justify-content-between lh-condensed'>
                            <div>
                                <h6 class='my-0'>$productname</h6>
                                <small class='text-muted'>Rooms: $qty | Days: $no_of_days</small>
                            </div>
                            <span class='text-muted'>Ksh: $cost</span>
                            <a href='checkout.php?delid=$orderid' class='text-muted'><p style='color:red'>Remove</p></a>
                        </li>";
                    }
                    echo "
                    <li class='list-group-item d-flex justify-content-between'>
                        <span>Total (KSH)</span>
                        <strong>Ksh: $total</strong>
                    </li>";
                    ?>
                </ul>
            </div>

            <div class="col-md-8 mb-4">
                <div class="card">
                    <form class="card-body" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <?php
                                $orderIds = [];
                                $total = 0;
                                $result = $mysqli->query("SELECT orders.quantity as qty, products.cost_per_item as pci, orders.id as orderid, customers.customer_id as custid, customers.firstname as cfirstname, customers.lastname as clastname, orders.no_of_days as nod FROM orders JOIN products ON orders.product_id = products.id JOIN customers ON customers.customer_id = orders.customer_id WHERE customers.email='$cemail' AND orders.order_status='pending'") or die($mysqli->error);

                                while ($row = $result->fetch_assoc()) {
                                    $orderid = $row['orderid'];
                                    $custid = $row['custid'];
                                    $cfirstname = $row['cfirstname'];
                                    $clastname = $row['clastname'];
                                    $qty = $row['qty'];
                                    $pci = $row['pci'];
                                    $no_of_days = $row['nod'];
                                    $cost = $qty * $pci * $no_of_days;
                                    $total += $cost;
                                    $grand = $ship + $total;
                                    $orderIds[] = $orderid;
                                    $otime = time();
                                }
                                ?>
                                <div class="md-form">
                                    <input type="text" id="custId" name="custid" value="<?php echo $custid; ?>" readonly class="form-control">
                                    <label for="custId" class="">Customer ID</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="firstName" value="<?php echo $cfirstname; ?>" class="form-control" readonly>
                                    <label for="firstName" class="">First Name</label>
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <div class="md-form">
                                    <input type="text" id="lastName" value="<?php echo $clastname; ?>" class="form-control" readonly>
                                    <label for="lastName" class="">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" readonly id="totalDays" class="form-control" value="<?php echo $no_of_days; ?>">
                            <label for="totalDays" class="">Total Days of Stay</label>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" readonly id="roomCost" class="form-control" value="<?php echo $total; ?>">
                            <label for="roomCost" class="">Room Cost (Ksh)</label>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" readonly id="extraCost" class="form-control" value="<?php echo $ship; ?>">
                            <label for="extraCost" class="">Extra Services Cost (Ksh)</label>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" readonly id="grandTotal" class="form-control" name="total" value="<?php echo $grand; ?>">
                            <label for="grandTotal" class="">Total Cost (Ksh)</label>
                        </div>

                        <div class="md-form mb-5">
                            <input type="text" id="transactionId" name="tid" class="form-control" placeholder="Transaction ID" required>
                            <label for="transactionId" class="">Transaction ID</label>
                        </div>

                        <input type="hidden" name="oids" value="<?php echo implode(',', $orderIds); ?>">
                        <input type="hidden" name="otime" value="<?php echo $otime; ?>">

                        <button type="submit" name="checkout" class="btn btn-primary btn-block">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- SCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mdb.min.js"></script>
</body>
</html>
