<?php
    require_once("getData.php");
    //インスタンス化して、関数呼び出し
    $cls = new getData();
    $sth = $cls->getUserData();
    
    foreach($sth as $rows){
    //名前を取り出す
        $username = $rows['first_name'].' '.$rows['last_name'];
        $login = $rows['last_login'];
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>第3章チェックテスト</title>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="logo"><img src="./image/logo.png"> </div>
            <div class="header_right clearfix">
                <div class="header_user">
                   <?php echo '<span>ようこそ'.$username.'さん</span>'; ?>  
                </div>
                <div class="header_time">
                    <?php echo '<span>最終ログイン日:'.$login.'</span>'; ?>
                </div>
            </div>
        </div>
        <div class="main">
        <table>
            <tr class="table_head"><th>記事ID</th><th>タイトル</th><th>カテゴリー</th><th>本文</th><th>投稿日</th></tr>
            <?php
                 $psd = $cls->getPostData();
                 foreach($psd as $rows){
                    echo '<tr class=table_body><td>';
                    echo $rows['id'];
                    echo '</td><td>';
                    echo $rows['title'];
                    echo '</td><td>';
                    switch($rows['category_no']){
                        case 1;
                            echo '食事';
                            break;
                        case 2;
                            echo '旅行';
                            break;
                        default;
                            echo 'その他';
                            break;
                    }
                    //echo $rows['category_no']; 2021/6/14コメントアウト
                    echo '</td><td>';
                    echo $rows['comment'];
                    echo '</td><td>';
                    echo $rows['created'];
                    echo '</td></tr>';
                }
            ?>
        </table>
        </div>
        <div class="footer">&copy;Y&I group.inc</div>
    </div>
</body>
</html>