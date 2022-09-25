<!DOCTYPE html>
<!--
Allows user to login or register. You can choose to have a separate registration page.
This page is deliberately left blank.

-->

<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <title></title>
        <style>
            
            div.text-center {
                border: 3px solid;
                height: 550px;
                width: 380px;
                margin-left: auto;
                margin-right: auto;
                border-radius: 25px;
            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-light" style="background-color: #f3ca20;">
            <a class="navbar-brand">
              <img src="images/device.jpg" width="30" height="30" class="align-top" alt="">
              Sugar Monitoring App
  
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
                <b>Login</b>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <form method="post" class="form-inline" action="doLogin.php">
                        
                       
                       <input type="text" id="idUsername" placeholder = "Username" name="username"/>&nbsp;&nbsp;
                       <input type="password" id="idPassword" placeholder = "Password" name="password"/>&nbsp;
                       
	
                       <input type="submit" value="Login" name="submit"/>
                       <br/><br/>
            </form>
                
            </div>
          
        </nav>
        <br/><br/>
        
        <div class="text-center">

        <form method="post" action="doRegister.php">
            <br/>
            <h3>New to the app?</h3><br/>
            
            <img src="images/register.jpg" width="250" height="150" alt=""><br/><br/>
            
            <b>Register here!</b><br/><br/>
            <label>Username:</label>
            <input type="text" name="username" placeholder="Username"/><br/>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Password"/><br/>

            <label>Height:</label>
            <input type="text" name="height" placeholder="Height in cm"/><br/>

            <label>Weight:</label>
            <input type="text" name="weight" placeholder="Weight in kg"/><br/>

            <br/><input type="submit" value="Sign Up" name="submit"/><br/>
            
        </form> 

        </div>
        <br/>
    </body>
</html>
