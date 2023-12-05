<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Data Update Form</title>
</head>
<body>
    <?php include("header.php"); ?>

    <div class="form-container">
        <h2>Update Records</h2><br><br>

        <?php 
        
        $id = $_GET['id'];
        $sql = "SELECT * FROM students  WHERE id = $id	";

        $result = mysqli_query($conn,$sql) or die("Connection failed");

        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){

           
       
        ?>


        <form action="updatedata.php" method="post">
            <label for="name">Name:</label>
            <input  value="<?php echo $row['id']; ?>" type="hidden" id="id" name="id" >
            <input  value="<?php echo $row['name']; ?>" type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input value="<?php echo $row['address']; ?>" type="text" id="address" name="address" required>

            <label for="class">Class:</label>
            <?php  
            $sql1 = "select * FROM student_class";

            $result1 = mysqli_query($conn,$sql1) or die("Query failed");

            if(mysqli_num_rows($result1) > 0){
            
            ?>
            <select id="class" name="class" required>
                <?php
                while($row1 = mysqli_fetch_assoc($result1)){
                    if($row['class']==$row1['class_id']){
                        $select=  "selected";
                    }else {
                        $select=  "";
                    }
                ?>
                
                <option <?php echo $select;?>  value="<?php echo $row1['class_id']; ?>"><?php echo $row1['class_name']; ?></option>

                <?php } ?>
                
            </select>
            <?php } ?>

            <label for="phone">Phone:</label>
            <input value="<?php echo $row['phone']; ?>" type="tel" id="phone" name="phone"  required>
            
            
            <input type="submit" value="Update Data">
        </form>

        <?php  }  }
?>

    </div>

</body>
</html>
