<?php
    $dbuser = "root";
    $dbpass = "12345";
    $dbname = "secure_coding";
    $host = "localhost";
    //error_reporting(0);
    //$connection = mysqli_connect() or die("Connection Failed: ".mysqli_connect_errno());
    $mysqli = new mysqli($host, $dbuser, $dbpass, $dbname) or die("Connection Failed: ".mysqli_connect_errno());

?>