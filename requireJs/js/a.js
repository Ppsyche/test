define(['b'],function(isArray){
    function sortArray(arr){
        if(isArray(arr)){
            return arr.sort(function(a,b){
                return a-b;
            });
        }else{
            return '不是数组';
        }
    }
    return sortArray;
})





