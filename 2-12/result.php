<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>いろいろな入力フォーム</title>
</head>
<body>
    <?php 
    $my_name=$_POST['my_name'];
    $shohin=$_POST['shohin'];
    $qty=$_POST['qty'];
    ?>
    <p>お名前：<?php echo $my_name; ?></p>
    <p>ご希望商品:<?php echo $shohin; ?></p>
    <p>個数:<?php echo $qty; ?></p>
</body>
</html>