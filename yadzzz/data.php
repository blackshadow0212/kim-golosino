<?php

$host = "localhost";
$dbname = "database";
$newemail = "root";
$newpassword = "";

$mysqli = new mysqli(hostname: $host,
                     username: $newemail,
                     password: $newpassword,
                     database: $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}
return $mysqli;
?>