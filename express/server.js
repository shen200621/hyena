var express = require('express');
var fs=require('fs')
var querystring=require('querystring')
var app=express();
var mysql=require('mysql')

var pool=mysql.createPool({
    host:'localhost',
    port:3306,
    database:'mysql',
    user:'root',
    password:'root',
});

app.get('/index.html',function(req,res){
    res.writeHead(200,{'Content-Type':'text/html'});
    res.write('<head><meta charset="utf-8"/><title>使用post方法向服务器端提交数据</title></head>');
    var file=fs.createReadStream('index.html');
    file.pipe(res);
});

app.post('/index.html',function(req,res){
    req.on('data',function(data){
        var obj=querystring.parse(data.toString());
        pool.getConnection(function(err,connection){
            if(err) res.send('于MYSQL数据库建立连接失败');
            else{
                var str;
                connection.query('insert into users set ?',{username:obj.username,firstname:obj.firstname},
                    function(err,result){
                        if(err)str='在服务器端mysql数据库中插入数据失败。';
                        else str='在服务器端mysql数据库中插入数据成功。';
                        connection.release();
                        res.send(str);
                    });
            }
        });
    });
});

app.listen(1337,"127.0.0.1");

