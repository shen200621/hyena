var mysql = require('mysql');
var connection = mysql.createConnection({
	host	:	'localhost',
	prot	:	3306,
	database:	'mysql',
	user	:	'root',
	password:	'',
	debug	:    true,
});

connection.connect(function(err){
	if(err) console.log('与mysql数据库建立连接失败');
	else{
		console.log('与mysql数据库建立连接成功');
		connection.end(function(err){
			if(err) console.log('关闭mysql数据库操作失败');
			else{
				console.log('关闭mysql数据库操作成功');
			}
		});
	}
});
