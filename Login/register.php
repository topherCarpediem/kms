<?php 

include('../classes/dbHelper.php');
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
			$params = array(':firstname'=>$firstname, ':lastname'=>$lastname, ':username'=>$username,
							':email'=> $email, ':password'=> password_hash($password_1, PASSWORD_BCRYPT));
			DB::query('INSERT INTO users VALUES(\'\' :firstname, :lastname, :username, :email, :password)', $params);
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
	<title>Registration system PHP and MySQL</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Knowledge Management Site of Gender and Development Office">
	<meta name="keywords" content="KMS of GAD, GAD KMS, BSU KMS">

	<title>GAD MAIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="../Css/Main.css"  />
	
	
</head>
<body>
	<header>
		<div class="container"> 
			<div id="GADname">
				<h1><span class="highlight">Gender and Development</span> </h1>
				<span class="index"> <a href="../index.html">Home Page</a></span>
	</header>

	<div class="header">
		<h2>Register</h2>
	</div>

		

<form method="post" action="register.php">
<?php  if (count($errors) > 0) : ?>
		<div class="error">
			<?php foreach ($errors as $error) : ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>
		</div>
		<?php  endif ?>
		<div class="input-group">
			<label>First Name</label>
			<input type="text" id="firstname" name="firstname" placeholder="Enter firstname" required>
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" id="lastname" name="lastname" placeholder="Enter lastname" required>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" id="username" name="username" placeholder="Enter username" required>
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" id="email" name="email" placeholder="Enter email" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" id="password_1" name="password_1" placeholder="Enter password" required>
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" id="password_2" name="password_2" placeholder="Re-enter password" required>
		</div>
		<div class="input-group">
			<button class="btn" id="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>

	</form>



	<script>
	
		// let submit = document.getElementById('btn');
		// let firstname = document.getElementById('firstname');
		// let lastname = document.getElementById('lastname');
		// let username = document.getElementById('username');
		// let email = document.getElementById('email');
		// let password_1 = document.getElementById('password_1');
		// let password_2 = document.getElementById('password_2');
		
		
		// submit.addEventListener('click', (e)=>{
		// 	console.log(e)
		// 	let data = {
		// 		firstname: username.value,
		// 		lastname: lastname.value,
		// 		username: username.value,
		// 		email: email.value,
		// 		password_1: password_1.value,
		// 		password_2: password_2.value
		// 	}

		// 	fetch('register.php', {
		// 		method: 'POST',
		// 		headers: { 'Content-Type': 'application/json'},
		// 		body: JSON.stringify(data)
		// 	})
		// })
		
	</script>
</body>
</html>

	
	
