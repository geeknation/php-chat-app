var express = require('express');
const session = require('express-session');
const FileStore = require('session-file-store')(session);
const jwt = require('jsonwebtoken');
var person = {};
var resp = {};
var router = express.Router();
var P = require("../lib/Person");
var DB = require("../db/conn.js");
DB.connect("revisor");
var sess = '';

var User = require("../db/models/Users");


router.post("/",function(req,res){
    let userPerson = new P();

    let username= req.body.user;
    let pass = req.body.pass;
    var secret = "appSecret";
    
    
    //fetch the user from the database
    User.find({
    email_address: username,
    auth: pass
    }).select('email_address uid msisdn').exec(function(err,user){
        if(err){
            console.log(err);
            res.render(JSON.stringify(err));
            res.send(JSON.stringify(err));
        }else{
            if(user!==null || user!==""){
                person = (user[0]);
                //save the session in file on server :TODO
                //user available    
                sess = req.session; 
                // assign the token after verification
                email = person.email_address;
                
                secret = person.uid;
                const payload = {email};
                const token = jwt.sign(payload, secret, {
                    expiresIn: '24h'
                });
                
                req.session.sessionID = token;
                req.session.secret = secret;
                resp = {
                    user:email,
                    tk:token,
                    auth:true
                }
                
                res.send(resp);
                
            }else{
                resp = {
                    message:"Invalid login",
                    auth:false
                }
                console.log(req.session.sessionID);
                res.send(resp);
            }
        }
    });
    
    //.limit(10).
    //sort({ occupation: -1 });

    
   
    // res.send("")
})
module.exports = router;

/**
 * 
 * Person.
  find({
    occupation: /host/,
    'name.last': 'Ghost',
    age: { $gt: 17, $lt: 66 },
    likes: { $in: ['vaporizing', 'talking'] }
  }).
  limit(10).
  sort({ occupation: -1 }).
  select({ name: 1, occupation: 1 }).
  exec(callback);

 */

//:TODO
/**
 * Verify user already logged in from the database
 */