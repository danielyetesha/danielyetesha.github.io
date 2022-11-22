<?php

$server_name="localhost";
$username="root";
$password="";
$db_name="gondar_cinema";        

$connection = mysqli_connect($server_name, $username,$password,$db_name);

if(!$connection){
    die("database connection failed: " . mysqli_connect_error());
}

?>
