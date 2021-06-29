<?php
    require_once('function.php');

    login_check();

    require_once('db_connect.php');

    $sysMessage = '';
    if(!empty($_POST)){
        if(empty($_POST['title'])){
            $sysMessage = 'タイトルが未入力です';
        }
        else if(empty($_POST['date'])){
            $sysMessage = '発売日が未入力です';
        }
        else if(empty($_POST['stock'])){
            $sysMessage = '在庫数が未選択です';
        }

        try{
            $title = $_POST['title'];
            $date = $_POST['date'];
            $stock = $_POST['stock'];

            $pdo = db_connect();
            $sql = "INSERT INTO books(title,date,stock) VALUES(:title,:date,:stock)";
            
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':title',$title);
            $stmt -> bindParam(':date',$date);
            $stmt -> bindParam(':stock',$stock);
            $stmt -> execute();
            $sysMessage = '登録完了しました';
        } catch (PDOException $e){
            echo 'Error:' .$e -> getMessage();
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>本 登録画面</title>
</head>
<body>
    <h2>本&nbsp;登録画面</h2>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="タイトル" required class="text_box"><br>
        <input type="text" name="date" placeholder="発売日" required class="text_box"><br>
        <label for="stock">在庫数</label><br>
        <select name="stock" id="stock" class="select_box">
            <option value="" disabled selected style="display: none;">選択してください</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select><br>
        <input type="submit" value="登録" class="btn_create_book_post">
    </form>
</body>
</html>