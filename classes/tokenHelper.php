<?php

class Token {
    public static function generate(){
        $cstrong = TRUE;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        return $token;
    }
}
?>