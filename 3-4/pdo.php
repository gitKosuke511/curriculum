<?php
    //DB名
    define('DB_DATABASE','checktest4');
    //USER
    define('DB_USER','root');
    //password
    define('DB_PASS','root');
    //DSN
    define('PDO_DSN','mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

    //DBに接続
    function connect(){
        try{
            $pdo = new PDO(PDO_DSN, DB_USER, DB_PASS);
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e){
            echo 'Error:' . $e -> getMessage();
            die();
        }
    }
