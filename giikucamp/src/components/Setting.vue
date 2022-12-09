<template>
    <div>
        <Header />
        <div class="sheader">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-arrow-left"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
        </div>
        <div class="userspace">
            <div class="username">ユーザー名</div>
            <input type="text" class="namebox" placeholder="placeholder">
        </div>
        <div class="error">
            <div class="uerror">この名前はすでに使用されています。</div>
        </div>
    </div>
</template>
<script setup>
import Header from "./Header.vue"
</script>
<style scoped>

.bi {
    color: #E27A93;
}
.sheader{
    padding-left: 40px; 
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
}
.namebox{
    background-color: #D9D9D9;
    border-radius: 10px;
    height: 40px;
    width:130px;
    border-style:none;
    font-size: large;
}
.namebox::placeholder {
    color: #E27A93;
text-align: center;

  }
  .uerror{
    font-size: 12px;
    color: red;
  }
  .error{
    text-align: right;
    padding-top:
  }
</style>
  