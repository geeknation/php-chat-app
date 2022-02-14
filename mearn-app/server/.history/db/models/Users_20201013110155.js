var DB = require("../conn.js");
DB.connect().checkConnection();

var UserSchema = DB.mongoose.Schema({
    uid: String,
    first_name:String,
    last_name:String,
    email_address:String,
    auth:String,
    msisdn:String,
    role:String,
    status:String,
})