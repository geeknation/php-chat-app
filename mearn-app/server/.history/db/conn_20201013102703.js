const MongoClient = require('mongodb').MongoClient;
const assert = require('assert');
// Connection URL


var DB = {
    connection:'',
    connect:function(dbname){
        var username='';
        var password='';
        var host='';
        const mongoose = require('mongoose');
        const url = 'mongodb://localhost@'+host+'/'+dbname;
        //const url = 'mongodb://'+username+':'+password+'@'+host+':'+port+'/'+dbname;
        
        mongoose.connect(url,{ useNewUrlParser: true });
        
        this.connection=mongoose.connection;
        
        //const url = 'mongodb://'+username+':'+password+'@'+host+'/'+dbname;
        

        // Use connect method to connect to the Server
    //    this.connection = MongoClient.connect(url, function(err, client) {
        
    //     assert.equal(null, err);
    //     client.close();
    //     });
        
    },

    checkConnection:function(){
        this.connection.once('open', function(){
            console.log( 'we are connected!');
        });
    },
    checkDBErrors:function(){
        this.connection.on('error', console.error.bind(console, 'connection error:'));
    }
    


};


module.exports = DB;









/**
 * to be used for connection without using mongoose.
 * connect:function(username,password,host,dbname){
        const url = 'mongodb://'+username+':'+password+'@'+host+'/'+dbname;

        // Use connect method to connect to the Server
       this.connection = MongoClient.connect(url, function(err, client) {
        assert.equal(null, err);
        client.close();
        });
        
    },

    checkConnection:function(){
        this.connection.once('open', ()=>{

            console.log('Database connected successfully')
         
         });
    },
    checkDBErrors:function(){
        this.connection.on('error', (error)=>{
            console.log(error);
         });
    }
 */