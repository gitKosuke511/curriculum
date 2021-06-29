<?php
/**
 * 定数を定義
 */
//DB名
 define('DB_DATABASE','checktest');

 //MySQLのユーザー名
 define('DB_USERNAME','root');

 //password
 define('DB_PASS', 'root');
 
 //DSN
 define('PDO_DSN','mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

 function db_connect(){
//DBに接続
    try{
        //インスタンスを作成
        $pdo = new PDO(PDO_DSN,DB_USERNAME,DB_PASS);
        //エラー処理方法の設定
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e){
        echo 'Error:'.$e -> getMessage();
        die();
    }

}

?>
