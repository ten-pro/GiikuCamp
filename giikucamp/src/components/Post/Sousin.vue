<template>
    <div class="sousin_area">
            <form action="">
                <div class="sousin_form" id="app">
                    <input type="text" class="forminput" placeholder="タイトルを追加してください" v-model="title" name="title">
                    <input type="date" class="datestyle" v-model = "date1" name="date1" id="set" placeholder="年/月/日" >
                    <textarea cols="30" rows="20" class="postdetailtxt" placeholder="詳細を記入してください" v-model="detail.text" name="detail">
                    </textarea>
                    <!-- <input type="text" class="postdetailtxt" placeholder="(example)it was a great day..." v-model = "detail" name="detail"> -->
                </div>
                <!-- {{ detail.text }} -->
                <img src="../IMG/touroku.png" class="torokuimg" @click="submit">
            </form>
            <p class="error"></p>
        </div>
</template>
<script setup>
    import { reactive } from "vue"
    import swal from "sweetalert"
    import axios from 'axios'
    let title=reactive();
    let date1 = reactive();
    let detail = reactive({
        text: ""
    });

//予定を作成



  const submit = () =>{
            axios
                .post('https://mp-class.chips.jp/calendar/main.php', {
                    
                    // user_id:window.sessionStorage.getItem(['user_id']),
                    user_id:1,
                    annivarsary_day:date1,
                    annivarsary_title:title,
                    annivarsary_detail:detail,
                    insert_annivarsary: ''
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
               .then( (res) => {
                swal("登録されました。", "遷移します。表示されない場合は、リロードしてください。", "success")
                .then( (res) => {
                    location.href = "/home"
                })
               })
  }





</script>
<style>
  .sousin_form{
    margin-top: 10px;
    margin-left: 28px;
    text-align: center;
    width: 320px;
    height: 450px;
    border: 2px solid;
    border-color: #E27A93;
    border-radius: 8px ;
  }
.forminput{
    width: 280px;
    height: 50px;
    border: transparent;
    border-bottom:1px solid #E27A93;
    font-size: 15px;
}
.forminput::placeholder {
    opacity: 0.5;
}
/* ::placeholder{
        color: #9D9D9D;
} */
.datestyle{
    width: 280px;
    height: 50px;
    margin: 0 0 0 10px;
    border-bottom:1px solid #E27A93;
    border-right:none;
    border-left:none;
    border-top:none;
    border-radius:0px;
    color: #000000;
    font-size: 15px;
}
.postdetailtxt{
    border: none; 
    width: 280px;
    height: 200px;
    padding: 15px 0px 5px 10px;
    font-size: 15px;
}
 .torokuimg{
    margin-top: 14px;
    left:287px;
    width: 80px;
    height: 80px;
    position: fixed;
    display: flex;
    cursor: pointer;
  }
.torokuimg:active {
    -webkit-transform: translate(4px);
    transform: translateY(4px);
    border-bottom: none;
}
  p{
    color: red;
    margin-top: 40px;
    margin-left: 28px;
  }
input::placeholder{
    color:  black;
}
</style>

