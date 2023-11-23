<?php

include("connect.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id=$id";
    $query = mysqli_query($conn,$sql);
    if($query==true){
        header('Location: index.php'); // Corrected the syntax of header function
    exit(); // Ensure that the script stops after redirecting
    }
}