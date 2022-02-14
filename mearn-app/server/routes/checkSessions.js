const jwt = require('jsonwebtoken');
const checkSession = function(req, res, next) {
  if(!req.session.sessionID || req.session.sessionID==null || req.session.sessionID==""){
    next();
  }else{  
    const token = req.session.sessionID;
    //   req.body.token ||
    //   req.query.token ||
    //   req.headers['x-access-token'] || //use this for the from 
    //   req.cookies.token;
      
    const secret = req.session.secret;
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
}
module.exports = checkSession;










