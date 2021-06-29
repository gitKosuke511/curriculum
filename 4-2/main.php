<?php
    //ログインしていない場合は、ログイン画面に遷移
    session_start();
    if(empty($_SESSION['user_id'])){
        header('Location:login.php');
        exit;
    }

    require_once('db_connect.php');

    $pdo = db_connect();
    $sql = "SELECT * FROM books";
    
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>在庫一覧画面</title>
</head>
<body>
    <h2>在庫一覧画面</h2>
    <a href="create_book.php" class="btn_create_book">新規登録</a>
    <a href="logout.php" class="btn_logout">ログアウト</a>
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        
    <?php while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){ ?>
        <tr> 
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td><a href="delete_book.php?id=<?php echo $row['id']; ?>" class="btn_delete">削除</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>