<?php 

include('../classes/tokenHelper.php');

class Login{
    public static function isLoggedIn(){
        if(isset($_COOKIE['KMSID'])){
            $token_params = array(':token'=>sha1($_COOKIE["KMSID"]));
            if(DB::query('SELECT user_id FROM token_manager WHERE token=:token', $token_params)){
                
                $user_id = DB::query('SELECT user_id FROM token_manager WHERE token=:token', $token_params)[0]['user_id']; 
                
                if(isset($_COOKIE['KMSID_*'])){
                    return $user_id;
                } else{
                    $token = Token::generate();
                    $token_params = array(':token'=> sha1($token), ':user_id'=>$user_id);
                    DB::query('INSERT INTO token_manager VALUES(\'\', :token, :user_id)', $token_params);
                    DB::query('DELETE FROM token_manager WHERE token=:token', array(':token'=>sha1($_COOKIE['KMSID'])));
                    setcookie("KMSID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie("KMSID_*", 'hdhoi5sd45', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                    return $user_id;
                    }
                }
            }   
            return false;
    }
}
?>