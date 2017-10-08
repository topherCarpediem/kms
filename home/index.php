<?php 
include '../classes/dbHelper.php';

?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">

        <div class="navbar-header">
          <a href="">   <img class="navbar-brand" src="../img/sad.png"></img></a>
          <a href="../index.html" class="navbar-brand"><b>Gender &</b> Development</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="mandates.php">GAD Mandates</a></li>
            <li><a href="linkages.php">Linkages</a></li>
            <li><a href="ppa.php">PPA</a></li>
            <li><a href="resources.php">Resources</a></li>
            <li><a href="connected_sites.php">Connected Sites</a></li>
            <li><a href="../admin/login.php">Login</a></li>
           
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
      
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
  

      <!-- Main content -->
      <section class="content">
        <div class="jumbotron">
            <h3 class="display-3">Knowledge Management System</h3>
            <p class="lead">To formulate and implement an effective mechanism for planning, policy-making, financing, management, monitoring and assessment of the Extension Service of the University</p>
            <hr class="my-4">
         
          </div>
        
        <div class="row">

          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM gad')[0]['count']); ?></h4>
                   <p>GAD Mandates</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-book"></i>
                  </div>
                  <a href="events.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>


          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM linkages')[0]['count']); ?></h4>
                    <p>Linkages</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-link"></i>
                  </div>
                  <a href="events.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>


          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
               <div class="small-box bg-red">
                  <div class="inner">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM ppa')[0]['count']); ?></h4>
                    <p>PPA</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-bandcamp"></i>
                  </div>
                  <a href="events.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>

           <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM resources')[0]['count']); ?></h4>
                    <p>Resources</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-connectdevelop"></i>
                  </div>
                  <a href="events.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>

           <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                 <div class="small-box bg-navy ">
                  <div class="inner">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM connected_sites')[0]['count']); ?></h4>
                    <p>Connected Sites</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-external-link"></i>
                  </div>
                  <a href="events.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>


        </div>
     
      
     
      
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright & KMS 2017.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
</body>
</html>
