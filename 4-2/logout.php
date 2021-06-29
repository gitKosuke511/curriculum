<?php
//セッション開始
session_start();
//セッション変数のクリア
$_SESSION = array();
//セッションクリア
session_destroy();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>ログアウト画面</title>
</head>
<body>
    <h2>ログアウト画面</h2>
    <p>ログアウトしました</p>
    <a href="login.php" class="logout_text">ログイン画面に戻る</a>
</body>
</html>