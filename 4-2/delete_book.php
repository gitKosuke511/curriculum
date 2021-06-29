<?php
    require_once('function.php');

    login_check();

    $id = $_GET['id'];

    if(empty($id)){
    //不正アクセス対策
        header('Location:main.php');
        exit;
    }

    try{
        require_once('db_connect.php');

        $pdo = db_connect();
        $sql = "DELETE FROM books WHERE id=:id";

        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();

        header('Location:main.php');
        
    } catch (PDOException $e){
        echo 'Error:' .$e -> getMessage();
        die();
    }
?>