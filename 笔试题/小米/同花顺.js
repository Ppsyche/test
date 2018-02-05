//1-13代表扑克牌A-K，大于13为王，王什么都能代替，判断5张牌能不能顺
function fn (arr){
  let len = arr.length;
  //排序
  for(let i = 0; i < arr.len; i++){
    for(let j = 0 ; j  < arr.len - i - 1; j++){
      if(arr[j] > arr[j+1]){
        let k = arr[j];
        arr[j] = arr[j+1];
        arr[j+1] = k;
      }
    } 
  }
  let wang = 0;
  let que = 0;
  for(let i = 1; i < arr.len; i++){
    if(arr[i] > 13){
      wang ++;
    }else if(arr[i] === arr[i-1]){
     return false;
    }
   que = que + (arr[i] - arr[i-1] - 1);
  }
  if(que <= wang){
    return true;
  }else{
    return false;
  }
}