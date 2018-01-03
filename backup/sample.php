<?php
    include('../classes/dbHelper.php');
    include('../classes/loginHelper.php');
    if(Login::isLoggedIn()){
        echo 'Logged in';
        echo Login::isLoggedIn();
    }else{
        echo 'Not Logged in';
    }
?>