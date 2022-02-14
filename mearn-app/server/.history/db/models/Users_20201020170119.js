var DB = require("../conn.js");
var userSchema = DB.mongoose.Schema({
    uid:String,
    first_name:String,
    last_name:String,
    email_address:String,
    auth:String,
    msisdn:String,
    role:String,
    status:String
})

let users = DB.mongoose.model("users",userSchema);

module.exports = users;