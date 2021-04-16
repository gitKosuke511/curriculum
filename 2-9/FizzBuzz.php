<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FizzBuzz</title>
</head>
<body>
    <?php
        $num;
        for($num=1;$num<=100;$num++){
            if($num%3==0 and $num%5==0){
                echo 'FizzBuzz!!';
            }elseif($num%3==0){
                echo 'Fizz!';
            }elseif($num%5==0){
                echo 'Buzz!';
            }else{
                echo $num;
            }
            echo '<br>';
        }
    ?>
</body>
</html>