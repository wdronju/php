<?php
$hostname ="localhost";
$username = "root";
$pass = "";
$db ='studentdb';

$conn = new mysqli($hostname,$username,$pass,$db);
if($conn->connect_error){
    echo $conn->connect_error;
}

$sql = "INSERT INTO student (name, email,phone) VALUES('Rakib islam','ronju@gmail.com','8347653883')";

if($conn->query($sql)==true){
    echo "DATA Inserted";
}else{
    echo $conn->connect_error;
};


$conn->close();