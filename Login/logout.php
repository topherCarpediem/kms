<?php 
include '../classes/dbHelper.php';
include '../classes/loginHelper.php';
if(!Login::isLoggedIn()){
    header('location: ../home/index.php');
}

if(isset($_POST['logout'])){
    if(Login::isLoggedIn()){
        $token_params = array(':token'=>sha1($_COOKIE['KMSID']));
        DB::query('DELETE FROM token_manager WHERE token=:token', $token_params);
    }
    setcookie('KMSID', '1', time()-3600);
    setcookie('KMSID_*', '1', time()-3600);
    header('location: ../home/index.php');
}




?>
