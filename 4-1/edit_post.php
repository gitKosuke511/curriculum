<?php
    //db_connect.phpの読み込み
    require_once('db_connect.php');

    //function.phpの読み込み
    require_once('function.php');

    //ログインしていなければ、login.phpにリダイレクト
    check_user_logged_in();
    
    //URLの?以降で渡されるIDをキャッチ
    $id = $_GET['id'];
    //もし、$idが空であったらmain.phpにリダイレクト
    //不正なアクセス対策
    if(empty($id)){
        header("Location:main.php");
        exit;
    }
    
    //PDOのインスタンスを取得
    $pdo = db_connect();

    $row = find_post_by_id($id);

    //結果が1行取得できたら
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事編集</title>
</head>
<body>
    <h2>記事編集</h2>
    <form action="edit_done.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="title">title:</label><br>
        <input type="text" name="title" style="width: 200px;height: 50px;" value="<?php echo $title; ?>"><br>
        <label for="content">content:</label><br>
        <input type="text" name="content" style="width: 200px;height: 100px;" value="<?php echo $content; ?>"><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>