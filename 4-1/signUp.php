<?php
    $sysMessage = "";    //メッセージの初期化

    require_once('db_connect.php');

    //submitボタンが押され時の処理
    if (isset($_POST["signUp"])){
                
        if(empty($_POST["name"])){
            $sysMessage = "ユーザー名が未入力です";
        } else if(empty($_POST["password"])){
            $sysMessage = "パスワードが未入力です";
        }

        if(!empty($_POST["name"]) && !empty($_POST["password"])){
            
            try{
                $name = $_POST["name"];
                $password = $_POST["password"];
                //パスワードをハッシュ化
                $password_hash = password_hash($password,PASSWORD_BCRYPT);
                //sql
                $sql = "INSERT INTO users(name,password) VALUE(?,?)";

                $pdo = db_connect();
                
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(1,$name,pdo::PARAM_STR);
                $stmt->bindParam(2,$password_hash,pdo::PARAM_STR);
                //sqlを実行
                $stmt->execute();
                $sysMessage = '登録が完了しました';
                //echo '登録が完了しました';
            }catch(PDOException $e){
                $sysMessage = 'Error:'.$e->getMessage();
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
    <title>新規登録</title>
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
    <?php echo $sysMessage ?>
</body>
</html>