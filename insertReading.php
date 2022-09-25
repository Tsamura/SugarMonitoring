<?php
/*
This page is to used to insert sugar reading into the table sugarreading (mySQL)
This page is deliberately left blank.
*/ 
session_start();
include "dbFunction.php";


$message = "";

date_default_timezone_set("Asia/Singapore");
$date = date('y-m-d'); // Retreive the current date of user's entry

//Retrieve user's readingTimes and readinglevel
$readingTimes = $_POST['readingTimes'];
$readingLvl = $_POST['readingLvl'];
$userid = $_SESSION['userid'];


//Write insert SQL statement to database
$sql = "INSERT INTO sugarreading (userID,readingDate,readingTimes,readingLvl) 
            VALUES ($userid,'$date','$readingTimes',$readingLvl)";

//Execute SQL statement 
$status = mysqli_query($link, $sql) or die(mysqli_error($link));


//Check if record is inserted into database or not
if ($status) {
    $message = "Record inserted successfully.";
} else {
    $message = "Record not inserted.";
}

//Close db
mysqli_close($link);

header("location: sugarMonitoring.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
        <?php echo $message; ?>
        </div>
    </body>
</html>


