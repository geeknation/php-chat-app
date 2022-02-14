var DB = require("../conn.js");
var DB = require("mongoose");
// DB.connect();
var userSchema = DB.Schema({
    uid: String,
    first_name:String,
    last_name:String,
    email_address:String,
    auth:String,
    msisdn:String,
    role:String,
    status:String,
})

let User = DB.mongoose.model("User",userSchema);

module.exports = User;