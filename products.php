<?php
include("navbar.php");
include("db.php");
$id = $_GET['id'];
?>
<!DOCTYPE html>
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
  <!-- Custom styles -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

<?php
if (isset($_POST['addcart'])) {
  $qty = $_POST['qty'];
  $bdate = $_POST['bdate'];
  $ldate = $_POST['ldate']; // Leaving date
  $user = $_SESSION['username'];

  // Fetch customer ID based on the session username
  $result = $mysqli->query("SELECT * FROM customers WHERE email='$user' LIMIT 1") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $cid = $row['customer_id'];

  if ($cid == 0) {
    echo "<script>
      alert('Please create an account first');
      window.location.replace('login.php');
    </script>";
    exit;
  }

  // Fetch the stock balance of the product
  $result2 = $mysqli->query("SELECT stock_balance FROM products WHERE id='$id' LIMIT 1");
  $product = $result2->fetch_assoc();
  $stock_balance = $product['stock_balance'];

  // Check if the requested quantity exceeds the available stock
  if ($qty > $stock_balance) {
    echo "<script>
      alert('You have exceeded the maximum number of available rooms.');
      window.history.back(); 
    </script>";
  } else {
    // Proceed with booking if stock is sufficient
    $mysqli->query("INSERT INTO orders (product_id, customer_id, quantity, orderdate, leave_date) 
                    VALUES ('$id', '$cid', '$qty', '$bdate', '$ldate')");
    echo "<script>window.location.replace('index.php');</script>";
  }
}
?>

<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">
    <div class="row wow fadeIn">
      <center>
        <div class="col-md-6 mb-4">
          <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
            while ($obj = $result->fetch_object()) {
              echo "<img src='./img/perfumes/$obj->product_img_name' class='img-fluid' style='width:400px' alt=''>";
            }
          }
          ?>
        </div>
      </center>

      <div class="col-md-6 mb-4">
        <div class="p-4">
          <div class="mb-3">
            <span class="badge purple mr-1">
              <?php
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
                while ($obj = $result->fetch_object()) {
                  echo "$obj->category";
                }
              }
              ?>
            </span>
          </div>

          <p class="lead">
            <span class="mr-1">
              <del>
                <?php
                if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
                  while ($obj = $result->fetch_object()) {
                    $p2 = $obj->cost_per_item + 200;
                    echo "$p2";
                  }
                }
                ?>
              </del>
            </span>
            <span>
              <?php
              if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
                while ($obj = $result->fetch_object()) {
                  $p2 = $obj->cost_per_item;
                  echo "$p2";
                }
              }
              ?>
            </span>
          </p>

          <p class="lead font-weight-bold">Description</p>
          <p>Type:
            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
              while ($obj = $result->fetch_object()) {
                echo "$obj->type";
              }
            }
            ?>
          </p>
          <p> Location:
            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
              while ($obj = $result->fetch_object()) {
                echo "$obj->location";
              }
            }
            ?>
          </p>
          <p>Available Rooms:
            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
              while ($obj = $result->fetch_object()) {
                echo "$obj->stock_balance";
              }
            }
            ?>
          </p>
          <p>
            <?php
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $result = $mysqli->query("SELECT * FROM products WHERE id='$id'");
              while ($obj = $result->fetch_object()) {
                echo "$obj->description";
              }
            }
            ?>
          </p>

          <!-- Booking Form with Booking and Leaving Date -->
          <form class="d-flex flex-column align-items-start" method="post">
            <div class="form-group w-100 mb-3">
              <label for="bdate" class="font-weight-bold">Booking Date</label>
              <input type="date" name="bdate" required class="form-control" id="bdate">
            </div>
            <div class="form-group w-100 mb-3">
              <label for="ldate" class="font-weight-bold">Leaving Date</label>
              <input type="date" name="ldate" required class="form-control" id="ldate">
            </div>
            <div class="form-group w-100 mb-3">
              <label for="qty" class="font-weight-bold">Number of Rooms</label>
              <input type="number" name="qty" placeholder="No. of rooms" required class="form-control" id="qty">
            </div>
            <button name="addcart" class="btn btn-primary btn-md my-0" type="submit">Book Room</button>
          </form>

        </div>
      </div>

    </div>

    <hr>

    <div class="row d-flex justify-content-center wow fadeIn">
      <div class="col-md-6 text-center">
        <h4 class="my-4 h4">Related Properties</h4>
        <p class="hidden">Explore similar properties in the market and compare them side by side.</p>
      </div>
    </div>

    <div class="row wow fadeIn">
      <?php
      $result = $mysqli->query("SELECT * FROM products WHERE status='instock' LIMIT 3");
      while ($obj = $result->fetch_object()) {
        echo "
        <center>
        <a href='products.php?id=$obj->id'>
          <div class='col-lg-4 col-md-6 mb-4'>
            <img src='./img/perfumes/$obj->product_img_name' style='width:400px' class='img-fluid' alt=''>
          </div>
        </a>
        </center>";
      }
      ?>
    </div>

  </div>
</main>

<?php include("footer.php") ?>

<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">
  new WOW().init();
</script>

</body>

</html>
