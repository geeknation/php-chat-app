var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");
var Users = require("../db/models/Users");

router.post("/",function(req,res){
    
    let user= req.body.user;
    let pass = req.body.pass;
    console.log(user);
    db = DB;
    db.connect("revisor");
    db.checkConnection();


    //fetch the user from the database
    Users.findOne({"email":user},"",function(err,user){
        if(err){
            console.log(err);
        }else{
            console.log(user);
        }
    });
    
    db.connection.close();

    // res.send("")
})
module.exports = router;