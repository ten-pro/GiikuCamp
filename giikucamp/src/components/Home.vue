<template>
    <div>
      
      <Header />
      <div class="anniversary">
        <Anniversary />
      </div>
      <div class="pulsbutton">
        <PulsButton />
      </div>
    </div>
  </template>
  <script setup>
  import Header from "./Header.vue"
  import Anniversary from "./Home/Anniversary.vue"
  import PulsButton from "./Home/PlusButton.vue"

</script>
  <style scoped>
  .h1{
    color:red;
  }
  .anniversary{
    overflow: auto;
    height:700px;
    margin-top:30px;
  }
  .pulsbutton{
    position: absolute;
    right: 30px;
    bottom:30px;
  }
  </style>
  