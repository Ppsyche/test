<template>
  <div class="hello">
    <ul class="tab">
      <li @click="recope" :class="{select:flag}">今日食谱</li>
      <li @click="statistics" :class="{select:!flag}">今日统计</li>
    </ul>
    <div class="box">
      <div class="recope" v-if="flag">
        <div class="input-box">
          <input type="text" v-model="allCheckList[0]" placeholder="主食">
          <div class="blue" @click="clickmainFood"></div>
        </div>
        <div class="input-box">
          <input type="text" v-model="allCheckList[1]" placeholder="副食">
          <div class="blue" @click="clicksubFood"></div>
        </div>
        <div class="input-box">
          <input type="text" v-model="allCheckList[2]" placeholder="酒水">
          <div class="blue" @click="clickdrink"></div>
        </div>
        <div class="button" @click="add">加入食谱</div>
      </div>
      <div class="statistics" v-else>
        <table cellspacing="0" cellpadding="0" border="1" bordercolor="#333">
          <tr>
            <th>主食</th>
            <th>副食</th>
            <th>酒水</th>
          </tr>
          <tr v-for="show in showList">
            <td v-for="one in show">{{one}}</td>
          </tr> 
        </table>
        <div class="page-box">
          <div class="page-left">当前显示第{{page}}页</div>
          <div class="page-right">
            <div class="up" @click="up">上</div>
            <ul><li v-for="n in pageNum" @click="changePage(n)">{{n}}</li></ul>
            <div class="down" @click="down">下</div>
          </div>
        </div>
      </div>
    </div>
    <pop-up v-if="hide" :pop-title="title" :pop-content="checkList" @yes="yes" @no="no"></pop-up>
    
  </div>
</template>

<script>
import PopUp from './PopUp'
export default {
  name: 'hello',
  data () {
    return {
      flag:true,
      page:1,
      pageNum:1,
      hide:false,
      title:"主食",
      checkList:["馒头","米饭","面条"],
      allCheckList:["","",""],
      allDayList:[],
      showList:[]
    }
  },
  components:{   
    PopUp,
  },
  methods:{
    recope:function(){
      this.flag = true;
    },
    statistics:function(){
      this.flag = false;
      this.pageNum = Math.ceil(this.allDayList.length/3);
      this.showList = this.allDayList.slice(0,3);
    },
    clickmainFood:function(){
      this.title = "主食";
      this.checkList = ["馒头","米饭","面条"];
      this.hide = true;
    },
    clicksubFood:function(){
      this.title = "副食";
      this.checkList = ["鸡","鸭","鱼","青菜"];
      this.hide = true;
    },
    clickdrink:function(){
      this.title = "酒水";
      this.checkList = ["啤酒","饮料","矿泉水"];
      this.hide = true;
    },
    yes:function(checked){
      console.log(checked);
      switch(checked[0]){
        case "主食": this.allCheckList[0]=checked[1];break;
        case "副食": this.allCheckList[1]=checked[1];break;
        case "酒水": this.allCheckList[2]=checked[1];break;
      }
      this.hide = false;
    },
    no:function(){
      // console.log("mei");
      this.hide = false;
    },
    add:function(){
      this.allDayList.push(this.allCheckList);
      this.allCheckList = ["","",""];
    },
    up:function(){
      if(this.page!=1){
        this.page--;
        this.showList = this.allDayList.slice((this.page-1)*3,(this.page)*3);
      }
    },
    down:function(){
      if(this.page!=this.pageNum){
        this.page++;
        this.showList = this.allDayList.slice((this.page-1)*3,(this.page)*3);
      }
    },
    changePage:function(n){
      this.page = n;
      this.showList = this.allDayList.slice((n-1)*3,(n)*3);
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  *{
    margin: 0;
    padding: 0;
  }
  ul,li{
    list-style: none;
  }
  .hello{
    height: 500px;
    width: 500px;
    margin: 0 auto;
  }
  .tab{
    overflow: hidden;
  }
  .tab li{
    float: left;
    width: 100px;
    height: 30px;
    line-height: 30px;
    border: 1px solid #333;
    background: #6e96e2;
    margin-right: 3px;
    cursor: pointer;
  }
  .tab li.select{
    background: #5191bd;
  }
  .box{
    height: 400px;
    border: 1px solid #333;
  }
  .input-box{
    width: 200px;
    height: 30px;
    border: 1px solid #6e96e2;
    margin: 50px auto;
    text-align: left;
  }
  .input-box input{
    height: 30px;
    width: 160px;
    border: 0;
    padding: 0 3px;
  }
  .input-box .blue{
    background: #6e96e2;
    width: 34px;
    height: 30px;
    float: right;
  }
  .button{
    width: 150px;
    background-color:#79b5f3;
    border-radius: 3px;
    border:1px solid #84bbf3;
    cursor:pointer;
    color:#ffffff;
    font-size:15px;
    font-weight:bold;
    padding:6px 24px;
    text-shadow:0px 1px 0px #528ecc;
    margin: 10px auto;
  }
  table{
    width: 420px;
    margin: 10px auto;
    border-collapse: collapse;
  }
  table th,table td{
    width: 140px;
    height: 50px;
  }
  .page-box{
    width: 420px;
    margin: 10px auto;
  }
  .page-box .page-left{
    float: left;
  }
  .page-box .page-right{
    float: right;
  }
  .page-box .page-right div,.page-box .page-right ul,.page-box .page-right li{
    float: left;
  }
  .page-box .page-right div,.page-box .page-right li{
    width: 20px;
    height: 20px;
    line-height: 20px;
    border: 1px solid #333;
    margin-left: 2px;
  }

</style>
