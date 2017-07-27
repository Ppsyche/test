/*
module.exports exports
Controller->Model 
$this->load->model('user_model');
$result=$this->user_model->getAll();

public function getAll(){
	$query=$this->db->get('user'); -->同步函数
	return $query->result();
}

//oDIv.click(function(){})

fs.readFile('file.txt','utf-8',function(err,data,callback){
	settimeout(function(){
		callback
	},5000);
})
var data=fs.readFileSync('file.txt','utf-8');
console.log(data);
console.log('end');


AModel.getAll(function(){

})
exports.getAll=function(callback){
	$sql="selelc * from user";
	$query=xx(function(){
		callback
	}) --->异步函数
	return $query;
}*/

/*
I am answering other questions
I am thinking ~~~~~
think 5 seconds got answer */
function person(){
	this.think=function(callback){
		console.log('thinking ~~~~');
		setTimeout(function(){
			
			callback();
		},5000);
	};
	this.answer=function(){
		console.log("I am answering other questions");
	}
}

var person=new person();
person.think(function(){
	console.log("think 5 seconds got answer");
});

person.answer();
