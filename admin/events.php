<?php 
include '../Login/logout.php';
include '../classes/fileChecker.php';
include '../classes/stringGenerator.php';

if(!Login::isLoggedIn()){
  header('location: ../admin/login.php');
}

if(isset($_POST['submit-form'])){
    $calendar_params = array(
      ':start'=> $_POST['start'],
      ':end'=> $_POST['end'],
      ':title'=> $_POST['title'],
      ':timestart'=> $_POST['timestart'],
      ':timeend'=> $_POST['timeend'],
      ':summary'=>$_POST['summary'],
      ':isPublished'=>FALSE
    );
    DB::query('INSERT INTO calendar VALUES (\'\', :start, :end, :title, :timestart, :timeend, :summary, :isPublished)', $calendar_params);
}

if (isset($_POST['update_photo'])) {
  try {
    if(File::checkImage($_FILES['new_photo']['tmp_name'])){
      $target_dir = "uploads/userimage/";
      $target_file = $target_dir . basename(Random::generateRandomString() . '-' . $_FILES["new_photo"]["name"]);
      DB::query('UPDATE users set image=:image WHERE id=:id', array(':image'=>$target_file, ':id'=>Login::isLoggedIn()));
      move_uploaded_file($_FILES["new_photo"]["tmp_name"], $target_file);
      header('location: index.php');
      }else{
        print_r("invalid picture");
      }
  } catch (Exception $e) {    
  }
}

if (isset($_POST['post'])) {
  if ($_POST['post_id']) {
     $id = array(':id'=> $_POST['post_id']);
     $isPublished = DB::query('SELECT isPublished FROM calendar WHERE id=:id', $id)[0]['isPublished'];
      $linkages_param = array(':isPublished'=> !($isPublished), ':id'=>$_POST['post_id']);
       DB::query('UPDATE calendar set isPublished=:isPublished WHERE id=:id', $linkages_param);
  
  }

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KMSADMIN | Events</title>
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
        <li class="header">CONTROL PANEL</li>
        <li >
          <a href="index.php">
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
          </a>
        </li>

        <li  class="active">
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

         <li >
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
       Events
        <small>Add events</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Events</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action"ppa.php" method="post" enctype="multipart/form-data">
      
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Start</label>
                  <input type="date" class="form-control" name="start" required>

                  <label for="category">End</label>
                  <input type="date" class="form-control" name="end" required>

                  <label for="category">Start time</label>
                  <input class="form-control" type="time" name="timestart" required>

                  <label for="category">End Time</label>
                  <input class="form-control" type="time" name="timeend" required>
                </div>

                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter event" required>
                </div>

                <div class="form-group">
                  <label for="summary">Short description</label>
                  <textarea type="text" class="form-control" name="summary" id="summary" placeholder="Enter short description about the event" required style="resize: vertical; max-height: 300px; min-height: 200px;"></textarea> 
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" name="submit-form" class="btn btn-primary">Add event</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>


        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modify events</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Time</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody id="table-body">
                <?php $table = DB::query("SELECT * FROM calendar");?>

                <?php if (count($table) > 0) : ?>
                    <?php foreach ($table as $item) : ?>
                      <tr id="<?= $item['isPublished'] ?>">
                        <td id="<?= $item['id'] ?>">
                          <?php print_r($item['id']) ?> 
                        </td>
                        <td id="<?= $item['id'] ?>">
                         <?php print_r($item['title']) ?>
                        </td>
                        <td id="<?= $item['id'] ?>">
                         <?php print_r($item['start']) ?>
                        </td>
                        <td id="<?= $item['id'] ?>">
                          <?= $item['end']; ?>
                          
                        </td>
                        <td id="<?= $item['id'] ?>">
                            <?= $item['timestart'] . " to " . $item['timeend']; ?>
                            
                        </td>
                        <td id="<?= $item['id'] ?>">
                            <?php if($item['isPublished'] == 0){ ?>
                            <?php echo 'Unpublished'; } else{ ?>
                            <?php echo 'Published'; } ?>
                        </td>
                        
                      </tr>
                    <?php endforeach ?>
                </tr>
                <?php  endif ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Time</th>
                  <th>Status</th>
              
                </tr>
                </tfoot>
              </table>
            <div class="container">
              <div class="row">
                <div class="col-sm-2">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="events.php">
                      <input type="hidden" id="post_id" name="post_id">
                      <button type="submit" id="post" name="post" class="btn btn-success"><i class="fa fa-paper-plane" aria-hidden="true"></i> Post</button>
                    </form>
                  </div> 
                  <div class="col">
                    
                  </div>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form method="post" action="ppa.php">
                      <input type="hidden" id="ppa" name="ppa_id">
                      
                      <button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                      <button type="button" id="delete" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
      
                    </form>
                  </div>
              </div>
            </div>
            </div>
            
        </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
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

  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">     
              <label for="category">Start</label>
              <input type="date" id="start_edit" class="form-control" name="end" required>
              <label for="category">End</label>
              <input type="date" id="end_edit" class="form-control" name="end" required>
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title" id="title_edit" placeholder="Enter event" required>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Close</button>
            <button type="button" id="update" class="btn btn-danger" data-toggle="modal" data-target="#editModal">Update</button>
          </div>
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
    $("#post_id").attr("value", e.target.id)
    $("#yes").attr("value", e.target.id)
     $("#edit").attr("value", e.target.id)
    $("#update").attr("value", e.target.id)

   document.getElementById('edit').disabled = false
 }
document.getElementById('edit').disabled = true


 $("#edit").click(function(e){

      let http = new XMLHttpRequest()
      http.onreadystatechange = function(){
        if (http.status == 200 && http.readyState == 4 ) {
          let data = JSON.parse(http.response)
  
           data.forEach(function(item){
             $("#start_edit").val(item.start)
             $("#end_edit").val(item.end)
             $("#title_edit").val(item.title)
           })
         
        }
      }
      http.open("GET", "edit.php?id=" + e.target.value, true);
      http.send();

 })


$("#update").click(function(e){
  let http = new XMLHttpRequest()

      var data = JSON.stringify({
        title: $("#title_edit").val(),
        start: $("#start_edit").val(),
        end: $("#end_edit").val(),
        id: e.target.value
      })
      http.onreadystatechange = function(){
        if (http.status == 200 && http.readyState == 4 ) {
          window.location=window.location;
          //console.log(http.response)
        }
      }
      http.open("POST", "update.php", true);
      http.send(data);
})

$("#user-profile").click(function(){
  $("#editProfile").modal("show")
})

$("#submit_pass").click(function(){

  let old_password = document.getElementById('old_password')
  let password_1 = document.getElementById('password_1')
  let password_2 = document.getElementById('password_2')
  
  let data = {
    old_password: old_password.value,
    password_1: password_1.value,
    password_2: password_2.value
  }

  let http = new XMLHttpRequest()
  http.onreadystatechange = function(){
    if(http.status == 200 && http.readyState == 4){
      if(http.response.status != 'Password successfully changed.'){
        let response = JSON.parse(http.response)
        $("#status").html("<p class='alert alert-danger'>"+ response.status +"<p>")
        setTimeout(function() {
          $("#status").html('')
        }, 3000);
      }else{
        $("#status").html("<p class='alert alert-success'>"+ response.status +"<p>")
        setTimeout(function() {
          $("#status").html('')
        }, 3000);
      }
    }
  }

  http.open('post', 'changepass.php')
  http.send(JSON.stringify(data))

    old_password.value = ""
    password_1.value = ""
    password_2.value = ""
})


</script>

</body>
</html>
