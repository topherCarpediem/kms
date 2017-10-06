<?php 
include('../classes/dbHelper.php');
include('../classes/loginHelper.php');

	if(Login::isLoggedIn()){
		header('location: index.php');
	}

	$errors = array();
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



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Knowledge Management Site of Gender and Development Office">
	<meta name="keywords" content="KMS of GAD, GAD KMS, BSU KMS">

	<title>GAD MAIN PAGE</title>
	<!-- Bootstrap Code ito para sa designs
	  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
     <script src="js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="../Css/Main.css"  />
 	 <style type="text/css">
   	* {
	margin: 0px;
	padding: 0px;
}
body{
	background:url('../img/capt.jpg') no-repeat 0 -10px ;
}


.headerr {
	width: 10%;
	margin: 100px auto 0px;
	color: white;
	background: #35424a;
	text-align: center;
	border: 4px solid #FF0000;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 4px;
}

form, .content {
	width: 20%;
	margin: 0px auto;
	padding: 20px;
	border: 4px solid 	#FF0000;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.form_dsgn{
	padding: 35px;
	background-color: #6F615C;
	opacity: 0.9;
}
.input-group {
	margin: 10px 0px 10px 0px;
}

.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
	font-style: "Arial", Arial, serif;
	color: #000000;
	font-weight: bold;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	width: 100px;
	padding: 15px;
	font-size: 15px;
	color: white;
	background: #35424a;
	border: 2px solid 	#252120;
	border-radius: 10px;
	margin-top: 10px;
	float: right;
}
.btn:hover{
	color: #A7857D;
}

.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}

footer{
	padding: 40px;
	margin-top: 14%;
	color: #ffffff;
	background-color: #e8491d;
	text-align: center;
}

   </style>

</head>

<body>
			<!--Design for Categories-->
	<header>
		<div class="container"> 
			<div id="GADname">
				<h1><span class="highlight">Gender and Development</span> </h1>
			</div>
				<nav>
					<ul>
					<li > <a href="../index.html">HOME</a></li>
					<li> <a href="../Categories/About.html">About</a></li>
					<li> <a href="../Categories/GADMandates.html">GAD Mandates</a></li>
					<li> <a href="../Categories/Linkages.html">Linkages</a></li>
					<li> <a href="../Categories/OfficePub.html">Office Publication</a></li>
					<li> <a href="../Categories/PPA.html">PPA</a></li>
					<li> <a href="../Categories/Resources.html">Resources</a></li>
					<li> <a href="../Categories/Site.html">Connected Sites</li>
					<li class="current"> <a href="login.php">LOGIN</a></li>
					</ul>
				</nav>
		</div>
	</header>

	<div class="trans">
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php" class="form_dsgn">
		<?php  if (count($errors) > 0) : ?>
			<div class="error">
				<?php foreach ($errors as $error) : ?>
					<p><?php echo $error ?></p>
				<?php endforeach ?>
			</div>
		<?php  endif ?>
		<div class="input-group">
			
			<input type="text" name="username" placeholder="Username" required >
		</div>
		<div class="input-group">
			<input type="password" name="password" placeholder="Password" required>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		
	</form>
</div>	
<footer>
	<p>Gender And Development, Copyright &copy; 2017</p>

</footer>

</body>
</html>