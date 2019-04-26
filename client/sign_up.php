<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="http://localhost/123/client/style/sign_up.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- UnderScore by CDN js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <!-- JQuery by Microsoft CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
                <p>You should check in on some of those fields below.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="header">
        </div>
        <div class="bod">
            <div class="log">Create File Transfer Account</div>
            

            <div class="input-data">
                <p>Enter login or email</p>
                <input type="text" class="form-control login" placeholder="Username" id="formId">
            </div>
            <div class="input-data">
                <p>Password</p>
                <input type="password" class="form-control pass1" placeholder="Password" id="formId">
            </div>
            <div class="input-data">
                <p>Repeat password</p>
                <input type="password" class="form-control pass2" placeholder="Password" id="formId">
            </div>
            <div class="input-data">
                <button type="button" class="btn btn-success" id="myBtnStyle">Create New Account</button>
            </div>

            <div class="input-data">
                <p>By creating an account, you agree to our Terms of Service 
                and <a id="private">Privacy Policy</a>.</p>
            </div>
            
            
        </div>
        <div class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl"></div>
                    <div class="col-xl-6 textBlock">
                        <p>© Copyright 2019. All rights reserved.</p>
                    </div>
                    <div class="col-xl">
                        <div class="row images-block justify-content-center">
                            <div class="col-xl-3 col-lg-1 col-2 .col-md-1 	.col-sm-1">
                                <img src="http://localhost/123/client/style/accets/user/vk.png">
                            </div>
                            <div class="col-xl-3 col-lg-1 col-2 .col-md-1 	.col-sm-1">
                                <img src="http://localhost/123/client/style/accets/user/tvit.jpg">
                            </div>
                            <div class="col-xl-3 col-lg-1 col-2 .col-md-1 	.col-sm-1">
                                <img src="http://localhost/123/client/style/accets/user/inst.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <script src="http://localhost/123/client/script/sign_up.js"></script>
</body>
</html>