var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var cors = require('cors');

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var loginRouter = require('./routes/login');
var logoutRouter = require('./routes/logout');

const jwt = require('jsonwebtoken');
var secret = "appSecret"; //use the user password instead

const session = require('express-session')
let FileStore = require('session-file-store')(session);
const uuid = require('uuid')

let verifyAuth = require("./routes/verifyAuth");

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(session({
    genid: (req) => {
      return uuid.v4();
    },
    path:"./sessions",
    reapInterval: 1 * 24 * 60 *60, //daysToLive * 24 * 60 * 60 (days in seconds)
    store: new FileStore(),
    secret: secret,  //preferrably use the encrypted password as the secret
    resave: false,
    saveUninitialized: false
  }))
  
  
  
app.use(cors());
app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/users', verifyAuth,usersRouter);
app.use('/login',loginRouter);
app.use('/logout',logoutRouter);

//catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
