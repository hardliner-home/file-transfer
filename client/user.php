<?php
    include_once("../server/session.php");

    if (session_pass($link)) {
        
    }
    else {
        header("Location: http://localhost/123/client/sign_in.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="http://localhost/123/client/style/user.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- UnderScore by CDN js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <!-- JQuery by Microsoft CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <title>File Transfer</title>
</head>
<body>
    <?php
        echo "<p class='login'>$login</p><a class='logA' href='http://localhost/123/server/logout.php'>logout</a>";
    ?>


    <form id="myForm" method="POST" enctype = "multipart/form-data">
        <input type="file" name="file" id="fileMenu" style="display : none" multiple = "multiple">
        <input tupe="submit" id="submitBut" style="display : none">
    </form>
    
    <div class="main">
        <div class="background-grad"></div>
        <div class="head">
            <div class="header container-fluid">
                <div class="navbar">
                    <div class="navbar-brand">FILE TRANSFER</div>
                    
                    <div class="buttons pull-xl-right">
                        <button type="button" class="btn btn-outline-secondary">ABOUT US</button>
                        <button type="button" class="btn btn-outline-secondary" id="logout">LOGOUT</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bod">
            <div class="filesBlock">
                <div class="poisk">
                    <input type="text" class="form-control" placeholder="File name" id="searchStr">
                    <button type="button" class="btn btn-outline-secondary" id="searchBtn">Search</button>
                </div>

                <div class="file-container">

                </div>
            </div>

            <div class="file-menu">
                <div class="user-block">
                    <img class="user-image" src="http://localhost/123/client/style/accets/user/defaultUser.png">
                    <p></p>
                </div>
                <button type="button" class="btn btn-outline-primary" id="uploadBtn">Upload</button>
                <button type="button" class="btn btn-outline-danger" id="delBtn">Delete</button>
                <button type="button" class="btn btn-outline-success" id="dowlandBtn">Dowland</button>
            </div>
        </div>

                <!-- <div class="footer">

                </div> -->

    </div>

    <script src="http://localhost/123/client/script/user.js"></script>
</body>
</html>