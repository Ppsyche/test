var user_model=require('../models/user_model.js');

exports.index=function(req,res,next){
	res.render('index', { title: 'laoshan' });
}

exports.login=function(req,res,next){
	res.render('login');
}

exports.writename=function(req,res,next){
	var nn=req.params.name;
	console.log(nn);
}

exports.dologin=function(req,res,next){
	var name=req.body.email;
	var pass=req.body.pwd;
	user_model.getNameByPass(name,pass,function(result){
		if(result.length>0){
			req.session
			res.redirect('/');
		}else{

		}
	});	
}

exports.reg=function(req,res,next){
	res.render('reg');
}

exports.doreg=function(req,res,next){
	var email=req.body.email;
	var name=req.body.name;
	var pass=req.body.pwd;

	user_model.insertUser(email,name,pass,function(result){
		// console.log(result);
		if(result.affectedRows>0){
			res.redirect('/login');
		}
	});
}