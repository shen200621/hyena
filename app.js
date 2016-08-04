var http = require("http");
var domain = require('domain');

http.createServer(function(req,res){
	var d = domain.create();
	d.once('error',function(err){
		res.writeHead(200,{'Content-Type':'text/html'});
		res.write('<head><meta charset="utf-8"/></head>');
		res.write('接受客户端请求时发生以下错误');
		res.end(error.message);
	})

	d.run(function(){
		if(req.url !== "/favicon.ico"){
		noneexist();
		res.writeHead(200,{'Content-Type':'text/html'});
		res.write('<head><meta charset="utf-8"/></head>');
		res.end("你好\n");
		}
	})	
}).listen(1337,'127.0.0.1');
process.on('uncaughtException',function(err){
	console.log("接受客户端请求时发生以下错误");
	console.log(err)
});