var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");

router.post("/",function(req,res){

    let user= req.body.user;
    let pass = req.body.pass;0000
    console.log(user);
    db = DB();
    db.connect();
    db.checkConnection();
    //fetch the user from the database

    // res.send("")
})
module.exports = router;