var http=require('http');
var fs=require('fs');
var url=require('url');

http.createServer(function(req,res){
	var urlstr=url.parse(req.url).pathname;
	//console.log(urlstr);
	switch(urlstr){
		case '/parse':
			getIndex(res,req);
			break;
		default : 
			res.writeHead(404,{'Content-type':'text/plain'});
			res.end('not found page');
	}
	//index.html路径
	//console.log(url.parse('index.html'));
	/*
	var pathname=__dirname+'/module/'+url.parse('index.html').pathname;
	//console.log(pathname);
	//console.log(__dirname);
	//先要把index.html读入内存
	var indexPage=fs.readFileSync(pathname);
	//console.log(indexPage);
	res.writeHead(200,{'Content-type':'text/html'});
	res.end(indexPage);*/


}).listen(3000);

function getIndex(res,req){
	var pathname=__dirname+'/module/'+url.parse('index.html').pathname;
	var indexPage=fs.readFileSync(pathname);
	res.writeHead(200,{'Content-type':'text/html'});
	res.end(indexPage);
}


console.log("server start port 3000");