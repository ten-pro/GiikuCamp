<template>
    <div id="app">
    <div class="back">
        <img src="../IMG/back.png" alt="" class="backimg">
                    <div class="mozi3">name</div>
                    <input type="text" class="form_input"  v-model="state.name"><br>
            
                    <div class="mozi4">pass</div>
                    <input type="pass" class="form_pass"  v-model="state.pass1">

                    <div class="mozi5">Re-enter</div>
                    <input type="pass" class="form_reenter" v-model="state.pass2">
                    
                <p class="error2" v-show="state.name==''">＊ユーザー名を入力してください</p>
                <p class="error2 pass1" v-show="state.pass1==''">＊パスワードを入力して下さい</p>
                <p class="error2 pass2" v-show="state.pass1!=state.pass2">＊パスワードが一致しません</p>
                
                <button class="createbtn2" @click="create">Create new</button>
        <a href="/"><button class="logbtn2">login</button></a>
    </div>
</div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
import swal from 'sweetalert'
let display=reactive(["none"]);
let state = reactive({
  name:"",
  pass1: "",
  pass2: ""
})
const create=()=>{
    if(state.pass1==""){
        swal("パスワードを入力してください","","error")
    }else if(state.name==""){
        swal("名前を入力してください","","error")
    }else if(state.pass1==state.pass2){
        console.log(state.name+" "+state.pass1);
    axios
        .post('https://mp-class.chips.jp/calendar/main.php', {
            name: state.name,
            pass: state.pass1,
            create_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res) {
            console.log(res.data);
            swal("アカウントを登録しました！ログイン画面でログインしてください","","success")
            .then(()=>{
                location.href="/";
            })
        })
    }else{
        swal("パスワードが一致していません。","","error")
    }
}
</script>
<style>

.backimg{
    width: 390px;
    height: 100%;
    position: absolute;
}

.form_input{
    position: absolute;
    margin-left: 130px;
    margin-top: 340px;
    width: 210px;
    height: 40px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;

}
.mozi3{
    margin-top: 345px;
    position: absolute;
    margin-left: 40px;
    font-size: 23px;
    color: white;
}
.form_pass{
    position: absolute;
    margin-left: 130px;
    margin-top:370px;
    width: 210px;
    height: 40px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;

}
.mozi4{
    margin-top: 380px;
    position: absolute;
    margin-left: 45px;
    font-size: 23px;
    color: white;
}
.form_reenter{
    position: absolute;
    margin-left: 130px;
    margin-top:430px;
    width: 210px;
    height: 40px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;

}
.mozi5{
    margin-top: 438px;
    position: absolute;
    margin-left: 30px;
    font-size: 20px;
    color: white;
}
.error2{
    color: #CB0000;
    position: absolute;
    margin-top: 480px;
    margin-left: 55px;
}
.createbtn2{
    position: absolute;
    margin-top: 550px;
    margin-left: 90px;
    width: 223px;
    height: 54px;
    border-radius: 50px;
    color: white;
    background-color: #F4A3E2;
    border: none;
    font-size: 30px;
}
.logbtn2{
    position: absolute;
    border-right:none;
    border-left:none;
    border-top:none;
    border-color: #9C39A1;
    margin-top: 630px;
    margin-left: 170px;
    font-size: 25px;
    color: #9C39A1;
    background: transparent;
}
.pass1{
    margin-top:500px;
}
.pass2{
    margin-top:520px;
}
</style>