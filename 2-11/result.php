<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力結果</title>
</head>
<body>
    <?php
        $my_name = $_POST['my_name'];
        $email=$_POST['email'];
        $password = $_POST['password'];
    ?>
    <p>私の名前は、<?php echo $my_name; ?></p>
    <p>私のメールアドレスは、<?php echo $email; ?></p>
    <p>私のパスワードは、<?php echo $password; ?></p>
</body>
</html>