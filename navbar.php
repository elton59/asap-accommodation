<?php
  include('db.php');
  session_start();
  ?>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="index.php" target="_blank">
        <strong class="blue-text">ASAP  Accomodation</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="aboutus.php" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="help.php" target="_blank">Help</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link waves-effect" data-toggle="dropdown" href="#">
              Staff
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">
                <a href="./staff/financemanager/">Finance Manager</a>
              </span>
              <span class="dropdown-item dropdown-header">
                <a href="./staff/property_manager/">Property Manager</a>
              </span>
              <span class="dropdown-item dropdown-header">
                <a href="./staff/room_service_manager/">RoomService Manager</a>
              </span>
              <span class="dropdown-item dropdown-header">
                <a href="./staff/room_service/">Room Service</a>
              </span>
            </div>
          </li>
        </ul>

        <li class="nav-item dropdown">
          <a data-toggle="dropdown" href="#">
            <?php
            if (isset($_SESSION['username'])) {
              $sname = $_SESSION['username'];
              $result = $mysqli->query("SELECT * FROM customers WHERE email='$sname'");
              if ($result) {
                while ($row = $result->fetch_assoc()) {
                  $fname = $row['firstname'];
                  echo "Hi $fname";
                  echo "<i class='far fa-user-circle'></i> <div class='dropdown-menu dropdown-menu-lg dropdown-menu-right'>
                    <a href='#'></a>
                    <span class='dropdown-item dropdown-header'>
                    <a href='#'>Profile</a></span>
                    <span class='dropdown-item dropdown-header'>
                    <a href='orders.php'>Orders</a></span>
                    <span class='dropdown-item dropdown-header'>
                    <a href='logout.php'>Logout</a></span></div>";
                }
              }
            }
            ?>
          </a>
        </li>

        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="shipment.php" class="nav-link waves-effect">
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Bookings <span class="badge red z-depth-1 mr-1">
                <?php
                if (isset($_SESSION['username'])) {
                  $total = 0;
                  $cemail = $_SESSION['username'];
                  $result = $mysqli->query("SELECT count(orders.id) as oid from orders join customers on orders.customer_id=customers.customer_id where customers.email='$cemail' and orders.order_status='pending'") or die(mysqli_error($mysqli));
                  while ($row = $result->fetch_assoc()) {
                    $roid = $row['oid'];
                    $total = $total + $roid;
                    if ($total > 0) {
                      echo "<h3>$total</h3>";
                    } else {
                      echo "0";
                    }
                  }
                } else {
                  echo "0";
                }
                ?>
              </span></span>
            </a>
          </li>
          <li class="nav-item">
          <a href="notifications.php" class="nav-link waves-effect">
            <i class="fas fa-bell"></i>
            <span class="clearfix d-none d-sm-inline-block">
              <?php
              if (isset($_SESSION['username'])) {
                $cemail = $_SESSION['username'];
                $cemail = $_SESSION['username'];
                $query = "SELECT * FROM customers WHERE email='$cemail' LIMIT 1";
                $result2 = $mysqli->query($query);
                $row = $result2->fetch_assoc();
                $a = $row['customer_id'];
                $result = $mysqli->query("SELECT COUNT(*) as count FROM orders WHERE customer_id='$a'");
                if ($result) {
                  $row = $result->fetch_assoc();
                  $count = $row['count'];
                  if ($count > 0) {
                    echo "<span class='badge red z-depth-1 mr-1'>$count</span>";
                  }
                }
              }
              ?>
            </span>
          </a>
        </li>
          <li class="nav-item">
            <a href="emails_form.php" class="nav-link waves-effect">
              <i class="fas fa-comment-alt"></i> ContactUs
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->