var express = require('express');
var http = require('http');
var app = express();
app.get('/index.html',function (req, res) {
    res.send('Nihao');
});
app.listen(1337, "127.0.0.1");
