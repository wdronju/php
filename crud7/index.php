<?php

include("connect.php");
include("header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="MAIN">
        All Data
        <hr><br><br>
        <?php 
        

        $sql = "SELECT * FROM students JOIN student_class WHERE students.class = student_class.class_id	";

        $result = mysqli_query($conn,$sql) or die("Connection failed");

        if(mysqli_num_rows($result) > 0){
        ?>
        <div class="table">
            <table>
                <thead>
                   
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Phone</th>
                        <th>Action</th>
                    
                </thead>
                <tbody>
                    <?php 
                    while($row = mysqli_fetch_assoc($result)){

                   

                    ?>
                    <tr>
                       <td><?php echo $row['id']; ?></td>
                       <td><?php echo $row['name']; ?></td>
                       <td><?php echo $row['address']; ?></td>
                       <td><?php echo $row['class_name']; ?></td>
                       <td><?php echo $row['phone']; ?></td>

                        <td class="action">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a>
                            <a href="   delete.php?id=<?php echo $row['id']; ?>"" class="delete">Delete</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
            <?php  }
            
            else{
                echo "<h2>No Records Found.</h2>";
            }
            mysqli_close($conn); 
            ?>
        </div>
    </div>
</body>
</html>