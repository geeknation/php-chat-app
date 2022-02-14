var express = require('express');
var router = express.Router();
var DB = require("../db/conn.js");


/* GET home page. */
router.get('/', function(req, res, next) {
    req.session.destroy((err) => {
     
        if(err) {
          console.log("error ending session, try again later");
        }else{
            // res.redirect('/app');
            req.session=null;
            console.log("logged out");
        }
        
      });
});

module.exports = router;
