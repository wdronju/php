<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Form</title>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="form-container">
        <h2>Add New Records</h2><br><br>
        <form action="save.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <?php  
                $sql = "SELECT *  FROM student_class";
                $result = mysqli_query($conn,$sql) or die("Connection failed");
                while ($row = mysqli_fetch_assoc($result)){
                    
               
                ?>
                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

                <?php  } ?>
            </select>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone"  required>
            
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
