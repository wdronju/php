<?php include("header.php"); 

if($_SESSION['user_role']=='0'){
    header("location: {$hostname}/admin/post.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>User Management</title>
</head>

<body>
    
    <div class="user-container">
        <h2>User Management</h2>
        <table class="user-table">
            <div class="adduser"><a href="add-user.php">Add User</a></div>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("config.php");

                $sql_total  = "SELECT * FROM user";
                $query_total = mysqli_query($conn, $sql_total);

                $total_Number_or_Rows = mysqli_num_rows($query_total);

                 $dividatd = ceil( $total_Number_or_Rows / 5);

                if(isset($_GET['page'])){
                    

                    $page_number = $_GET['page'];
                    $offset = ($page_number - 1) * 5;

                    $pageIncreement = $page_number + 1;
                    $pageDecreement = $page_number - 1;
                }else{
                    $offset = 0;

                    $pageIncreement = 2;
                    $pageDecreement = 0;
                    $page_number = 1;
                }

                $sql = "SELECT * FROM user ORDER BY user_id ASC LIMIT 5 OFFSET $offset";
                $result = mysqli_query($conn, $sql) or die("Query failed");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {



                ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name'] .  " " . $row['last_name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php

                                if ($row['role'] == 0) {
                                    echo "Normal User";
                                } else {
                                    echo "Admin";
                                }

                                ?></td>
                            <td>
                                <a class="edit-button" href="update-user.php?id=<?php echo $row['user_id']; ?>">Edit</a>

                            </td>
                            <td>
                                <a class="delete-button" href="delete-user.php?id=<?php echo $row['user_id']; ?>">Delete</a>
                            </td>

                        </tr>
                    <?php } ?>

                    <!-- Add more rows as needed -->
            </tbody>
        </table>
    <?php  }

            

    ?>

        <div class="pagination">
            <?php 
            
            if($pageDecreement == 0){
                // echo "<span id='disable' class='page-number active'>Prev</span>";
            }else{
                echo "<a class='page-number active' href='user.php?page=$pageDecreement'>Prev</a>";
            }
            
            ?>

            <?php
            
            for ($number = 1; $number <= $dividatd; $number++) {
                        
                if($number == $page_number ){
               
                echo "<span id='disable'>$number</span>";
                
            }else{
                echo "<a class='page-number active' href='user.php?page=$number'>$number</a>";
            }
            
        }
            
            ?>

        <?php  
        
        if($pageIncreement > $dividatd){
            // echo "<span id='disable' >Next</span>";
        }else{
            echo    "<a class='page-number active' href='user.php?page=$pageIncreement'>Next</a>";
        }
        
        ?>
     
        </div>
    </div>

</body>

</html>