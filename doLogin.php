<?php 
session_start();

include "dbFunction.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];



$msg = "";
$userid = "";

$queryCheck = "SELECT * FROM user
          WHERE username='$entered_username'
          AND password = SHA('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['userid'];

    header("location: sugarMonitoring.php");
    
} else 
{
    $msg .= "<p>Sorry, you must enter a valid username and password to log in</p>";
    $msg .= "<p>You may choose to go back to the registration page to create a new account or login again using the 'Login' button located on the top right corner of the page. </p><br/>";
    $msg .= "<p><a href='index.php'>Click here to return to the registration page</a><p>";
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <title>doLogin</title>
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
        <?php
        echo $msg;
        ?>
    </body>
</html>