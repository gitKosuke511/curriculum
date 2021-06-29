<?php
    require_once('db_connect.php');
    //セッション開始
    session_start();
    $sysMessage = '';
    //ボタンを押したときに処理を開始
    if(!empty($_POST)){
        if(empty($_POST['name'])){
            $sysMessage = 'ユーザー名が未入力です';
        } elseif (empty($_POST['password'])){
            $sysMessage = 'パスワードが未入力です';
        }

        if(!empty($_POST['name']) && !empty($_POST['password'])){
            
            try{
                //エスケープ処理
                $name = htmlspecialchars($_POST['name']);
                $password = htmlspecialchars($_POST['password']);
                
                $pdo = db_connect();
                $sql = "SELECT * FROM users WHERE name = :name";
                $stmt = $pdo -> prepare($sql);
                $stmt -> bindParam(':name',$name);
                $stmt -> execute();

            } catch (PDOException $e){
                echo 'Error:'.$e -> getMessage();
                die();
            }
            //レコードを取得
            if ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
                /**
                 * ハッシュ化されたパスワードと比較して、
                 * マッチすれば、main.phpにリダイレクトする
                 */
                if(password_verify($password,$row['password'])){
                    $_SESSION['user_id'] = $row['name'];
                    //$sysMessage = 'ログインできました';
                    header('Location:main.php');
                    exit;
                }else{
                    $sysMessage = 'ユーザー名かパスワードに誤りがあります';
                }
            }else{
                $sysMessage = 'ユーザー名かパスワードに誤りがあります';
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
    <link rel="stylesheet" href="./style.css">
    <title>ログイン画面</title>
</head>
<body>
    <div class="login_title">
        <h2>ログイン画面</h2>
        <div class="btn_create_user"><a href="singUp.php">新規ユーザー登録</a></div>
    </div>
    <form action="" method="POST">
        <input type="name" placeholder="ユーザー名" name="name" class="text_box"><br>
        <input type="password" placeholder="パスワード" name="password" class="text_box"><br>
        <input type="submit" value="ログイン" class="btn_login">
    </form>
    <p><?php echo $sysMessage; ?></p>
</body>
</html>