var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");
DB.connect();
var User = require("../db/models/Users");
router.post("/",function(req,res){
    
    let username= req.body.user;
    let pass = req.body.pass;
 
    //fetch the user from the database
    User
    .find({
    email_address: req.body.user,
    }).
    //limit(10).
    //sort({ occupation: -1 }).
    //select('email_address').
    exec(function(err,user){
    
    if(err){
        console.log(err);
        res.render(JSON.stringify(err));
    }else{
        console.log(user);
    }
    });

    
    var newUser = new User({
        uid: "234jdrg",
        first_name:"Ian",
        last_name:"Kanyari",
        email_address:"iankanyari@gmail.com",
        auth:"pass",
        msisdn:"0720121341",
        role:"o",
        status:"o",
    })

    newUser.save(function(err,newUser){
        console.log(newUser);
    })
    

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