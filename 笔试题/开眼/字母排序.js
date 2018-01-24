// 给定一个只包含字母的数组(数组项是单个字符)，按照先小写后大写的顺序进行排序。
// 要求：所有数据只扫描一次，可以给出思路及不同解法，最好是呈现代码
// 示例：给出数据 var strArr = ['a', 'c', 'b',  'E', 'd', 'F', 'g']，
//            得到的答案可能是 ['a', 'c', 'b', 'g', 'd', 'F', 'E']

const strSort = (strArr) =>{
  let i = 0, j = strArr.length - 1;
  while(i < j){
    if(strArr[i] >= 'a' && strArr[i] <= 'z' && strArr[j] >= 'A' && strArr[j] <= 'Z'){
      i++;j--;
    }else if(strArr[i] >= 'a' && strArr[i] <= 'z'){
      i++;
    }else if(strArr[j] >= 'A' && strArr[j] <= 'Z'){
      j--;
    }else{
      let str = strArr[i];
      strArr[i] = strArr[j];
      strArr[j] = str;  
    }
  }
  return strArr;
}
console.log(strSort(['a', 'c', 'b', 'E', 'd', 'F', 'g']));