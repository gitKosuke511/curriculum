//問１
let numbers = [2,5,12,13,15,18,22];

for(i = 0; i < numbers.length; i++){
    if(numbers[i] % 2 === 0){
        isEven(numbers[i]);
    }
}

function isEven(num){
    console.log(num + 'は偶数です');
}

//問２
class Car {
    //コンストラクタ    
    constructor(gas,num){
        this.gas = gas;
        this.num = num;
    }

    getNumGas(){
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.num}です。`);
    }
}
//オブジェクト作成
let car = new Car(20,1234);
car.getNumGas();
