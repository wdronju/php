



<?php
include("connect.php");

$sid = $_GET['id'];

$sql = "DELETE FROM students WHERE id = $sid";

$query = mysqli_query($conn, $sql) or die("Delete failed");

if ($query == true) {
    header("location: http://localhost/php/crud7/index.php");
    exit(); // Add exit() to stop further execution
} else {
    echo "Error: " . mysqli_error($conn); // Display the error for debugging
}
?>
