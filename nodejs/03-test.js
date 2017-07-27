var http=require('http');
urls=['www.qq.com','www.sohu.com','www.baidu.com'];

function fetchPage(url){
	var start=new Date;
	http.get({host:url},function(res){
		console.log("got resppone url: "+url);
		console.log('took time ',new Date()-start,' ms');
	});
}

for(var i=0;i<urls.length;i++){
	fetchPage(urls[i]);
}

/*
Vue  axios('http://localhost:80')
     nodejs request( http://192.89.0.7/user/index)
     	http.get
     php    http://192.89.0.7/user/index*/