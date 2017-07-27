var http=require('http');
var url=require('url');
var querystring=require('querystring');

http.createServer(function(req,res){
	var objpath=url.parse(req.url).query;
	var obj=querystring.parse(objpath);
	console.log(obj);
	//console.log(objpath);
	/*
	var patharr=objpath.split('&');
	//console.log(patharr);
	var arr=[];
	for(var j=0;j<patharr.length;j++){
		var arrtwo=patharr[j].split('=');
		//console.log(arrtwo);
		var key=arrtwo[0];
		var value=arrtwo[1];
		arr[key]=value;
		
	}

	console.log(arr);*/
}).listen(3000);

console.log("server start port 3000");

/*
form method="post"


server
1：开辟buffer
2：接收数据 （监听标志位） 段数据+段数据 === 整个数据
3：关闭接收数据 （监听标志位）*/

