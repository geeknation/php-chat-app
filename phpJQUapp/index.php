<?php
// echo __DIR__;

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
    <script src="//cdn.jsdelivr.net/npm/pouchdb@7.2.1/dist/pouchdb.min.js"></script>
    <style>
        #server-status-log{
            background-color: beige;
            border:solid thin #fcfcfc;
            width: inherit;
        }
    </style>
</head>
<body>
    
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">PHP CHAT APP</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col card">    
                    <div class="card-body">
                        <h4 class="card-title">Status:</h4>
                        <div class="" id="server-status-log">
                         
                          <textarea class="form-control" name=""  rows="3"></textarea>
                        </div>
                        <hr/>
                        <form class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col-12">
                                <div class="input-group">
                                    <input name="" id="" class="btn btn-success" type="button" value="Start Server">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-group">
                                    <input name="" id="" class="btn btn-danger" type="button" value="Stop Server">
                                </div>
                            </div>

                            <!-- <div class="col-12">
                                <div class="input-group">
                                    <input name="" id="" class="btn btn-primary" type="button" value="Start Server">
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/chat.js"></script>
    <script src="js/main.js"></script>
</body>
</html>