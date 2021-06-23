<?php
//function.php
require_once('function.php');

//ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

require_once('db_connect.php');
$sql = "SELECT * FROM posts ORDER BY id DESC";
$pdo = db_connect();
$stmt = $pdo->prepare($sql);
$stmt -> execute();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メインページ</title>
</head>
<body>
    <h2>メインページ</h2>
    <p>ようこそ<?php echo $_SESSION['user_name']; ?>さん</p>
    <a href="logout.php">ログアウト</a><br>
    <a href="create_post.php">記事投稿！</a>
    <table>
        <tr>
            <td>記事ID</td>
            <td>タイトル</td>
            <td>本文</td>
            <td>投稿日</td>
            <td></td>
            <td></td>
        </tr>
        <?php while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['title']; ?></td>
                <td><?php echo $rows['content']; ?></td>
                <td><?php echo $rows['time']; ?></td>
                <td><a href="detail_post.php?id=<?php echo $rows['id']; ?> ">詳細</a></td>
                <td><a href="edit_post.php?id=<?php echo $rows['id']; ?>">編集</a></td>
                <td><a href="delete_post.php?id=<?php echo $rows['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>