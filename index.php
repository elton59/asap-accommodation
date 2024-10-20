<?php
include("navbar.php");
include("db.php");
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
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    .filter-container {
      margin: 20px 0;
    }
  </style>
</head>

<body>

  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('./img/frag.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Discover Your Perfect Stay</strong>
              </h1>
              <p>
                <strong>Our platform connects travelers with trusted property managers</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>Our platform connects travelers with trusted property managers across Kenya, offering a seamless booking experience for vacation rentals, serviced apartments, and more. Whether you're looking for a cozy getaway or a long-term stay, find the perfect place to call home during your travels...</strong>
              </p>
              <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Book Now</a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('./img/frag.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Simplified Property Management</strong>
              </h1>
              <p>
                <strong>easy-to-use interface to list</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>We provide property owners and managers with an easy-to-use interface to list, manage, and update their properties in real-time. With our secure platform, you'll be able to reach a wider audience and manage bookings effortlessly</strong>
              </p>
              <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Book Now</a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('./img/frag.jpg'); background-repeat: no-repeat; background-size: cover;">
          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Best of the best</strong>
              </h1>
              <p>
                <strong>Seamless Booking Experience</strong>
              </p>
              <p class="mb-4 d-none d-md-block">
                <strong>With user-friendly features like real-time availability, geolocation services, and detailed property listings, our platform makes finding and booking accommodation quick and stress-free.</strong>
              </p>
              <a target="_blank" href="#" class="btn btn-outline-white btn-lg">Book Now</a>
            </div>
            <!-- Content -->
          </div>
          <!-- Mask & flexbox options-->
        </div>
      </div>
      <!--/Third slide-->
    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container">
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
        <!-- Navbar brand -->
        <span class="navbar-brand">Categories:</span>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?category=all">All
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=floral">Vacation Rentals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=citrus">Serviced Apartments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?category=aquatic">Budget Accommodations</a>
            </li>
          </ul>
          <!-- Links -->

          <form class="form-inline" method="get" action="">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-white btn-sm my-0" type="submit">Search</button>
            </div>
          </form>
        </div>
        <!-- Collapsible content -->
      </nav>
      <!--/.Navbar-->

      <!--Filter Section-->
      <div class="filter-container">
        <form class="form-inline" method="get" action="">
          <div class="form-group mx-2">
            <label for="location">Location:</label>
            <select name="location" id="location" class="form-control">
              <option value="">Select Location</option>
              <option value="Kisumu">Kisumu</option>
              <option value="Nairobi">Nairobi</option>
              <option value="Nyeri">Nyeri</option>
              <option value="Mombasa">Mombasa</option>
            </select>
          </div>

          <div class="form-group mx-2">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control">
              <option value="">Select Type</option>
              <option value="bnb">Bnb</option>
              <option value="double">Double</option>
              <option value="single">Single</option>
            </select>
          </div>

          <div class="form-group mx-2">
            <label for="price">Max Price:</label>
            <input type="range" class="form-control-range" id="price" name="price" min="0" max="100000" step="100" oninput="this.nextElementSibling.value = this.value">
            <output>0</output>
          </div>

          <button type="submit" class="btn btn-primary mx-2">Filter</button>
        </form>
      </div>
      <!--/Filter Section-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">
        <div class="row wow fadeIn">
          <?php
          $i = 0;
          $product_id = array();
          $category = isset($_GET['category']) ? $_GET['category'] : 'all';
          $search = isset($_GET['search']) ? $_GET['search'] : '';
          $location = isset($_GET['location']) ? $_GET['location'] : '';
          $type = isset($_GET['type']) ? $_GET['type'] : '';
          $price = isset($_GET['price']) ? $_GET['price'] : '';

          // Build the query based on the category, location, type, and search
          $query = "SELECT * FROM products WHERE status='approved' AND stock_balance > 0";

          if ($category !== 'all') {
            $query .= " AND category='" . $mysqli->real_escape_string($category) . "'";
          }

          if (!empty($search)) {
            $query .= " AND (product_name LIKE '%" . $mysqli->real_escape_string($search) . "%' OR category LIKE '%" . $mysqli->real_escape_string($search) . "%')";
          }

          if (!empty($location)) {
            $query .= " AND location='" . $mysqli->real_escape_string($location) . "'";
          }

          if (!empty($type)) {
            $query .= " AND type='" . $mysqli->real_escape_string($type) . "'";
          }

          if (!empty($price)) {
            $query .= " AND cost_per_item <= " . intval($price);
          }

          $result = $mysqli->query($query);

          if ($result === FALSE) {
            die($mysqli->error);
          }

          if ($result) {
            while ($obj = $result->fetch_object()) {
              echo "
                <div class='col-lg-3 col-md-6 mb-4' style='overflow-wrap: break-word; word-wrap: break-word;'>
                  <div class='card'>
                    <div class='view overlay'>
                      <img src='./img/perfumes/$obj->product_img_name' class='card-img-top' alt=''>
                      <a href='products.php?id=$obj->id'>
                        <div class='mask rgba-white-slight'></div>
                      </a>
                    </div>
                    <div class='card-body text-center'>
                      <a href='' class='grey-text'>
                        <h5>$obj->category</h5>
                      </a>
                      <h5>
                        <strong>
                          <a href='' class='dark-grey-text'>$obj->product_name 
                            <span class='badge badge-pill danger-color'>NEW</span><br/>
                          </a>
                          <a href='' class='dark-grey-text'>location: $obj->location</a>
                        </strong><br/>
                        <a href='' class='dark-grey-text'>Type: $obj->type</a>
                        </strong><br/>
                        <a href='' class='dark-grey-text'>Rooms: $obj->stock_balance</a>
                        </strong>
                      </h5>
                      <h4 class='font-weight-bold blue-text'>
                        <strong>Ksh $obj->cost_per_item</strong>
                      </h4>
                    </div>
                  </div>
                </div>";
              $i++;
            }
          }
          ?>
        </div>
      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <nav aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
          </li>
          <li class="page-item active">
            <a class="page-link" href="#">1</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
      <!--/Pagination-->

      <?php include("footer.php"); ?>
    </div>
  </main>
  <!--Main layout-->

  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/mdb.min.js"></script>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
  <script src="js/script.js"></script>
</body>

</html>
