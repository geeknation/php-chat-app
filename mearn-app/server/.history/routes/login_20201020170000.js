var express = require('express');
var router = express.Router();
var Users = require("../db/models/Users");
var DB = require("../models/conn.js");
DB.connect();

router.post("/",function(req,res){
    
    let username= req.body.user;
    let pass = req.body.pass;
 
    //fetch the user from the database
    Users
    .find({
    'email_address': req.body.user,
    }).
    limit(10).
    //sort({ occupation: -1 }).
    select('email_address').
    exec(function(err,user){
    
    if(err){
        console.log(err);
        res.render(JSON.stringify(err));
    }else{
        console.log(user);
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