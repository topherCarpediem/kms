<?php 
include '../classes/dbHelper.php';

?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMS</title>
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
          <a href="index.php" class="navbar-brand"><b>Gender & Development</a></b>
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
    <div class="con" style="float: right; margin-top: 20px;margin-right: 20px; width: 230px">
    <div class="box box-primary" style="height: 600px">
      <div class="box-header with-border">
        <p>Events</p>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div style="padding: 5px">
      <?php $events = DB::query('SELECT * FROM calendar WHERE isPublished=TRUE');?>
      <?php if(count($events) > 0){ ?>
        <?php foreach ($events as $item){ ?>
        <small><b><?= $item['title']; ?></b></small><br>
        <small><b>WHEN: </b><?= $item['start'] . " to " . $item['end'] ?></small><br>
        <small><b>TIME: </b><?= $item['timestart'] . " to " . $item['timeend'] ?></small><br>
        <small><b>WHAT: </b><?= $item['summary'] ?> </small><br><br>
      <?php }} ?>
      
      </div>
    </div>
    </div>
  
    <div class="container" style="padding-right: 180px">
      <div class="main">
      <!-- Content Header (Page header) -->
   <img src="../img/gad.png" class="img-responsive" width="170" style="margin-top: 2%; postion: relative; padding: 10px; float: left; max-width: 100%; height: auto" />          
        <img src="../img/bsu_logo.png" class="img-responsive" width="160" style="margin-top: 3%; position: relative; padding: 10px; float: right; max-width: 100%; height: auto" />

      <!-- Main content -->
      <section class="content">
        <div class="jumbotron">
                
            <center >
              <h2 class="display-3"><b>Gender and Development - Batangas State University</b></h2>
            <h2 class="display-3">Knowledge Management System</h2>
            
            <p class="lead">To formulate and implement an effective mechanism for planning, policy-making, financing, management, monitoring and assessment of the Extension Service of the University</p>
            <hr class="my-4">
            </center>
          </div>
        
        <div class="row">

          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner" style="padding-bottom: 50px">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM gad')[0]['count']); ?></h4>
                   <p>GAD Mandates</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-book"></i>
                  </div>
                  <a href="mandates.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>


          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner" style="padding-bottom: 50px">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM linkages')[0]['count']); ?></h4>
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
          </div>


          <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
               <div class="small-box bg-red">
                  <div class="inner" style="padding-bottom: 50px">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM ppa')[0]['count']); ?></h4>
                    <p>Program, Project and Activities</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-bandcamp"></i>
                  </div>
                  <a href="ppa.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>

           <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner" style="padding-bottom: 50px">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM resources')[0]['count']); ?></h4>
                    <p>Resources</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-connectdevelop"></i>
                  </div>
                  <a href="resources.php" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>
          </div>

           <div class="col">
              <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                 <div class="small-box bg-navy ">
                  <div class="inner" style="padding-bottom: 50px">
                    <h4><?php echo(DB::query('SELECT COUNT(*) as count FROM connected_sites')[0]['count']); ?></h4>
                    <p>Connected Sites</p>
                  </div>
                  <div class="icon">
                     <i class="fa fa-external-link"></i>
                  </div>
                  <a href="connected_sites.php" class="small-box-footer">
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
    </div>
    <!-- /.container -->
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

<script>

$("#navbar-search-input").focus(function(v){
  $("#navbar-search-input").keypress(function(e){
      if(e.which == 13){
        e.preventDefault();
        get_mandates_data(e.target.value)
        e.target.value = ''
      }
  })
})

function get_mandates_data(keyword){
  let http = new XMLHttpRequest()
      http.onreadystatechange = function(){
        if (http.status == 200 && http.readyState == 4 ) {
         console.log(JSON.parse(http.response))
         var json = JSON.parse(http.response)
         $('.main').html('')
         $('.con').html('')
         json[0].forEach(items=>{
           console.log(items)
         })


        //  var data = http.response
        //  var json = JSON.parse(data)
        //  if (json.length > 0) {
        //     $(".content").html('')
        //    json.forEach(item=>{
        //     $(".content").append("<div class=\"col-md-4\"><div class=\"box box-primary\"><div class=\"box-header\"><h4 class=\"box-title\">" + item.title + "</h4><br><small>" + item.author + "</small></div><div class=\"box-body\"><div class=\"form-group\"><label for=\"summary\">Summary</label><textarea  readonly type=\"text\" class=\"form-control\" name=\"summary\" id=\"summary\" style=\"resize: vertical; max-height: 300px; min-height: 200px;\">" + item.summary + "</textarea></div><small style=\"float: right;\">ask for the admin staff for full copy</small></div></div></div>") 
        //    })
        //     json.forEach(item=>{ console.log(item.title)})
        //    console.log(json)
        //  }else{
        //   $(".content").html("<h1 style='font-size: 40px; text-align: center;'>\"Sorry, your keyword does not match anything\"</h1>")
        //  }
        }
      }
      http.open("GET", "request_for_data.php?keyword=" + keyword, true);
      http.send();
}

</script>

</body>
</html>
