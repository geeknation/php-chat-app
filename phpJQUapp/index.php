<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container-fluid">

    </div>

    <script>
        $(document).ready(function (){
            
            $.ajax({
                url: "",
                type: "GET",
                data: {
                    "key": "value"
                },
                dataType: "json",
                timeout: 10000,
                beforeSend: function() {
                
                },
                success: function(data) {
                
                },
                error: function(err) {
                    
                },
                complete: function(r) {
                    //fires before success
                    //close dialog 
                    console.log(r);
                }
            });

        });
    </script>
</body>
</html>