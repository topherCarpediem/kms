<?php 

include('../classes/dbHelper.php');
include('../classes/loginHelper.php');

if(!Login::isLoggedIn()){
    die("Not logged in");
}

if(isset($_POST['logout'])){
    if(Login::isLoggedIn()){
        $token_params = array(':token'=>sha1($_COOKIE['KMSID']));
        DB::query('DELETE FROM token_manager WHERE token=:token', $token_params);
    }
    setcookie('KMSID', '1', time()-3600);
    setcookie('KMSID_*', '1', time()-3600);
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>