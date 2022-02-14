const jwt = require('jsonwebtoken');
var P = require("../lib/Person");

const verifyAuth = function(req, res, next) {
  console.log(req.session);
let userPerson = new P();
  console.log(req.session.sessionID);
  const token = req.session.sessionID;
  //   req.body.token ||
  //   req.query.token ||
  //   req.headers['x-access-token'] || //use this for the from 
  //   req.cookies.token;
    
  const secret = req.session.secret;
  console.log(JSON.stringify(token)+" " + secret);
  if (!token) {
    res.status(401).send("no token provided");
  } else {
    jwt.verify(token, secret, function(err, decoded) {
        if (err) {
        res.status(401).send('Unauthorized: Invalid token');
        } else {
        next();
        }
    });
  }
  
}
module.exports = verifyAuth;










