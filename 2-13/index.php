<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>便利な関数</title>
</head>
<body>
    <?php
        $x = 9.9;
        echo $x;
        echo '<br>';
        echo '切上げると、'.ceil($x); //切り上げ
        echo '<br>';
        echo '切り捨てると、'.floor($x); //切り捨て
        echo '<br>';
        echo '四捨五入すると、'.round($x); //四捨五入
        echo '<br>';
        
        $r = 1.5; //半径
        echo '半径:'.$r.'の面積は、'.circleArea($r);
        echo '<br>';
        
        $moji = 'kojimakousuke'; 
        echo $moji.'の文字数は、'.strlen($moji);
        echo '<br>';
        echo 'aは'.strpos($moji,'a').'番目です。'; //0スタート
        echo '<br>';
        echo '左から5文字を取ると'.substr($moji,0,5);
        echo '<br>';
        echo '文字を置き換えると、'.str_replace('kousuke','kosuke',$moji);
        echo '<br>';

        $price=100;
        $fruits='りんご';
        printf('%sの価格は%d円です。',$fruits,$price);
        echo '<br>';

        $item=sprintf('%sの価格は%d円です。',$fruits,$price);
        echo $item;


        //円の面積を計算
        function circleArea($r){
            $area = $r * $r * pi();
            return $area;
       }
    ?>
</body>
</html>