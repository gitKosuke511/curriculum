class Taiyaki{
    //コンストラクタ
    constructor(nakami){
        this.nakami = nakami;
    }
    //メソッド
    aji(){
        console.log('中身は'+ this.nakami +'です');
    }

}

let nakami = [];
nakami[0] = new Taiyaki('あんこ');
nakami[1] = new Taiyaki('クリーム');
nakami[2] = new Taiyaki('チーズ');
for(i = 0; i < nakami.length; i++){
    nakami[i].aji();
}
