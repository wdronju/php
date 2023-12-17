<?php  
include("config.php");


if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}


$cId = $_GET['id'];

$sql = "DELETE FROM category WHERE category_id= $cId";
if(mysqli_query($conn, $sql)){
    header("location: $hostname/admin/category.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);




