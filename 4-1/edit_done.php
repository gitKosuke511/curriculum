<?php
    require_once('db_connect.php');
    require_once('function.php');
    //ログインしていなければ、login.phpにリダイレクト
    check_user_logged_in();

    $pdo = db_connect();

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    try{
        $sql = "UPDATE posts SET title=:title,content=:content WHERE id=:id";

        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(':title',$title);
        $stmt -> bindParam(':content',$content);
        $stmt -> bindParam(':id',$id);
        $stmt ->execute();

    }catch (PDOException $e){
        echo 'Error:'.$e -> getMessage();
        die();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集完了</title>
</head>
<body>
    <h2>編集完了</h2>
    <p>ID:<?php echo $id; ?>を編集しました</p>
    <a href="main.php">ホームへ戻る</a>
</body>
</html>