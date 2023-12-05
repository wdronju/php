


<?php
include("connect.php");
$sid = $_POST['id'];
$studentName = $_POST['name']; 
$studentAddress = $_POST['address'];
$studentClass = $_POST['class'];
$studentPhone = $_POST['phone'];

$sql = "UPDATE students SET name ='$studentName', address ='$studentAddress', class ='$studentClass', phone ='$studentPhone' WHERE id = '$sid'";

$query = mysqli_query($conn, $sql) or die("insert failed");

if ($query == true) {
    header("location: http://localhost/php/crud7/index.php");
    exit(); // Add exit() to stop further execution
} else {
    echo "Error: " . mysqli_error($conn); // Display the error for debugging
}
?>
