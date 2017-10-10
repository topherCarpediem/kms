<?php 

require_once('../classes/dbHelper.php');
require_once('../classes/loginHelper.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = file_get_contents('php://input');
    $request = json_decode($data);

    $db_password = DB::query('SELECT password FROM users WHERE id=:id', array(':id'=>Login::isLoggedIn()))[0]['password'];

    if(password_verify($request->old_password, $db_password)){
        if($request->password_1 != "" && $request->password_2 != ""){
            if($request->password_1 == $request->password_2){
                DB::query('UPDATE users set password=:password WHERE id=:id', array(':password'=>password_hash($request->password_1, PASSWORD_BCRYPT), ':id'=>Login::isLoggedIn()));
                print_r(json_encode(array('status'=>'Password successfully changed.')));
            }else{
                print_r(json_encode(array('status'=>'New password match failed.')));
            }
        }else{
            print_r(json_encode(array('status'=>'New password field is empty')));
        }
    }else{
        print_r(json_encode(array('status'=>'Old password match failed.')));
    }

}

?>