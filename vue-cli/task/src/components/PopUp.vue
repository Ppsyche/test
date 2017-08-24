<template>
  <div class="pop-up">
    <div id="pop">
      <div class="pop-heard">
        <p>{{popTitle}}</p>
      </div>
      <div class="pop-body">
        <ul>
          <li v-for="content in popContent">
            <input type="checkbox" v-model="checked" :value="content">{{content}}
          </li>
        </ul>
        <div class="btn-box">
          <input class="btn" type="button" value="确定" @click="yesBttn" />
          <input class="btn" type="button" value="取消" @click="noBttn" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'pop-up',
  props: ['popTitle','popContent'],
  data () {
    return {
      checked:[]
    }
  },
  mounted(){
    var oPop = document.getElementById("pop");
    var bodyW = document.documentElement.clientWidth;
    var bodyH = document.documentElement.clientHeight;
    var oPopW = oPop.offsetWidth;
    var oPopH = oPop.offsetHeight;
    oPop.style.left = (bodyW - oPopW)/2 + 'px';
    oPop.style.top = (bodyH - oPopH)/2 + 'px';
    //鼠标按下的函数
    oPop.onmousedown = function(ev) {
    var oEvent = ev || event;
    //求出鼠标和oPop的位置差值
    var x = oEvent.clientX - oPop.offsetLeft;
    var y = oEvent.clientY - oPop.offsetTop;
    //鼠标移动的函数
    //把事件加在document上，解决因为鼠标移动太快时，
    //鼠标超过oPop后就没有了拖拽的效果的问题
    document.onmousemove = function(ev) {
     var oEvent = ev || event;
     
     //保证拖拽框一直保持在浏览器窗口内部，不能被拖出的浏览器窗口的范围
     var l = oEvent.clientX - x;
     var t = oEvent.clientY - y;
     if(l < 0) {
     l = 0;
     
     } else if(l > document.documentElement.clientWidth - oPop.offsetWidth) {
     l = document.documentElement.clientWidth - oPop.offsetWidth;
     }
     if(t < 0) {
     t = 0;
     } else if(t > document.documentElement.clientHeight - oPop.offsetHeight) {
     t = document.documentElement.clientHeight - oPop.offsetHeight;
     }
     oPop.style.left = l + "px";
     oPop.style.top = t + "px";
    }
    //鼠标抬起的函数
    document.onmouseup = function() {
     document.onmousemove = null;
     document.onmouseup = null;
    }
    //火狐浏览器在拖拽空div时会出现bug
    //return false阻止默认事件，解决火狐的bug
    return false;
     
    }
  },
  methods:{
    yesBttn:function(){
      // console.log(this.allcheck);
      var checkall = [this.popTitle,""];
      this.checked.forEach(function(val){
          checkall[1] += val + " ";
      });
      this.$emit("yes",checkall);
    },
    noBttn:function(){
      this.$emit("no","");
    }
  }
  
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
ul,li{
  list-style: none;
  margin: 0;
  padding: 0;
}
.pop-up{
  width: 100vw;
  height: 100vh;
  z-index: 900;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  font: 0;
  background: rgba(0,0,0,.5);
}
#pop{
  width: 200px;
  height: 300px;
  position: absolute;
  z-index: 999;
  border: 1px solid rgb(0,0,0,0.3);
  background-color: #fff;
  border-radius: 6px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.5);
}
.pop-heard{
  height: 30px;
  line-height: 30px;
  padding: 10px;
  /*width: 100%;*/
  background-color: #5e9fa1;
  border-radius: 6px 6px 0 0;
}
.pop-heard p{
  font-weight: 600;
  color: #fff;
  margin: 0;
}
.pop-body{
  padding: 15px 10px;

}
.pop-body ul{
  margin-bottom: 10px;
}
.pop-body .btn-box{
  position: absolute;
  right: 30px;
  bottom: 30px;
}
.pop-body .btn-box .btn{
  border: 1px solid #d1d1d1;
  border-radius: 3px;
  background-color: #f7f7f7;
  height: 28px;
  padding: 0 20px;
  cursor: pointer;
  line-height: 28px;
  display: inline-block;
  color: #666666;
}
.pop-body .btn-box .btn:first-child{
  background: #5e9fa1;
  margin-right: 5px;
  color: #fff;
}
</style>
