


 <?php
include("connect.php");

$studentName = $_POST['name']; 
$studentAddress = $_POST['address'];
$studentClass = $_POST['class'];
$studentPhone = $_POST['phone'];

$sql = "INSERT INTO `students` (`name`, `address`, `class`, `phone`) VALUES ('$studentName', '$studentAddress', '$studentClass', '$studentPhone')";

$query = mysqli_query($conn, $sql) or die("insert failed");

if ($query == true) {
    header("location: http://localhost/php/crud7/index.php");
    exit(); // Add exit() to stop further execution
} else {
    echo "Error: " . mysqli_error($conn); // Display the error for debugging
}
?>
