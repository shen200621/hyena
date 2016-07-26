var http = require("http");
var server = http.createServer();

server.on("request",function(req,res){
	console.log(req.url);
	res.end();
});

server.listen(1337,"127.0.0.1");