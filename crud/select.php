<?php
$hostname ="localhost";
$username = "root";
$pass = "";
$db ='studentdb';

$conn = new mysqli($hostname,$username,$pass,$db);
if($conn->connect_error){
    echo $conn->connect_error;
}

$sql ="SELECT * FROM student";

$result = $conn->query($sql);

if($result->num_rows > 0){
while($row = $result->fetch_assoc()){

echo "ID: ".$row['id']."<br> Name: ".$row['name']."<br> Email: ".$row['email']."<br>Phone".$row['phone']." <hr>";
}
}else{
    echo $conn->connect_error;
}

$conn->close();