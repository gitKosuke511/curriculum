<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>第2章チェックテスト</title>
</head>
<body>
<?php
    //POST送信で送られてきた名前を受け取って変数を作成
    $name = $_POST['name'];
    //①画像を参考に問題文の選択肢の配列を作成してください。
    $question_1 = ["80","20","21","22"];
    $question_2 = ["PHP","Python","JAVA","HTML"];
    $question_3 = ["join","select","insert","update"];
    //② ①で作成した、配列から正解の選択肢の変数を作成してください
    $ca_1 = "80"; //correct ansewer
    $ca_2 = "HTML";
    $ca_3 = "select";
?>
    <p>お疲れ様です<?php echo $name; ?><!--POST通信で送られてきた名前を出力-->さん</p>
    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="POST">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
        foreach($question_1 as $value){
            echo '<input type="radio" name="q1" value="'.$value.'">'.$value;
        }
    ?>
    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php
        foreach($question_2 as $value){
            echo '<input type="radio" name="q2" value="'.$value.'">'.$value;
        }
    ?>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php
            foreach($question_3 as $value){
                echo '<input type="radio" name="q3" value="'.$value.'">'.$value;
            }
        ?>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden"  name="a1" value="<?php echo $ca_1; ?>">
    <input type="hidden"  name="a2" value="<?php echo $ca_2; ?>">
    <input type="hidden"  name="a3" value="<?php echo $ca_3; ?>">
    <input type="hidden"  name="name" value="<?php echo $name; ?>">
    <br>
    <input type="submit" value="回答する" id="btn"> 
    </form>
</body>
</html>