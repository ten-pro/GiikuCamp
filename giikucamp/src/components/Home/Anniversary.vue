
<template>
    <div>
        <div v-for="annive in anniversarys" :key="annive" class="anniverap">
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
                    <img src="../IMG/pulldown.png" class="pulldown" @click="log">
                </div>
            </div>
        </div>
        <div class="null"></div>
    </div>
</template>
<script setup>
import { reactive } from "vue"
const now=reactive(new Date())
const anniversarys = reactive([
    {title:"付き合った記念日",anniveyear:11,annivemonth:11,anniveday:11,year:11,month:11,nextmonth:11,nextday:11},
    {title:"付き合った記念日",anniveyear:11,annivemonth:11,anniveday:11,year:11,month:11,nextmonth:11,nextday:11},
    {title:"付き合った記念日",anniveyear:11,annivemonth:11,anniveday:11,year:11,month:11,nextmonth:11,nextday:11}
])

const log =()=>{
    let annive = new Date("2020-07-02");
    anniversarys[anniversarys.length]={
        title:"aiueo",
        anniveyear:annive.getFullYear(),
        annivemonth:annive.getMonth()+1,
        anniveday:now.getDate(),
        year:now.getFullYear()-annive.getFullYear()/100*100,
        month:now.getMonth()-annive.getMonth()>0?now.getMonth()-annive.getMonth():annive.getMonth()-now.getMonth(),
        nextmonth:12-(now.getMonth()-annive.getMonth()>0?now.getMonth()-annive.getMonth():annive.getMonth()-now.getMonth()),
        nextday:now.getDate()-annive.getDate()>0?now.getDate()-annive.getDate():annive.getDate()-now.getDate()
    };
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

.text{
    position: relative;
    margin-left:16px;
    width:265px;
    height:100px;
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
    top:75px;
    right:5px;
    width:25px;
}


.flex{
    display: flex;
}
.null{
    height:100px;
}
</style>
