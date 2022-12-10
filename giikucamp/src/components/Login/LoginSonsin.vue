<template>
    <div class="back">
        <img src="../IMG/back.png" alt="" class="backimg">

        <div class="mozi1">name</div>
        <input type="text" class="login_input" v-model="name"><br>

        <div class="mozi2">pass</div>
        <input type="pass" class="login_pass" v-model="pass">

        <p class="error1" :class="{'check':check}">＊ユーザー名が登録されていません</p>
        <button class="logbtn" @click="login">login</button>
        <a href="/create"><button class="createbtn">create new</button></a>
    </div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
let name=reactive("");
let pass=reactive("");
let check=reactive(true);
const login=()=>{
    axios
        .post('https://mp-class.chips.jp/calendar/main.php', {
            user_name: name,
            user_pass: pass,
            login_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res) {
            console.log(res.data);
            if(res.data[0].chk){

            }else{

            }
        })
}
</script>
<style>

.backimg{
    width: 390px;
    height: 100%;
    position: absolute;
}

.login_input{
    position: absolute;
    margin-left: 130px;
    margin-top: 350px;
    width: 210px;
    height: 40px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;

}
.mozi1{
    margin-top: 355px;
    position: absolute;
    margin-left: 40px;
    font-size: 23px;
    color: white;
}
.login_pass{
    position: absolute;
    margin-left: 130px;
    margin-top:410px;
    width: 210px;
    height: 40px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;

}
.mozi2{
    margin-top: 420px;
    position: absolute;
    margin-left: 40px;
    font-size: 23px;
    color: white;
}
.error1{
    display: none;
}
.error1.check{
    color: #CB0000;
    position: absolute;
    margin-top: 480px;
    margin-left: 55px;
}
.logbtn{
    position: absolute;
    margin-top: 530px;
    margin-left: 80px;
    width: 223px;
    height: 54px;
    border-radius: 50px;
    color: white;
    background-color: #F4A3E2;
    border: none;
    font-size: 28px;
}
.createbtn{
    position: absolute;
    border-right:none;
    border-left:none;
    border-top:none;
    border-color: #9C39A1;
    margin-top: 630px;
    margin-left: 130px;
    font-size: 25px;
    color: #9C39A1;
    background: transparent;
}

</style>