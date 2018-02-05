function fun(arr, num){
  let m = arr.length - 1;
  let k = 0;
  while(m > k){
    let n= Math.floor((m + k)/2);
    if(arr[n] === num){
      return n;
    }
    if(arr[n] > num){
      m = n;
    }else{
      k = n;
    }
  }
  return false;
}