<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra</title>
</head>
<body>
    <h1>ループ × 条件分岐</h1>
    <?php
        $total = 0; //サイコロの合計を初期化
        $count = 1; //ループカウンタ

        while($total < 40){
            $num = mt_rand(1,6);    //1~6をランダムに生成
            $total = $total + $num;
            
            echo $count.'回目='.$num;
            echo '<br>';
            
            if ($total >= 40){
                echo '合計'.$count.'回でゴールしました';
            }else{
                $count++;
            }
        }
    ?>
    <h1>関数 ×　条件分岐</h1>
    <?php
        $time = date("H",time());
        echo '今'.$time.'時台です。';
        echo '<br>';
        switch($time){
            case $time >=4 and $time < 10;
                echo 'おはようございます。';
                break;
            case $time >= 10 and $time < 19;
                echo 'こんにちは';
                break;
            case $time >= 19 and $time < 4;
                echo 'こんばんは';
                break;
        }

    ?>
</body>
</html>