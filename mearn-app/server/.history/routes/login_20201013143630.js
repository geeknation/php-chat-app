var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");
var Users = require("../db/models/Users");

router.post("/",function(req,res){
    
    let user= req.body.user;
    let pass = req.body.pass;
    console.log(user);
    db = DB;
    // db.connect("revisor");
    // db.checkConnection();


    //fetch the user from the database
    Users.findOne({"email_address":user},"",function(err,user){
        if(err){
            console.log(err);
            res.render(JSON.stringify(err));
        }else{
            console.log(user);
        }
    });
    
    process.on('SIGINT', function() {
        db.mongoose.connection.close(function () {
          console.log('Mongoose disconnected on app termination');
          process.exit(0);
        });
    });

    // res.send("")
})
module.exports = router;