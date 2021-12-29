<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "phpChatroom";

// creating the database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check the connection
if(!$conn){
    die("Failed to connect ". mysqli_connect_error());
}

?>