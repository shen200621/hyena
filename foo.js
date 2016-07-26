var _name,_age;
var name='',age=0;

var foo=function(name,age){
	_name=name;
	_age=age;
}
foo.prototype.GetName=function(){
	return _name;
}

foo.prototype.GetAge=function(){
	return _age;
}
foo.prototype.SetName=function(){
	_name=name;
}
foo.prototype.SetAge=function(){
	_age=age;
}
foo.prototype.name=name;
foo.prototype.age=age;
module.exports=foo;