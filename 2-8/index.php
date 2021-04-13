<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach</title>
</head>
<body>
    <?php
        $fruits=["apple"=>"りんご","orange"=>"みかん","peach"=>"もも"];

        foreach($fruits as $key => $value){
            echo $key."といったら".$value;
            echo '<br>';
        }
    ?>
</body>
</html>