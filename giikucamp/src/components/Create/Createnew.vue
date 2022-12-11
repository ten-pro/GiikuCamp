<template>
    <div class="back">
        <img src="../IMG/back.png" alt="" class="backimg">
        <form action="">
                
                    <div class="mozi3">name</div>
                    <input type="text" class="form_input"><br>
            
                    <div class="mozi4">pass</div>
                    <input type="pass" class="form_pass">

                    <div class="mozi5">Re-enter</div>
                    <input type="pass" class="form_reenter">
                    
                <p class="error2">＊ユーザー名が登録されていません</p>
                <button class="createbtn2">Create new</button>
        </form>
        <a href="/"><button class="logbtn2">login</button></a>
    </div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
let name=reactive("");
let pass=reactive("");
let display=reactive(["none"]);
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
            if(res.data==false){
                display[0]="block"
            }else{
                sessionStorage.setItem('id',res.data[0].id);
                location.href="/home";
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
    margin-top: 500px;
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

</style>