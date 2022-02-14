var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");
DB.connect("revisor");
var User = require("../db/models/Users");
router.post("/",function(req,res){
    
    let username= req.body.user;
    let pass = req.body.pass;
 
    //fetch the user from the database
    User
    .find({
    email_address: username,
    auth: pass
    }).
    //limit(10).
    //sort({ occupation: -1 }).
    select('email_address uid msisdn').
    exec(function(err,user){
    if(err){
        console.log(err);
        res.render(JSON.stringify(err));
    }else{
        if(user){
            //save the session in file on server
            console.log(user)''
            res.send(JSON.stringify(user));
        }
    }
    });

    
   
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