<?php

/*
This page logs user out of the website. 

*/ 

session_start();
if (isset($_SESSION['username'])) {
    session_destroy();
    $_SESSION = array();
}
header("location: index.php");

?>
