<?php 

include('../classes/dbHelper.php');
include('../classes/loginHelper.php');

if(!Login::isLoggedIn()){
  header('location: ../admin/login.php');
}

$errors = array();
if (isset($_POST['reg_user'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
if ($password_1 == $password_2) {
  if(!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){
    if(!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))){
  $params = array(':firstname'=>$firstname, ':lastname'=> $lastname, ':username'=>$username, ':email'=>$email, ':password'=>password_hash($password_1, PASSWORD_BCRYPT), ':image'=>'dist/img/user2-160x160.jpg');
  DB::query('INSERT INTO users VALUES(\'\', :firstname, :lastname, :username, :email, :password, :image)', $params);
        array_push($errors, 'Account created with 0 error. Thank you');
        //wait
        //logout the current user
        if(Login::isLoggedIn()){
            $token_params = array(':token'=>sha1($_COOKIE['KMSID']));
            DB::query('DELETE FROM token_manager WHERE token=:token', $token_params);
        }
        setcookie('KMSID', '1', time()-3600);
        setcookie('KMSID_*', '1', time()-3600);
        header('location: login.php');
  }else{
      array_push($errors ,'Email is used on existing username');
    }
  }else{
    array_push($errors ,'Username exist');
  }
}else{
  array_push($errors ,'password didnt match');
}
}



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>ADMIN</b>KMS</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="register.php" method="post">
      <?php  if (count($errors) > 0) : ?>

    <div class="alert alent-danger">
      <?php foreach ($errors as $error) : ?>
        <p><?php echo $error ?></p>
      <?php endforeach ?>
    </div>
    <?php  endif ?>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_1" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password_2" placeholder="Retype password" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-sm-6">
          <button type="submit" name="reg_user" class="btn btn-primary btn-block btn-flat">Register</button>
          
        </div>

        <div class="col-sm-6">
          <button id="admin" class="btn btn-primary btn-block btn-flat">Go to Admin</button>
          
        </div>
    
        <!-- /.col -->
      </div>
      
    </form>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
  $("#admin").click(function(e){
    e.preventDefault()
    window.location.href = '/kms/admin/'
  })
</script>

</body>
</html>
