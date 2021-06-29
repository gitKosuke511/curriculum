<?php
    require_once('db_connect.php');
    $sysMessage='';

    if(!empty($_POST)){
    //ボタンを押したときに処理を行う
        if(empty($_POST['name'])){
        //ユーザー名が未入力のとき
            $sysMessage = 'ユーザー名が未入力です';
        } elseif(empty($_POST['password'])){
        //パスワードが未入力のとき
            $sysMessage = 'パスワードが未入力です';
        }

        if(!empty($_POST['name']) && !empty($_POST['password'])){
            try {
                $name = $_POST['name'];
                $password = $_POST['password'];

                //パスワードをハッシュ化
                $password_hash = password_hash($password,PASSWORD_BCRYPT);

                $sql = "INSERT INTO users(name,password) VALUE(?,?)";
                $pdo = db_connect();

                $stmt = $pdo -> prepare($sql);
                $stmt -> bindParam(1,$name,pdo::PARAM_STR);
                $stmt -> bindParam(2,$password_hash,pdo::PARAM_STR);
                $stmt -> execute();
                $sysMessage = '登録が完了しました';

            } catch (PDOException $e) {
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
    <title>在庫管理システム</title>
</head>
<body>
    <h2>ユーザー登録画面</h2>
    <?php echo $sysMessage; ?>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="ユーザー名"><br>
        <input type="password" name="password" placeholder="パスワード"><br>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>