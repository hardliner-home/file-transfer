<?php
    // 
    
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Необходимые Мета-теги всегда на первом месте -->  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/123/client/style/main.css">
    <link rel="stylesheet" href="http://localhost/123/client/style/modal.css">
  </head>
  <body id="myBod">

  <?php
        // echo "<p class='login'>$login</p><a class='logA' href='../../server/data/logout.php'>logout</a>";
    ?>


    <div class="modal fade" id="modal">
      <div class="modal-mySize">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <p class="modal-title">Register</p>
          </div>
          <div class="modal-body">
            <p id="first-p">Join to us and make your life <br>better</p>
            <div class="input">
              <p>Login</p>
              <input type="text" class="form-control" placeholder="Email or lorgin" id="loginIn">
            </div>
            <div class="input">
              <p>Password</p>
              <input type="password" class="form-control" placeholder="Enter your password" id="passwordIn">
            </div>
            <div class="input">
              <input type="checkbox" id="check">
              <p>Accept rules and terms</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" id="acceptButton">Login</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.модальное окно-Содержание -->  
        </div>
      </div><!-- /.модальное окно-диалог -->  
    </div>

      <div class="head">
          <div class="footer container-fluid">
            <div class="navbar">
              <div class="navbar-brand">FILE TRANSFER</div>
              <div class="buttons pull-xl-right">
                  <!-- <p class="userName"></p> -->
                  <button type="button" class="btn  btn-outline-secondary" id="logout">ABOUT US</button>
                  <button type="button" class="btn btn-outline-secondary" id="login">LOGIN</button>
              </div>
            </div>
            </div>
            <div class="head-body">
                <p>FILE TRANSFER</p>
                <div class="polos"></div>
                <p>Great storage solutions for your information! <br>
                Sign up now!</p>
                <button type="button" class="btn btn-warning" id="registration">REGISTRATION</button>
            </div>
          </div>
        </div>
      </div>

        <div class="box-1">
          <p>Secure access and collaboration!</p>
          <div class="polos-2"></div>
          <p>
              Storage and secure data access - Dropbox Business accounts are trusted by system administrators and are popular with users.
              You will be able to control who uses which files and folders and provide secure access to the desired level.
          </p>
          <button type="button" class="btn btn-secondary">START!</button>
        </div>
    
        <div class="box-2">
          <p>Opportunities</p>
          <div class="polos-3"></div>
          <div class="images">
          <div class="image-text">
            <img src="http://localhost/123/client/style/accets/dowland.png">
            <p>File upload</p>
          </div>
          <div class="image-text">
            <img src="http://localhost/123/client/style/accets/upload.png">
            <p>Download files</p> 
          </div>
          </div>
        </div>

        <div class="box-3">
          <!-- <div class="container-fluid">
            <div class="row box-3-row">
              <div class="col-xl-4 box-3-col col-lg-4 col-12">
                <img class="box-3-img">
              </div>
              <div class="col-xl-4 box-3-col col-lg-4 col-12">
                 <img class="box-3-img">
              </div>
              <div class="col-xl-4 box-3-col col-lg-4 col-12">
                 <img class="box-3-img">
              </div>
            </div>
          </div> -->
        </div>

        <div class="box-4">
          <p>Let's Get In Touch!</p>
          <div class="polos-4"></div>
          <p>Ready to start your next project with us? That's great! Give us a call
            or send us email and will get back to you as soon as possible!
          </p>
          <div class="connect-box">
          <div class="connect-images">
            <img src="http://localhost/123/client/style/accets/call.png" alt="">
              <p></p>
          </div>
          <div class="connect-images">
            <img src="http://localhost/123/client/style/accets/email.png" alt="">
              <p></p>
          </div>
        </div>
        </div>

    <!-- jQuery первый, затем Tether, затем Bootstrap JS. -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    <script src="http://localhost/123/client/script/main.js"></script>  
  </body>
</html>