let a = 5;
let b = 18;
let x = 10;
let y = 0;

//変数aは10ではない
if(a != 10){
    console.log("変数aは" + a);
} 

//変数bは10以上20未満、かつ偶数である
if(b >= 10 && b < 20 && b % 2==0){
    console.log("変数bは偶数である");
} else{
    console.log("変数bは奇数である");
}

//問２
if(x>=10 && x<=20){
    console.log("成功です");
}else{
    console.log("失敗です");
}

//問３
if(y % 2 === 0){
    console.log("偶数です");
} else if(y % 2 !== 0 ){
    console.log("奇数です");
}