var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");
var Users = require("../db/models/Users");

router.post("/",function(req,res){
    
    let username= req.body.user;
    let pass = req.body.pass;
    console.log(req.body);
    db = DB;
    // db.connect("revisor");
    // db.checkConnection();


    //fetch the user from the database
    Users.findOne({"users.email_address":username},"",function(err,user){
        
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