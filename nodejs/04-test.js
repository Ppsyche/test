var http=require('http');


http.createServer(function(req,res){
	//res.writeHead(200,{'Content-type':'text/plain'});
	res.writeHead(200,{'Content-type':'text/html'});
	res.end('<h1>hello</h1>');
}).listen(3000);

console.log("server start port 3000");