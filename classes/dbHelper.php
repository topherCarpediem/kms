<?php

class DB {

    private static function connect(){
        $dsn = 'mysql:dbname=kms;host=127.0.0.1';
        $user = 'root';
        $password = '';
        
        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $pdo;
    }


    public static function query($cmd, $params = array()){
        $statement = self::connect()->prepare($cmd);
        $statement->execute($params);

        if(explode(' ', $cmd)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }

}

?>