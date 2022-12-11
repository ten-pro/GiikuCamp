
<template>
    <div>
        <!-- <div v-if=""></div> -->
        <div v-for="annive,index in anniversarys" :key="annive" class="anniverap">
            <div class="flex">
                <div class="yearday">
                    <div class="flex">
                        <div class="yearnum white">
                            {{annive.year}}
                        </div>
                        <div class="year white">
                            year
                        </div>
                    </div>
                    <div class="flex">
                        <div class="monthnum white">
                            {{annive.month}}
                        </div>
                        <div class="month white">
                            month
                        </div>
                    </div>
                </div>
                <div class="text">
                    <p class="title">{{annive.title}}</p>
                    <p class="anniversaryday">{{annive.annivemonth}}月{{annive.anniveday}}日　あと<span class="countdown">{{annive.nextmonth}}</span>ヶ月<span class="countdown">{{annive.nextday}}</span>日</p>
                    <img src="../IMG/pulldown.png" class="pulldown" @click="wide(index)">
                    <div class="gomi" v-show="trash">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </div>
                    <div v-show="display[index]" class="detail">{{ annive.detail }}</div>
                </div>
            </div>
        </div>
        <div class="null" @click="get"></div>
    </div>
</template>
<script setup>
import axios from 'axios'
import { reactive } from "vue"
const now=reactive(new Date());
let anniversarys = reactive([])
let display = reactive([false])
let trash = reactive([false])
window.onload=function(){
    // anniversarys[anniversarys.length]={
    //                     title:"記念日",
    //                     detail:"記念日詳細ああああああああああああああああああああああああ",
    //                     anniveyear:11,
    //                     annivemonth:11,
    //                     anniveday:11,
    //                     year:110,
    //                     month:11,
    //                     nextmonth:11,
    //                     nextday:11
    //             }
    axios
        .post('https://mp-class.chips.jp/calendar/main.php', {
            user_id: 1,
            get_list: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function(res){
            console.log(res.data);
                for(let i=0;i<res.data.length;i++){
                    display[i] = false;
                    let annive = new Date(res.data[i].annivarsary_day);
                    anniversarys[anniversarys.length]={
                        title:res.data[i].annivarsary_title,
                        detail:res.data[i].annivarsary_detail,
                        anniveyear:annive.getFullYear(),
                        annivemonth:annive.getMonth()+1,
                        anniveday:annive.getDate(),
                        year:now.getFullYear()-annive.getFullYear()/100*100,
                        month:now.getMonth()-annive.getMonth()>0?now.getMonth()-annive.getMonth():annive.getMonth()-now.getMonth(),
                        nextmonth:11-(now.getMonth()-annive.getMonth()>0?now.getMonth()-annive.getMonth():now.getMonth()-annive.getMonth()==0&&now.getDate()<annive.getDate()?11:annive.getMonth()-now.getMonth()),
                        nextday:annive.getDate()-now.getDate()>0?annive.getDate()-now.getDate():now.getMonth()==1||now.getMonth()==3||now.getMonth()==5||now.getMonth()==7||now.getMonth()==8||now.getMonth()==10||now.getMonth()==12?32-now.getDate()+annive.getDate():now.getMonth()==2?29-now.getDate()+annive.getDate():31-now.getDate()+annive.getDate()
                }
            }
        })
}
const wide=(i)=>{
    display[i] = !display[i]
}
</script>

<style scoped>
.anniverap{
    margin-bottom:10px;
}
.yearday {
    margin-top:10px;
    margin-left:10px;
    width:80px;
    height:80px;
    border-radius: 20px;
    background-color: #E27A93;
}
.white{
    color:white;
}
.yearnum{
    margin-top:12px;
    font-size: 25px;
}
.year{
    margin-top:18px;
    font-size:20px;
}
.monthnum{
    margin-top:-5px;
    margin-left:14px;
    font-size:20px;
}
.month{
    font-size: 12px;
    margin-top:0px;
}
.detail{
    padding:10px 20px 10px 10px;
}
.text{
    position: relative;
    margin-left:16px;
    width:265px;
    height:100%;
    border: 2px solid #E27A93;
    border-radius: 10px;
    background-color: #FDFCFC;
}
.title{
    font-weight: bold;
    font-size: 20px;
    margin-top: 10px;
    margin-left:10px;
}
.anniversaryday{
    margin-top:10px;
    margin-left:10px;
    margin-bottom: 0px;
    color:#818181;
}
.countdown{
    font-weight: bold;
    color:#E27A93;
}
.pulldown{
    position:absolute;
    top:75%;
    right:5px;
    width:25px;
    cursor: pointer;
}


.flex{
    display: flex;
}
.null{
    height:100px;
}
</style>
