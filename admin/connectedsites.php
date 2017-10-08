<?php 
include '../Login/logout.php';

include '../classes/fileChecker.php';
include '../classes/stringGenerator.php';


if(!Login::isLoggedIn()){
  header('location: ../admin/login.php');
}
$errors = array();
$success = array();

if (isset($_POST['submit-form'])) {
  try {
    if(File::checkImage($_FILES['document']['tmp_name'])){
      $target_dir = "uploads/images/";
      $target_file = $target_dir . basename(Random::generateRandomString() . '-' . $_FILES["document"]["name"]);
      $conn_params = array( ':filepath'=> $target_file, ':content_type'=> $_FILES['document']['type'], ':sitename'=> $_POST['sitename'],':sitelink'=> $_POST['sitelink']);
      DB::query('INSERT INTO connected_sites VALUES(\'\', :sitename, :sitelink, :filepath, :content_type)', $conn_params);
      move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);
      array_push($success, 'Upload successful');
      }else{
        array_push($errors, 'Invalid imagefile');
      }
  } catch (Exception $e) {
      array_push($errors, $e);
  }
  
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMSADMIN | Connected Sites</title>
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
       
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php $res = DB::query('SELECT firstname, lastname, email FROM users WHERE id=:id', 
                                      array(':id'=>Login::isLoggedIn()));
                                      echo $res[0]['firstname']. ' ' . $res[0]['lastname'];
                                      ?></span></a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php echo $res[0]['firstname']. ' ' . $res[0]['lastname']; ?>
                  <small><?php echo $res[0]['email']; ?></small>
                </p>
              </li>
         
              <li class="user-footer">
                <form method="post" action="../Login/logout.php">
                  <div class="pull-right">
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
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  <?php echo $res[0]['firstname']. ' ' . $res[0]['lastname']; ?></p>
          
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
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

       <li >
          <a href="linkages.php">
            <i class="fa fa-link"></i>
            <span>Linkages</span>
          </a>
        </li>

         <li  >
          <a href="ppa.php">
            <i class="fa fa-bandcamp"></i>
            <span>PPA</span>
          </a>
        </li>

        <li >
          <a href="resources.php">
            <i class="fa fa-connectdevelop"></i>
            <span>Resources</span>
          </a>
        </li>

        <li class="active">
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
       Connected Sites
        <small>External link</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Connected Sites</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add external link</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action"connectedsites.php" method="post" enctype="multipart/form-data">
              <?php  if (count($errors) > 0) : ?>
                  <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                      <p><?php echo $error ?></p>
                    <?php endforeach ?>
                  </div>
                <?php  endif ?>

                <?php  if (count($success) > 0) : ?>
                  <div class="alert alert-success">
                    <?php foreach ($success as $success) : ?>
                      <p><?php echo $success ?></p>
                    <?php endforeach ?>
                  </div>
                <?php  endif ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="sitename">Name of site</label>
                  <input type="text" class="form-control" name="sitename" id="sitename" placeholder="Enter sitename" required>
                </div>
               
                <div class="form-group">
                  <label for="link">Short description</label>
                  <textarea type="text" class="form-control" name="sitelink" id="link" placeholder="Enter link" required style="resize: vertical; max-height: 200px; min-height: 120px;"></textarea> 
                </div>
               <div class="form-group">
                  <label for="document">Upload Photo</label>
                  <input type="file" id="document" name="document" accept="image/*" required />

                  <p class="help-block">Select image for the cover</p>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" name="submit-form" class="btn btn-primary">Publish</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
    <strong>Copyright &copy; 2017 KMS</strong> All rights
    reserved.
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
<script>
  $(function () {
    $('#example1').DataTable({
      select: true
    })
  })


  $("#yes").click(function(e){

      let http = new XMLHttpRequest()
      http.onreadystatechange = function(){
        if (http.status == 200 && http.readyState == 4 ) {
          //console.log(http.response)
          window.location=window.location;
        }
      }
      http.open("POST", "delete.php", true);
      http.send(e.target.value);
    
  });


 var tb = document.getElementById('table-body');
 tb.onclick = function(e){
    var post = document.getElementById('post')
  
    if(e.target.parentNode.id == 0){
     post.innerHTML = "<i class='fa fa-paper-plane' aria-hidden='true'></i> Post"
    }else{
      post.innerHTML = "<i class='fa fa-paper-plane' aria-hidden='true'></i> Remove from post"
    }
    $("#ppa").attr("value", e.target.id)
    $("#yes").attr("value", e.target.id)
  
 }





</script>

</body>
</html>
