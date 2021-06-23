<?php
//function.php
require_once('function.php');

//ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

require_once('db_connect.php');

//submitボタンを押したかチェック
if(!empty($_POST)){
    //titleとcontentの入力チェック
    if(empty($_POST['title'])){
        echo 'タイトルが未入力です';
    } elseif(empty($_POST['content'])){
        echo 'コンテンツが未入力です';
    }

    if(!empty($_POST['title']) && !empty($_POST['content'])){
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO posts(title,content) VALUE (?, ?)";

        try{

            $pdo = db_connect();
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(1,$title,PDO::PARAM_STR);
            $stmt -> bindValue(2,$content,PDO::PARAM_STR);
            $stmt -> execute();

            header("Location:main.php");
            exit;

        }catch(PDOException $e){
            echo 'Error:'.$e -> getMessage();
            die();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事登録</title>
</head>
<body>
    <h2>記事登録</h2>
    <form action="" method="POST">
        <label for="title">title:</label><br>
        <input type="text" name="title" style="width: 200px; height: 50px;"><br>
        <label for="content">content:</label><br>
        <input type="text" name="content" style="width: 200px; height: 100px;"><br>
        <input type="submit" value="submit" name="post">
    </form>
</body>
</html>