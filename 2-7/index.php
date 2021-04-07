<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP配列</title>
</head>
<body>
<?php
    $array=["red"=>"赤","blue"=>"青","green"=>"緑"];

    var_dump($array);
    echo '<br>';

    $array["yellow"]="黄色";

    var_dump($array);
    echo '<br>';

?>
</body>
</html>