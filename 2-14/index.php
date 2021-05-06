<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>便利な関数(配列)</title>
</head>
<body>
    <?php
        $members = ["sato","suzuki","takahashi","tanaka"];
        
        echo count($members);   //要素数をカウント
        echo '<br>';
        
        echo sort($members);    //並び替え
        echo '<br>';
        
        if (in_array("uchida",$members)){ //配列の中を探します
            echo 'uchidaさんはいます。';
        }else{
            echo 'uchidaさんは、いません。';
        }
        echo '<br>';
        
        $atstr = implode("@",$members); //配列の文字列を結合
        var_dump($atstr);   //中身を表示
        echo '<br>';

        $str = "1,2,3,4,5";
        $array = explode(",",$str); //カンマ区切りで配列へ格納
        var_dump($array);

    ?>
</body>
</html>