var express = require('express');
var router = express.Router();
var user=require('../controllers/user.js');
/* GET home page. */
// router.get('/', function(req, res, next) {
//   res.render('index', { title: 'Express' });
// });
router.get('/',user.index);
router.get('/login',user.login);
router.post('/login',user.dologin);
router.get('/user/:name',user.writename);
router.get('/reg',user.reg);
router.post('/reg',user.doreg);
module.exports = router;
