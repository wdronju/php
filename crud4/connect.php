<?php
$conn = mysqli_connect('localhost','root','','users');
if(!$conn ==true){
    echo "not connected";
};