/*
var arr=['www.qq.com','www.baidu.com','www.sohu.com'];

(1)nodejs如何把域名转换成IP
(2)写一个异步方式处理*/

var dns=require('dns');

dns.resolve('www.qq.com','A',function(err,address){
	console.log(address);
});

/*
var a=dns.resolve4('www.qq.com',function(err,address){
	if(err){
		console.log(err);
	}else{
		console.log(address);
	}
});*/

//console.log('end');
//console.log(a);

/*
QueryReqWrap {
  bindingName: 'queryA',
  callback: { [Function: asyncCallback] immediately: true },
  hostname: 'www.qq.com',
  oncomplete: [Function: onresolve] }*/
