<?php
$hostname ="localhost";
$username = "root";
$pass = "";
$db ='studentdb';

$conn = new mysqli($hostname,$username,$pass,$db);
if($conn->connect_error){
    echo $conn->connect_error;
}
   $sql= "CREATE DATABASE studentDB";

   if($conn->query($sql)){
    echo "DB Created";
   }else{
    echo $conn->connect_error;
   }
$conn->close();