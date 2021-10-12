var app = new Vue({
    el: '#app',
    data: {
        list: [],
        addText: '',
        inQueryText: '', //検索テキストボックスの内容を格納
        array: [],
    },
    //watchでlistの変更を監視
    watch: {
        list: {
            handler: function() {
                //localStorageにデータを保存
                localStorage.setItem("list", JSON.stringify(this.list));
            },
            deep: true
        }
    },
    //マウントされた時にlocalStorageからデータを取得
    mounted: function() {
        this.list = JSON.parse(localStorage.getItem("list")) || [];
    },
    methods: {
        addToDo: function() {
            if (this.addText !== '') {
                this.list.push({
                    text: this.addText, 
                    isChecked: false,
                });
            }
            this.addText = '';
        },
        deleteBtn: function() {
            this.list = this.list.filter(function(todo) {
                return !todo.isChecked;
            });
        },        
    },
    computed: {
        //算出プロパティ
        tasks: function(){
            return this.list.filter((todo) => !todo.isChecked).length;
        },
        //要件３
        inQuery: function(){
            this.array = [];
            if(this.inQueryText !== ''){
                let keyword = this.inQueryText;
                
                for(let i in this.list){
                    let lists = this.list[i];
                    //console.log(lists);    
                    if(lists.text.indexOf(keyword) !== -1){
                        this.array.push({
                            text: lists.text,
                            isChecked: false,
                        });         
                    }
                }
                
                return this.array;
            }       
        } 
    }
});