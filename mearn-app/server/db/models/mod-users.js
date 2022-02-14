
const mongoose = require('mongoose')
const Schema = mongoose.Schema;

let userSchema = new Schema({
   name: String,
   description: String,
   price: Number,
   quantity: Number,

})

let User = mongoose.model('User', userSchema)

module.exports = User;