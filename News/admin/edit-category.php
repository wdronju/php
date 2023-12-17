<?php
 include("header.php");
 include("config.php");

if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}

if (isset($_POST['UpdateCategory'])) {
   
    $id = $_POST['cID'];   
    $cName = $_POST['cName'];  
    
    // Check if the category name already exists
    $checkQuery = "SELECT * FROM `category` WHERE `category_name` = '$cName' AND `category_id` != '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Category name already exists
        echo "<script>alert('Category name already exists. Please choose a different name.');</script>";
    } else {
        // Update the category name
        $updateQuery = "UPDATE `category` SET `category_name`='$cName' WHERE category_id='$id'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Category Updated Successfully');</script>";
            echo "<script>window.location.href = '$hostname/admin/category.php';</script>";
            exit(); // Make sure to exit to prevent further execution of PHP code
        } else {
            echo "<script>alert('Error updating category');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Category</title>
</head>

<body>


    <div class="adduser-container">
        <h2>Edit Category</h2>
        <form id="addUserForm" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <?php  
                include("config.php");
                $getId = $_GET['id'];
                $Select_qury = "SELECT * FROM category WHERE category_id =$getId";
                $result_select = mysqli_query($conn, $Select_qury) or die("Query failed");
                $row = mysqli_fetch_assoc($result_select);
                
                ?>
                <label for="cName">Category Name:</label>
                <input type="text" id="cName" name="cName" value="<?php echo $row['category_name']; ?>" required>
                <!-- <input type="text" id="cID" name="cID" hidden> -->
                <input type="number" hidden id="cID" name="cID" value="<?php echo $row['category_id']; ?>" >

            </div>

            <div class="form-group">
                <button type="submit" name="UpdateCategory">Update Category</button>
            </div>
        </form>
    </div>

</body>

</html>