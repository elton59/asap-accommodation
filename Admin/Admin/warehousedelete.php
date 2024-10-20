
<?php
session_start();
error_reporting(0);
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
            <h3 class="card-title">Delete Warehouse</h3>
          </div>
          <!--card body-->
                  <div class="card-body">
                    <div class="table-responsive ps">
                  <table class="table table-bordered table-hover" id="page1">
                  <thead class="text-primary">
                  <th>WarehouseID</th><th>WarehouseName</th><th>Location</th><th>StorekeeperID</th><th>StorekeeperName</th><th>Status</th><th>action</th></thead>
                    <?php
                  $result=$mysqli->query("select * from warehouse")or die($mysqli->error);
                  while($row=$result->fetch_assoc())
                  {
                    echo

                    "
                    <tbody>
                    <td>".$row['warehouse_id']."</td>
                    <td>".$row['warehouse_name']."</td>
                    <td>".$row['location']."</td>
                    <td>".$row['storekeeper_id']."</td>
                    <td>".$row['storekeeper_name']."</td>
                    <td>".$row['status']."</td>
                   <td> <a href='warehousedelete.php?wid=$row[warehouse_id]' class='btn btn-info'>edit<a>
                   <a href='delete.php? wid=$row[warehouse_id]' class='btn btn-danger'>delete<a></td>
                   </tbody>
                    "
                  ;}
            ?>
          </table>
        </div>
      </div>
    </div>

       <div class="card">  
     <?php

  if(isset($_GET['wid']))
  {
    $warehouse_id=$_GET['wid'];
    $result=$mysqli->query("select * from warehouse where warehouse_id=$warehouse_id")or die($mysqli->error);
    $row=$result->fetch_array();
    $wname=$row['warehouse_name'];
    $wlocation=$row['location'];
    $wsid=$row['storekeeper_id'];
    $wsname=$row['storekeeper_name'];
    echo "success";
  }
  else
  {
   echo "records will be displayed here";
  }

  ?>
  
            <div class="card-header">
            <h3 class="card-title">update Warehouse</h3>

          </div>
          <!--card body-->
          <div class="card-body">
                <?php
            if(isset($_POST['wid']))
            {
              $wid=$_POST['wid'];
            }
            if(isset($_POST['wname']))
            {
              $wname=$_POST['wname'];
            }
            if(isset($_POST['wlocation']))
            {
              $wlocation=$_POST['wlocation'];
            }
            if(isset($_POST['wsid']))
            {
              $wsid=$_POST['wsid'];
            }
            if(isset($_POST['wsname']))
            {
              $wsname=$_POST['wsname'];
            }

            ?>
           
             <form role="form" method="POST" action="warehouseupdate.php">

                  <div class="class-body">
                      <div class="form-group">
                        <input type="hidden" name="wid" value="<?php echo $_GET['wid'];?>"/>
                      <label for="warehouse_name">WarehouseName</label>
                       <input type="text" name="wname" id="warehouse_name" placeholder=" warehouse name"       
                        class="form-control" value="<?php echo $wname; ?>"  /></br>
                        <label for="location">Location</label>
                        <input type="text" name="wlocation" id="location" placeholder=" location"  class="form-control" value="<?php echo $wlocation; ?>" /><br/>
                        <label for="storekeeper_id">StorekeeperID</label>
                        <input type="text" name="wsid" id="storekeeper_id" placeholder="storekeeperid"  class="form-control" value="<?php echo $wsid;?>" ></br>
                        <label for="storekeeper_name">StorekeeperName</label></br>
                        <input type="text" name="wsname" id="storekeeper_name" placeholder="storekeepername" required class="form-control" value="<?php echo $wsname; ?>" />
                        <input type="submit" class="btn btn-success" name="updatewarehouse" value="update"/>
                       
                    </div>
                  </div>
                </form>
         
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
