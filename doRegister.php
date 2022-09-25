<?php
// php file that contains the common database connection code
include "dbFunction.php";

$username = $_POST['username'];
$password = $_POST['password'];
$height = $_POST['height'];
$weight = $_POST['weight'];


$check = "SELECT * FROM user WHERE username = '$username'";

$checkuser = mysqli_query($link, $check);

if (mysqli_num_rows($checkuser) == 0) {
$query = "INSERT INTO user
          (username,password,height,weight) 
          VALUES 
          ('$username',SHA1('$password'),'$height','$weight')";

$status = mysqli_query($link, $query);

if ($status) {
    $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='index.php'>login</a>.</p>";
}
else {
    $message = "account creation failed";
} } else {
    $message = "the username $username already exists";
}


mysqli_close($link);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>doRegister page</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Get Together - Register</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>