var foo=require('./foo.js');
var myFoo=new foo("Tom",40);
console.log("获取修改前的私有变量值");
console.log(myFoo.GetName());
console.log(myFoo.GetAge());

console.log("修改私有变量值");
myFoo.SetName("BOB");
myFoo.SetAge(30);

console.log("修改后的私有变量");
console.log(myFoo.GetName());
console.log(myFoo.GetAge());

console.log("获取修改前的共有变量");
console.log(myFoo.name);
console.log(myFoo.age);

console.log('修改共有变量');
myFoo.name="Bob";
myFoo.age=30;

console.log("获取修改后的公有变量");
console.log(myFoo.name);
console.log(myFoo.age);