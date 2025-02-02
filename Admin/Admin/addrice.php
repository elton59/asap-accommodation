
<?php
session_start();
include  ("../db.php");
include  ("sidebar.php");
include  ("navbar.php");
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ASAP Accomodation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php
  if(isset($_POST['add']))
  {
     $pid=$_POST['product_name'];
     $type=$_POSST['type'];
     $quantity=$_POST['quantity'];
     $mid=$_POST['mill_id'];
      $img=$_POST['image'];

      $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "Ahero";
            //create connection
             $mysqli= new mysqli($servername,$username,$password,$db);
          
            $sql=$mysqli->query("INSERT INTO rice(product_name,type,quantity,mill_id,image) VALUES('$pname','$type','$quantity','$mid','$img')") or die($mysqli->error);
            if($sql){
      
      echo "<script>alert('record updated successfully');
        window.location.replace('addraw.php');

            </script>";

    }
    else
    {
      echo "<script><alert>('record updation failed');
            </script>";
    }

  }
  ?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title"> finished products
          </div>
    <?php
    if(isset($_POST['product_name']))
    {
      $pid=$_POST['product_name'];
    }
     if(isset($_POST['type']))
     {
      $type=$_POSST['type'];
     }
     if(isset($_POST['quantity']))
     {
      $quantity=$_POST['quantity'];
     }
     if(isset($_POST['mill_id']))
     {
      $mid=$_POST['mill_id'];
    }
      if(isset($_POST['image']))
     {
      $img=$_POST['image'];
     }
    ?>
                   <form role="form">
                	<div class="class-body">
                      <div class="form-group">
                      <label for="product_name">ProductName</label></br>
                        <input type="text" class="form-control" id="product_name" placeholder="enter product name"  
                        name="product_name"/ required>
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" placeholder="enter type" name="type" required/><br/>
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity"  placeholder="enter quantity" name="quantity" required/> 
                        <label for="mill_id">MillID</label>
                        <input type="text" class="form-control" id="mill_id" placeholder="entermillid" name="mill_id"/>
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" placeholder="entermillid" name="image"/>
                        <input type="submit" name="add" class="btn btn-info" value="add"/>
                        <input type="reset" name="cancel" value="cancel" class="btn btn-danger"/>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy;  <a href="http://TEVIN OBIERO.html">TEVIN OBIERO 2024</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
