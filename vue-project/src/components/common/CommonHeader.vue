<template>
  <div class="header">
    <button>首页</button>
    <h2>movie</h2>
  </div>
</template>

<script>
export default {
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    @import "../../assets/css/reset.css";
    .header{
      display: flex;
      height: 1rem;
      background: rgb(33,150,243);
    }
    .header button{
      width: 1rem;
      height: 1rem;
      background: rgb(33,150,243);
      color: #fff;  
      border: none; 
    }
    .header h2{
      flex: 1;
      /*font-size: 30px;*/
      line-height: 1rem;
      text-align: center;
      text-indent: -0.5rem;
      color: #fff;
    }
</style>
