<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "sensores";


$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno){

    echo "Connected failed: " . $mysqli->connect_error;
    exit();
}

?>