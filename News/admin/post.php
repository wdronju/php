<?php
include("header.php");






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>All Post</title>
</head>

<body>
    <div class="user-container">
        <h2>All Post</h2>

        <?php
                include("config.php");

                $sql_post  = "SELECT * FROM post";
                $query_post = mysqli_query($conn, $sql_post);

                $total_Number_or_Rows = mysqli_num_rows($query_post);

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



        // $sql = "SELECT * FROM post
        // LEFT JOIN category ON post.category = category.category_id
        // LEFT JOIN user ON post.author = user.user_id
        // ORDER BY post.post_id DESC LIMIT 5 OFFSET $offset";

        if ($_SESSION['user_role'] == '1') {
            $sql = "SELECT post.post_id, post.title,  post.description, post.post_date, category.category_name, user.username FROM post
                LEFT JOIN category ON post.category = category.category_id
                LEFT JOIN user ON post.author = user.user_id
                ORDER BY post.post_id DESC LIMIT 5 OFFSET $offset";
        } elseif ($_SESSION['user_role'] == '0') {
            $sql = "SELECT post.post_id, post.title,  post.description, post.post_date, category.category_name, user.username FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.author = {$_SESSION['user_id']}
                    ORDER BY post.post_id DESC LIMIT 5 OFFSET $offset";
        }

               





                $result = mysqli_query($conn, $sql) or die("Query failed");

                if (mysqli_num_rows($result) > 0) {
                    



                ?>

        <table class="user-table">
            <div class="adduser"><a href="addpost.php">Add New Post</a></div>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post Title</th>
                    <th>Category</th>
                    <th>Post Date</th>
                    <th>Author</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
<?php  
while ($row = mysqli_fetch_assoc($result)) {

?>
                <tr>
                    <td><?php echo $row['post_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td><?php echo $row['post_date']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <a class="edit-button" href="update-post.php?id=<?php echo $row['post_id']; ?>">Edit</a>

                    </td>
                    <td>
                        <a class="delete-button" href="delete-post.php?id=<?php echo $row['post_id']; ?>">Delete</a>
                    </td>

                </tr>

                <?php  
                    }

?>


               
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <?php } ?>
        
        <div class="pagination">
            <?php 
            
            if($pageDecreement == 0){
                // echo "<span id='disable' class='page-number active'>Prev</span>";
            }else{
                echo "<a class='page-number active' href='post.php?page=$pageDecreement'>Prev</a>";
            }
            
            ?>

            <?php
            
            for ($number = 1; $number <= $dividatd; $number++) {
                        
                if($number == $page_number ){
               
                echo "<span id='disable'>$number</span>";
                
            }else{
                echo "<a class='page-number active' href='post.php?page=$number'>$number</a>";
            }
            
        }
            
            ?>

        <?php  
        
        if($pageIncreement > $dividatd){
            // echo "<span id='disable' >Next</span>";
        }else{
            echo    "<a class='page-number active' href='post.php?page=$pageIncreement'>Next</a>";
        }
        
        ?>
     
        </div>


        <!-- <div class="pagination">
            <a class='page-number active' href=''>Prev</a>
            <span id='disable'>1</span>
            <a class='page-number active' href=''>2</a>
            <span id='disable'>Next</span>
            <a class='page-number active' href=''>Next</a>
        </div> -->

    </div>
</body>

</html>