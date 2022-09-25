<?php
session_start();
$id = $_SESSION['userid'];

include "dbFunction.php"; 

// SQL query returns multiple database records.
$query = "SELECT * FROM sugarreading WHERE userID=$id"; 
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $readings[] = $row;
}
mysqli_close($link);

echo json_encode($readings);
?>