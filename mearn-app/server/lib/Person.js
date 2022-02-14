var express = require('express');
const mongoose = require('mongoose');
var DB = require("../db/conn.js");

var User = require("../db/models/Users");

function Person(){
    this.getUserById=function(id){
      
        User.findOne({uid: id}, function(err, user) {
            if (err || !user) {
              return done(err, false);
            }
            if (user) {
               return done(null, user);
            }
        });
    }
    this.login=function(username,password){
        
    }
    
};
module.exports= Person;