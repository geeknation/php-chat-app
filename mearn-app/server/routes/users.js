var express = require('express');
var router = express.Router();
var router = express.Router();
var DB = require("../db/conn.js");
DB.connect("revisor");
var User = require("../db/models/Users");

/* GET users listing. */
router.get('/', function(req, res, next) {
  
});

module.exports = router;
 // newUser = new User({
  //    uid: "26567SDLEUW79",
  //   first_name: "Ian",
  //   last_name: "Mukunya",
  //   email_address:"ianmukunya@gmail.com",
  //   auth:"Oppositeihub14#",
  //   msisdn:"0711824120",
  //   role:"Admin",
  //   status:"active"
  // });

  // newUser.save(function(err){
  //   if(!err){
  //     console.log("inserted");
  //   }else{
  //     console.log(err);
  //   }
  // });