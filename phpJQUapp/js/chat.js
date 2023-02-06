
window.onload=function name(w) {
    var DB = new PouchDB('rachet_chat_app');
    // DB.info().then(function(R){
        // console.log(R);
    // });
    
    var chatConn = new WebSocket('ws://localhost:8080/chat');   
    chatConn.onmessage = function(e) { 
        var response = JSON.parse(e.data); 
        $("#server-status-log").html(response.responseMessage);
    };
    chatConn.onopen = function(e) { 
        
    };    
}

