<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>関数</title>
</head>
<body>
    <?php
        $vertical=5;    //縦
        $width=10;      //横
        $height=8;      //高さ
        
        function getTaiseki($vertical,$width,$height){  //体積を計算する関数
            $area=$vertical * $width * $height;
            return $area;
        }

        echo '縦:'.$vertical.'cm'.'<br>';
        echo '横:'.$width.'cm'.'<br>';
        echo '高さ:'.$height.'cm'.'<br>';
        
        echo '体積は、'.getTaiseki($vertical,$width,$height).'㎤';

    ?>
</body>
</html>