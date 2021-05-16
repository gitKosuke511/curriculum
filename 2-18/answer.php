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
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    $question_1 = $_POST['q1'];
    $question_2 = $_POST['q2'];
    $question_3 = $_POST['q3'];

    $answer_1 = $_POST['a1'];
    $answer_2 = $_POST['a2'];
    $answer_3 = $_POST['a3'];

    $name = $_POST['name'];
    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
    function getResult($question,$answer){
        if ($question == $answer){
            echo '正解！';
        }else{
            echo '残念・・・';
        }
    }
?>
    <p><!--POST通信で送られてきた名前を表示--><?php echo $name; ?>さんの結果は・・・？</p>
    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php getResult($question_1,$answer_1)?>
    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php getResult($question_2,$answer_2)?>
    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php getResult($question_3,$answer_3)?>    
</body>
</html>