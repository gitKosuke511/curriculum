function createJuice(fruits){
    //③「〇〇を受け取りました。ジュースにして返します」と出力
    console.log(fruits + "を受け取りました。ジュースにして返します");
    //④受け取った果物にジュースという文字列を結合して、呼び出し元に返す
    return fruits+"ジュース";
}

let juice = "みかん";
console.log(createJuice(juice)+"が届きました");