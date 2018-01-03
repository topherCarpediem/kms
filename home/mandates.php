<?php 
include '../classes/dbHelper.php';

?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GAD Mandates</title> 

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
<body class="hold-transition skin-red  layout-top-nav">
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
            
            <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about.php">About</a></li>
            <li  class="active"><a href="mandates.php">GAD Mandates</a></li>
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
  <div class="content-wrapper" style="background-color:   #2F4F4F;">
    <div class="container">
      <!-- Content Header (Page header) -->
  

      <!-- Main content -->
      <section class="content">
       
        <?php $mandates = DB::query('SELECT * FROM gad WHERE isPublished=true'); ?>
        <?php foreach ($mandates as $value) { ?>
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header">
              <h4 class="box-title"><?= $value['title'] ?></h4><br>
              <small><?= $value['author'] ?></small>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <textarea  readonly type="text" class="form-control" name="summary" id="summary" style="resize: vertical; max-height: 300px; min-height: 200px;"><?= $value['description'] ?></textarea> 
                   <!--  <button class="btn btn-primary btn-block" >View</button> -->
                </div>
            <?php if($value['extension'] == 'PDF'){ ?>
            <small class="label label-danger"><?php echo($value['extension']); ?></small>
            <?php }else{ ?>
            <small class="label label-primary"><?php echo($value['extension']); ?></small>
            <?php } ?>
            <small style="float: right;"><a href="#" data-toggle="tooltip" title="gad.batstateu@gmail.com" style="color: black">ask for the admin staff for full copy</a></small>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="background-color:  #FF0000;">
    <div class="container" style="text-align: center; color: white; ">
      
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
         
         var data = http.response
         var json = JSON.parse(data)
         if (json.length > 0) {
            $(".content").html('')
           json.forEach(item=>{
             var template = ""
            if(item.file_extension == 'PDF'){
              template =   "<small class=\"label label-danger\">"+ item.extension +"</small>"
            }else{
              template =   "<small class=\"label label-primary\">"+ item.extension +"</small>"
            }
            $(".content").append("<div class=\"col-md-4\"><div class=\"box box-primary\"><div class=\"box-header\"><h4 class=\"box-title\">" + item.title + "</h4><br><small>" + item.author + "</small></div><div class=\"box-body\"><div class=\"form-group\"><label for=\"summary\">Summary</label><textarea  readonly type=\"text\" class=\"form-control\" name=\"summary\" id=\"summary\" style=\"resize: vertical; max-height: 300px; min-height: 200px;\">" + item.description + "</textarea></div>"+ template +"<small style=\"float: right;\"><a href=\"#\" data-toggle=\"tooltip\" title=\"gad.batstateu@gmail.com\" style=\"color: black\">ask for the admin staff for full copy</a></small></div></div></div>") 
           })
          //   json.forEach(item=>{ console.log(item.title)})
          //  console.log(json)
          $('[data-toggle="tooltip"]').tooltip();
         }else{
          $(".content").html("<h1 style='font-size: 40px; text-align: center;'>\"Sorry, your keyword does not match anything\"</h1>")
         }
        }
      }
      http.open("GET", "request_for_data.php?keyword=" + keyword, true);
      http.send();
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


</script>
</body>
</html>
