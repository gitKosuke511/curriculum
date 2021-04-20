<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>いろいろな入力フォーム</title>
</head>
<body>
    <form action="result.php" method="post">
    
        <!-- この中にinputタグを記述していきます。 --> 
        お名前：<input type="text" name="my_name" />
        <br>
        ご希望商品:<input type="radio" name="shohin" value="A賞">A賞
        <input type="radio" name="shohin" value="B賞">B賞
        <input type="radio" name="shohin" value="C賞">C賞
        <br>
        個数:<select name="qty">
        <?php 
            for($num=1; $num<=10; $num++){
        ?>         
        <option value="<?php echo $num; ?>">
                <?php echo $num; ?>
        </option>
        <?php } ?>
        </select>
        <br>
        <input type="submit" value="申込" />
    </form>
</body>
</html>