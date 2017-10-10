<?php 
include '../Login/logout.php';
include 'download.php';
include '../classes/stringGenerator.php';
include '../classes/fileChecker.php';



if(!Login::isLoggedIn()){
  header('location: ../admin/login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMSADMIN | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
 
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <link rel="stylesheet" href="bower_components/datatable-select/select.dataTables.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>KMS</b>ADMIN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
         
            <?php $res = DB::query('SELECT firstname, lastname, email, image FROM users WHERE id=:id', 
            array(':id'=>Login::isLoggedIn())); ?>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= $res[0]['image'] ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $res[0]['firstname']. ' ' . $res[0]['lastname'];?></span></a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= $res[0]['image'] ?>" id="user-profile" class="img-circle" alt="User Image">
                  <p>
                   <?php echo $res[0]['firstname']. ' ' . $res[0]['lastname']; ?>
                    <small><?php echo $res[0]['email']; ?></small>
                  </p>
                </li>
           
                <li class="user-footer">
                <form method="post" action="../Login/logout.php">
                    <div class="pull-right">
                      <a href="register.php" class="btn btn-primary">Add User</a>
                      <button type="submit" class="btn btn-default btn-flat" name="logout">Sign out</button>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="events.php">
            <i class="fa fa-calendar"></i>
            <span>Events</span>
          </a>
        </li>

        <li  >
          <a href="gad.php">
            <i class="fa fa-book"></i>
            <span>GAD Mandates</span>
          </a>
        </li>

       <li>
          <a href="linkages.php">
            <i class="fa fa-link"></i>
            <span>Linkages</span>
          </a>
        </li>

         <li>
          <a href="ppa.php">
            <i class="fa fa-bandcamp"></i>
            <span>PPA</span>
          </a>
        </li>

        <li>
          <a href="resources.php">
            <i class="fa fa-connectdevelop"></i>
            <span>Resources</span>
          </a>
        </li>

        <li>
          <a href="connectedsites.php">
            <i class="fa fa-external-link"></i>
            <span>Connected Sites</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Main page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM calendar')[0]['count']); ?></h3>

              <p>Events</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <a href="events.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM gad')[0]['count']); ?></h3>

              <p>GAD Mandates</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="gad.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM linkages')[0]['count']); ?></h3>

              <p>Linkages</p>
            </div>
            <div class="icon">
              <i class="fa fa-link"></i>
            </div>
            <a href="linkages.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM ppa')[0]['count']); ?></h3>

              <p>PPA</p>
            </div>
            <div class="icon">
                <i class="fa fa-bandcamp"></i>
            </div>
            <a href="ppa.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM resources')[0]['count']); ?></h3>

              <p>Resources</p>
            </div>
            <div class="icon">
                  <i class="fa fa-connectdevelop"></i>
            </div>
            <a href=resources.php class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy ">
            <div class="inner" style="padding-bottom: 50px">
              <h3><?php echo(DB::query('SELECT COUNT(*) as count FROM connected_sites')[0]['count']); ?></h3>

              <p>Connected Sites</p>
            </div>
            <div class="icon">
                 <i class="fa fa-external-link"></i>
            </div>
            <a href="connectedsites.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.row -->


     
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <footer class="main-footer">
    <div class="container" style="text-align: center;">
      
      <strong>Copyright & KMS 2017.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
 
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Warning!</h4>
        </div>
        <div class="modal-body">
          <p>Continue with deletion?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Close</button>
          <button type="button" id="yes" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editProfile" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">More about <?= $res[0]['firstname'] ?></h4>
          </div>
          <div class="modal-body">
              <center>
                <img src="<?= $res[0]['image'] ?>" class="img-circle" alt="User Image" style="width: 160px; height: 160px"><br>
              </center>
              <center>
                  <h4><i class="fa fa-user" aria-hidden="true"></i> <?= $res[0]['firstname'] . ' ' . $res[0]['lastname'] ?></h4>
                  <h4><i class="fa fa-envelope" aria-hidden="true"></i> <?= $res[0]['email'] ?></h4>
                  <hr>
              </center>
              <div id="status">
              
              </div>
              <button data-toggle="collapse" data-target="#change_pass" class="btn btn-primary">Change password</button>
              <div id="change_pass" class="collapse">
                  <div class="form-group">     
                      <label>Old password</label>
                      <input type="password" id="old_password" class="form-control" placeholder="Enter old password" required>
                      <label>New password</label>
                      <input type="password" id="password_1" class="form-control" placeholder="Enter new password" required>
                      <label>Re-enter new password</label>
                      <input type="password" class="form-control" id="password_2" placeholder="Re-enter new password" required> <br> 
                      <button id="submit_pass" class="btn btn-primary">Submit</button>
                  </div>
              </div>
              <hr>
              <button data-toggle="collapse" data-target="#update_photo" class="btn btn-primary">Update photo</button>
              <div id="update_photo" class="collapse">
                <form action="events.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">     
                      <label>Select new photo</label>
                      <input type="file" id="new_photo" name="new_photo" required><br>
                      <button type="submit" id="upload" name="update_photo" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfile">Close</button>
            
          </div>
        </div>
      </div>
    </div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/datatable-select/dataTables.select.min.js"></script>
<script src="js/userinfo.js"></script>
<script>


</script>

</body>
</html>
