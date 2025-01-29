<?php

$host='localhost';
$user='root';
$password=null;
$db='login_register';

$conn= new mysqli($host,$user,$password,$db);

if($conn->connect_error){
    die('connection failed'. $conn->connect_error);
}

?>