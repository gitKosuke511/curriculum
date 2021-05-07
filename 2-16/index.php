<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルのデータを読み書き</title>
</head>
<body>
    <?php
        $test_file = "test2.txt";
        $contents = "こんにちは！";
        
        if (is_readable($test_file)) {
        
            // 書き込み可能なときの処理
            // 対象のファイルを開く
            $fp = fopen($test_file, "r");
            //開いたファイルから読み込む
            while($line = fgets($fp)){
                // 改行コード込みで1行ずつ出力
                echo $line.'<br>';
            }
            // ファイルを閉じる
            fclose($fp);
            // 書き込みした旨の表示
            echo "finish readable!!";
        } else {
            // 書き込み不可のときの処理
            echo "not readable!";
            exit;
        }
    ?>
</body>
</html>