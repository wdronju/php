<?php
$hostname ="localhost";
$username = "root";
$pass = "";
$db ='studentdb';

$conn = new mysqli($hostname,$username,$pass,$db);
if($conn->connect_error){
    echo $conn->connect_error;
}

$sql ="CREATE TABLE student (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR (30), 
    email VARCHAR (30), 
    phone VARCHAR (30))";

if($conn->query($sql)==true){
    echo "Table Created";
}else{
    echo $conn->connect_error;
}
$conn->close();