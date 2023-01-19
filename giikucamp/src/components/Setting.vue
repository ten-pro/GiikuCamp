<template>
    <div>
        <Header />
        <div class="sheader">
            <button class="backbutton" @click="setting">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </button>
        </div>
        <div class="userspace">
            <div class="username">ユーザー名</div>
            <input type="text" class="namebox" placeholder="placeholder" v-model="data.name">
        </div>
        <div class="error">
            <div class="uerror" v-show="data.error">この名前はすでに使用されています。</div>
        </div>
        <div class="bigbox"> </div>
        <div class="push">
            <div class="pusha">通知</div>
            <!-- toggle-button -->
            <div class="button r" id="button-1">
                <input type="checkbox" class="checkbox" v-model="data.sw"/>
                <div class="knobs"></div>
                <div class="layer"></div>
            </div>
            <!--  -->
        </div>
        <div class="times">
            <div class="timetxt">時間</div>
            <!--  -->
            <select class="timese" size="1">
                <option value="--">--</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
            </select>
            <!--  -->
        </div>
        <div class="checkday">
            <div class="checkn">日程</div>
            <div class="checkma" name="form1">
                <label for="horns1" class="checkma">
                    <input type="checkbox" id="horns1"  v-model="data.check1">1日前
                </label>
                <label for="horns2" class="checkma">
                    <input type="checkbox" id="horns2" v-model="data.check3">3日前
                </label>
                <label for="horns3" class="checkma">
                    <input type="checkbox" id="horns3" v-model="data.check5">5日前
                </label>
                <label for="horns4" class="checkma">
                    <input type="checkbox" id="horns4"  v-model="data.check7">7日前
                </label>
               
            </div>
        </div>
        <LogoutButton />
        
    </div>
</template>
<script setup>
import moment from "moment"
import Header from "./Header.vue"
import LogoutButton from "./setting/LogoutButton.vue"
import { reactive } from "vue"
import axios from "axios"
import { ref } from 'vue'
let data = reactive({
    name:"",
    sw:false,
    check1:false,
    check3:false,
    check5:false,
    check7:false,
    error:false
})
window.onload=function(){
    axios
        .post('https://mp-class.chips.jp/calendar/main.php', {
            user_id: 1,
            get_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (res) {
            console.log(res.data)
            data.name = res.data[0].name;
            res.data[0].alert==1?data.sw=true:data.sw=false;
            res.data[0].alert_day1==1?data.check1=true:data.check1=res.data.alert_day1;
            res.data[0].alert_day3==1?data.check3=true:data.check3=false;
            res.data[0].alert_day5==1?data.check5=true:data.check5=false;
            res.data[0].alert_day7==1?data.check7=true:data.check7=false;
        })
}
const setting =()=>{
    console.log(data);
    axios
        .post('https://mp-class.chips.jp/calendar/main.php', {
            user_id: 1,
            user_name: data.name,
            alert: data.sw?1:0,
            alert_time: "",
            alert_date1: data.check1?1:0,
            alert_date3: data.check3?1:0,
            alert_date5: data.check5?1:0,
            alert_date7: data.check7?1:0,
            update_user: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(
            // (response) => (this.loginchk = response.data),
            (response) => (location.href="/home")
        )
}
</script>
<style scoped>
.backbutton{
    background-color: transparent;
    border: none;
    
}
.bi {
    color: #E27A93;
    cursor:pointer;
}
.sheader{
padding:20px 0px 20px 40px;

}
.username{
    font-family: sans-serif;
    font-weight: 1000;
    color:#E27A93;
    font-size: large;
}
.userspace{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top:40px;
}
.namebox{
    background-color: #D9D9D9;
    border-radius: 10px;
    height: 40px;
    width:100px;
    border-style:none;
    font-size: large;
    padding:0 10px;
}
.namebox::placeholder {
    color: #E27A93;
text-align: center;

  }
  .uerror{
    font-size: 12px;
    color: red;
    padding-right:20px;
  }
  .error{
    text-align: right;
    padding-top:5px;
  }
  .pusha{
    font-family: sans-serif;
    font-weight: 1000;
    color:#E27A93;
    font-size: large;
  }
.push{
    align-items: center;
    display: flex;
    justify-content: space-around;
    padding: 30px 0px;
}
.bigbox{
position:absolute;
background-color:transparent;
    width:350px;
    height:250px;
    left:20px;
    top:340px;
    border-radius: 20px;

    border-left:1px solid #E27A93;
border-bottom:1px solid #E27A93;
border-right:1px solid #E27A93;
}
.times{
    display: flex;
    margin-top:10px;
    justify-content: space-around;
}
.timetxt{
    font-family: sans-serif;
    font-weight: 1000;
    color:#E27A93;
    font-size: large;
    margin-left:10px;
}
.timese{
    width:100px;
    height:30px;
    color:#ffffff;
    font-size: large;
    background-color:#E27A93
}
.checkday{
display: flex;
justify-content: space-around;
margin-top:40px;
}
.checkma{
    display:block;
    color:#E27A93;
    font-size:large;
    font-weight: 600;
    font-family: sans-serif;
}
.checkn{
    font-family: sans-serif;
    font-weight: 1000;
    color:#E27A93;
    font-size: large;
    margin-right:10px;
}
input[type=checkbox] {
	transform: scale(2);
	margin: 0 6px 0 0;
}














 /*toggle-button*/
.knobs,
.layer {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}

.button {
  position: relative;
  top: 50%;
  width: 74px;
  height: 36px;
  overflow: hidden;
}

.button.r,
.button.r .layer {
  border-radius: 100px;
}

.button {
  border-radius: 2px;
}

.checkbox {
  position: relative;
  width: 100%;
  height: 100%;
  padding: 0;
  margin: 0;
  opacity: 0;
  cursor: pointer;
  z-index: 3;
}

.knobs {
  z-index: 2;
}

.layer {
  width: 100%;
  background-color: #D9D9D9;
  transition: 0.3s ease all;
  z-index: 1;
}
#button-1 .knobs:before {
  content: "OFF";
  position: absolute;
  top: 4px;
  left: 4px;
  width: 20px;
  height: 10px;
  color: #fff;
  font-size: 10px;
  font-weight: bold;
  text-align: center;
  line-height: 1;
  padding: 9px 4px;
  background-color: #E27A93;
  border-radius: 50%;
  transition: 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15) all;
}

#button-1 .checkbox:checked + .knobs:before {
  content: "NO";
  left: 42px;
  background-color: #E27A93;
}

#button-1 .checkbox:checked ~ .layer {
  background-color: #E27A93;
  opacity: 0.3;
}

#button-1 .knobs,
#button-1 .knobs:before,
#button-1 .layer {
  transition: 0.3s ease all;
}

</style>
  