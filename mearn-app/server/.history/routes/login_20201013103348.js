var express = require('express');
var router = express.Router();


router.post("/",function(req,res){
    var DB = require("../db/conn.js");
    let user= req.body.user;
    let pass = req.body.pass;
    console.log(user);
    db = DB();
    //db.connect("revisor");
    //db.checkConnection();
    //fetch the user from the database

    // res.send("")
})
module.exports = router;