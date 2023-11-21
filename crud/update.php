<?php
$hostname ="localhost";
$username = "root";
$pass = "";
$db ='studentdb';

$conn = new mysqli($hostname,$username,$pass,$db);
if($conn->connect_error){
    echo $conn->connect_error;
}

$sql = "UPDATE student SET name='Faruk', email='raruk@gmail.com', phone='1717171717' WHERE id='3'";
if($conn->query($sql)==true){
echo "Data Updated";
}else{
    echo $conn->connect_error;
}

$conn->close();