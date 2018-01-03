<?php 
include('../classes/dbHelper.php');
include('../classes/loginHelper.php');

$errors = array();
  if(Login::isLoggedIn()){
    header('location: index.php');
  }

  if(isset($_POST['login_user'])){
  
  $username = array(':username'=>$_POST['username']);
  $password = $_POST['password'];

  if(DB::query('SELECT username FROM users WHERE username=:username', $username)){
    if(password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', $username)[0]['password'])){
      //header('location: register.php');
      $user_id = DB::query('SELECT id FROM users WHERE username=:username', $username)[0]['id'];
      $token = Token::generate();
      $token_params = array(':token'=> sha1($token), ':user_id'=>$user_id);
      DB::query('INSERT INTO token_manager VALUES(\'\', :token, :user_id)', $token_params);

      setcookie("KMSID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
      setcookie("KMSID_*", 'hdhoi5sd45', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

      header('location: index.php');

    }else{
      array_push($errors, 'Invalid password');
    } 
  }else{
    array_push($errors, 'Invalid username');
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>ADMIN</b>KMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4><p class="login-box-msg">Sign in to start your session</p></h4>

    <form action="login.php" method="post">
        <?php  if (count($errors) > 0) : ?>
      <div class="error">
        <?php foreach ($errors as $error) : ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
      </div>
    <?php  endif ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-2">
          <button type="submit" name="login_user" class="btn btn-primary btn-flat">Sign In</button>
          
        </div>
        <div class="col ">
        <button id="home" class="btn btn-primary btn-flat" style="float: right" >Go to home</button>
      </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>

  $("#home").click(function(e){
    e.preventDefault()
    window.location.href = '../home/'
  })


</script>

</body>
</html>
