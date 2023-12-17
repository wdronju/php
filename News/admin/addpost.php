<?php 
include("header.php"); 
// if($_SESSION['user_role']=='0'){
//     header("location: {$hostname}/admin/post.php");
// }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Post Form</title>
</head>
<body>
 

<div class="adduser-container">
    <h2>Add New Post</h2>
    <form id="addUserForm" method="POST"  action="save-post.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Post Description:</label>
            
            <textarea id="description" name="description" rows="4" required cols="50"></textarea>
        </div>
        <div class="form-group">
            <label for="categoriy">Category:</label>
            <select id="categoriy" name="categoriy" required>
                <option disabled>Select Category </option>
                <?php
                include("config.php");
                $sql_category = "SELECT * FROM category  ";
                $result_category = mysqli_query($conn, $sql_category) or die("Query Failed");

                    if(mysqli_num_rows($result_category) > 0 ){
                        while($row = mysqli_fetch_assoc($result_category)){
                            echo " <option value='{$row['category_id']}'>{$row['category_name']}</option>";
                        }
                    }
                
                ?>
                
            </select>
        </div>

        <div class="form-group">
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>
        
        
        <div class="form-group">
            <button type="submit" name="save">Add New Post</button>
        </div>
    </form>
</div>

</body>
</html>
