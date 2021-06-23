<?php
require_once('db_connect.php');
require_once('function.php');

$id = $_GET['id'];

if(!empty($_POST)){
    $post_id = $_POST['post_id'];

    if(empty($_POST['name'])){
        echo '名前が未入力です';
    }else if(empty($_POST['content'])){
        echo 'コメントが未入力です';
    }

    if(!empty($_POST['name']) && !empty($_POST['content'])){
        $name = $_POST['name'];
        $content = $_POST['content'];

        $pdo = db_connect();

        try{
            $sql = "INSERT INTO comments(post_id,name,content) VALUES (:post_id,:name,:content)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':post_id',$post_id);
            $stmt -> bindParam(':name',$name);
            $stmt -> bindParam(':content',$content);
            $stmt -> execute();

            header("Location:detail_post.php");
            exit;

        } catch (PDOException $e){
            echo 'Error:',$e -> getMessage();
            die();
        }
    } else {
        $post_id = $_GET['id'];
        redirect_main_unless_parameter($post_id);
    }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コメント</title>
</head>
<body>
    <h2>コメント</h2>
    <form action="" method="POST">
        <label for="name">投稿者:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="content">コメント:</label><br>
        <input type="text" name="content" id="content" style="width:200px; height:100px;"><br>
        <input type="hidden" name="post_id" value="<?php echo $id; ?>">
        <input type="submit" value="submit">
    </form>
    <a href="detail_post.php">記事詳細に戻る</a>
</body>
</html>