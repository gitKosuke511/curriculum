<?php
    require_once('db_connect.php');

    require_once('function.php');

    check_user_logged_in();

    $id = $_GET['id'];

    if(empty($id)){
    //不正アクセス対応
        header('Location:main.php');
        exit;
    }
    
    $sql = "DELETE FROM posts WHERE id=:id";

    try{
        $pdo = db_connect();
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(':id',$id,PDO::PARAM_STR);
        $stmt -> execute();

        header('Location:main.php');
    } catch(PDOException $e){
        echo 'Error:'.$e -> getMessage();
        die();
    }
?>