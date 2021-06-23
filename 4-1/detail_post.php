<?php
    require_once('db_connect.php');
    require_once('function.php');

    check_user_logged_in();

    $id = $_GET['id'];
    redirect_main_unless_parameter($id);

    $pdo = db_connect();

    try{
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
    } catch (PDOException $e){
        echo 'Error:'.$e -> getMessage();
        die();
    }

    if($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
    } else {
        echo '対象のデータありません';
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事詳細</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td><?php echo $id; ?></td>
        </tr>
        <tr>
            <td>タイトル</td>
            <td><?php echo $title; ?></td>
        </tr>
        <tr>
            <td>本文</td>
            <td><?php echo $content; ?></td>
        </tr>
    </table>
    <a href="create_comment.php?id=<?php echo $id; ?>">この記事にコメントする</a><br>
    <a href="main.php">メインページに戻る</a>
    <?php
        $sql = "SELECT * FROM comments WHERE post_id=:id";
        $stmt_comments = $pdo -> prepare($sql);
        $stmt_comments -> bindParam(':id',$id);
        $stmt_comments -> execute();

        while($row = $stmt_comments->fetch(PDO::FETCH_ASSOC)){
            echo '<hr>';
            echo $row['name'];
            echo '<br>';
            echo $row['content'];
        }

    ?>
</body>
</html>