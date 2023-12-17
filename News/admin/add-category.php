<?php
include("header.php");


if (isset($_POST['addCategory'])) {
    include("config.php");
    $cName = mysqli_real_escape_string($conn, $_POST['cName']);

    $sql = "SELECT category_name  FROM category WHERE category_name = '$cName'";
    $result = mysqli_query($conn, $sql) or die("Query failed");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Category already exists');</script>";
    } else {
        $sql1 = "INSERT INTO category (category_name) VALUES ('$cName')";
        if (mysqli_query($conn, $sql1)) {
            echo "<script>alert('Category Added Success');</script> " . header("location: $hostname/admin/category.php");
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
    <title>Add New Category</title>
</head>

<body>


    <div class="adduser-container">
        <h2>Add Category</h2>
        <form id="addUserForm" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="cName">Category Name:</label>
                <input type="text" id="cName" name="cName" required>
            </div>

            <div class="form-group">
                <button type="submit" name="addCategory">Add Category</button>
            </div>
        </form>
    </div>

</body>

</html>