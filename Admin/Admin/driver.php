
<?php
session_start();
include("../db.php");
include  "sidebar.php";
include  "navbar.php";
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
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="addroom_service.php">New</a></li>
              <li class="breadcrumb-item"><a href="driverdelete.php">Delete</a></li>
      
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
            <h3 class="card-title">Pending room_service</h3>
          </div>
          <!--card body-->
                  <div class="class-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr><th>DRIVER_ID</th><th>DRIVER_NAME</th><th>EMAIL</th><th>VAN_ID</th><th>STATUS</th><th>ACTION</tr>
                      </thead>
                      <?php
                  $result=$mysqli->query("select * from room_service where account_status='pending'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['driver_id']."</td>
                    <td>".$row['driver_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['van_id']."</td>
                    <td>".$row['account_status']."</td>
                    
                   <td> <a href='driver.php?apdid=$row[driver_id]' class='btn btn-success'>Approve<a>
                   <a href='driver.php? rjdid=$row[driver_id]' class='btn btn-danger'>Reject<a></td>
                   </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='../ereport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>
<?php
    if(isset($_GET['apdid']))
  {
    $driver_id=$_GET['apdid'];
    $result = $mysqli->query("UPDATE room_service SET Status= 'approved' WHERE driver_id = $driver_id") or die($mysqli->error);
   
  
        echo '<script>alert("Record Approved!")</script>';
  
  }
     if(isset($_GET['rjdid']))
  {
    $driver_id=$_GET['rjdid'];
    $result = $mysqli->query("UPDATE room_service SET Status= 'rejected' WHERE driver_id = $driver_id") or die($mysqli->error);
   
  
       echo '<script>alert("Record Rejected!")</script>';
   
  }
  ?>
</div>
<div class="card">
            <div class="card-header">
            <h3 class="card-title">Approved room_service</h3>
          </div>
          <!--card body-->
                  <div class="class-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr><th>DRIVER_ID</th><th>DRIVER_NAME</th><th>EMAIL</th><th>VAN_ID</th><th>STATUS</th></tr>
                      </thead>
                      <?php
                  $result=$mysqli->query("select * from room_service where account_status='approved'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['driver_id']."</td>
                    <td>".$row['driver_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['van_id']."</td>
                    <td>".$row['status']."</td>
                   </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='../ereport.php' class='btn btn-danger'>Export to PDF</a></td>
</div>

</div>
<div class="card">
            <div class="card-header">
            <h3 class="card-title">Rejected room_service</h3>
          </div>
          <!--card body-->
                  <div class="class-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                        <tr><th>DRIVER_ID</th><th>DRIVER_NAME</th><th>EMAIL</th><th>VAN_ID</th><th>STATUS</th></tr>
                      </thead>
                      <?php
                  $result=$mysqli->query("select * from room_service where account_status='rejected'")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['driver_id']."</td>
                    <td>".$row['driver_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['van_id']."</td>
                    <td>".$row['status']."</td>
                 
                   </tbody>
                    "
                  ;}
            ?>
</table>
<td><a href='../ereport.php' class='btn btn-danger'>Export to PDF</a></td>
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
