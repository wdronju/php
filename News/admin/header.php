<?php
include("config.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("location: {$hostname}/admin/");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- responsive css   -->
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>


    <div>
        <div class="header">
            <div class="logo">
                <h4><a><?php echo "Hello, " . $_SESSION['username']; ?></a></h4>
                <a href="http://localhost/php/news/index.php"><i class="fa-regular fa-newspaper"></i></a>
                <a href="logout.php">Logout</a>
            </div>

            <ul>
                <li><a href="<?php echo $hostname; ?>/admin/post.php">Post</a></li>

                <?php

                if ($_SESSION['user_role'] == '1') {


                ?>
                    <li><a href="<?php echo $hostname; ?>/admin/category.php">Category</a></li>
                    <li><a href="<?php echo $hostname; ?>/admin/user.php">Users</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>



</body>

</html>