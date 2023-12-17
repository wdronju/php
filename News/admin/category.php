<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    
    <?php include("header.php"); ?>
    <div class="user-container">
        <h2>All Category:</h2>
        <table class="user-table">
            <div class="adduser"><a href="add-category.php">Add Category</a></div>

            <thead>
                <tr>
                    <th>ID No.</th>
                    <th>Category Name</th>
                    <th>Number of Posts</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include("config.php");

                $sql_total  = "SELECT * FROM category";
                $query_total = mysqli_query($conn, $sql_total);

                $total_Number_or_Rows = mysqli_num_rows($query_total);

                $dividatd = ceil($total_Number_or_Rows / 3);

                if (isset($_GET['page'])) {


                    $page_number = $_GET['page'];
                    $offset = ($page_number - 1) * 3;

                    $pageIncreement = $page_number + 1;
                    $pageDecreement = $page_number - 1;
                } else {
                    $offset = 0;

                    $pageIncreement = 2;
                    $pageDecreement = 0;
                    $page_number = 1;
                }

                $sql = "SELECT * FROM category ORDER BY category_id ASC LIMIT 3 OFFSET $offset";
                $result = mysqli_query($conn, $sql) or die("Query failed");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {



                ?>
                        <tr>
                            <td><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            
                            <td>
                                <a class="edit-button" href="edit-category.php?id=<?php echo $row['category_id']; ?>">Edit</a>

                            </td>
                            <td>
                                <a class="delete-button" href="delete_category.php?id=<?php echo $row['category_id']; ?>"">Delete</a>
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

        if ($pageDecreement == 0) {
            // echo "<span id='disable' class='page-number active'>Prev</span>";
        } else {
            echo "<a class='page-number active' href='category.php?page=$pageDecreement'>Prev</a>";
        }

        ?>

        <?php

        for ($number = 1; $number <= $dividatd; $number++) {

            if ($number == $page_number) {

                echo "<span id='disable'>$number</span>";
            } else {
                echo "<a class='page-number active' href='category.php?page=$number'>$number</a>";
            }
        }

        ?>

        <?php

        if ($pageIncreement > $dividatd) {
            // echo "<span id='disable' >Next</span>";
        } else {
            echo    "<a class='page-number active' href='category.php?page=$pageIncreement'>Next</a>";
        }

        ?>

    </div>
    </div>

</body>

</html>