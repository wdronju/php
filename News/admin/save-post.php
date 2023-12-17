<?php
include("config.php");

// Upload file 

if(isset($_FILES['image'])){
$errors = array();

$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$file_tmp_name = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
// $file_ext = strtolower(end(explode('.',$fileName)));
// $extensions = array("jpeg","jpg","png");



// if(in_array($file_ext,$extensions)==false){
//      $errors[] = "This Extension is not Allowed, Please Chose a JPG or JPEG or PNG file";
// }


$allowedExtensions = array("jpeg", "jpg", "png");

// Get the file extension
$fileParts = explode('.', $fileName);
$file_ext = strtolower(end($fileParts));

// Check if the file extension is allowed
if (!in_array($file_ext, $allowedExtensions)) {
    $errors[] = "This extension is not allowed. Please choose a JPG, JPEG, or PNG file.";
}


if($fileSize > 2097152){
      $errors[] = "File Size must be 2mb or  less";
}

if(empty($errors)){
    move_uploaded_file($file_tmp_name,"upload/".$fileName);
}else{
   echo print_r($errors);
    die();
}

}

session_start();
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$categoriy = mysqli_real_escape_string($conn, $_POST['categoriy']);
$date = date("d M, Y");
$author = $_SESSION['user_id'];


$sql = "INSERT INTO `post`
(`title`, `description`, `category`, `post_date`, `author`, `post_img`) 
VALUES ('$title','$description','$categoriy','$date',$author,'$fileName');";

$sql .="UPDATE category SET post = post + 1 WHERE category_id = $categoriy";

if(mysqli_multi_query($conn,$sql)){
    
    header("location: {$hostname}/admin/post.php");
}





// image 




?>