<?php  
include("config.php");


if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}


$userid = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id= $userid";
if(mysqli_query($conn, $sql)){
    header("location: $hostname/admin/user.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);


