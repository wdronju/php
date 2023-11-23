<?php
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;900&display=swap');
    </style>
    <title>Crud Project</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <a href="insert.php"><i class="fa-solid fa-user-plus"></i>Add User</a>
            <a href="index.php">Home</a>
            <a href="index.php"><i class="fa-solid fa-users-between-lines"></i><b>Totall User: </b>
            <?php
            $sql = "SELECT * FROM `user`";
            $result = mysqli_query($conn, $sql);
            $number_of_rows= mysqli_num_rows($result);
            echo $number_of_rows;
            ?>
            </a>
        </div>
    </div>

    <div class="table">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th width='10%'>User </th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `user`";
                    $result = mysqli_query($conn, $sql);



                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['name'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        $address = $row['address'];
                        $id = $row['id'];
                        $image = $row['imageName'];
                    ?>
                        <tr>
                            <td><img class="profile" src="images/<?php echo $image; ?>" alt=""></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $address; ?></td>
                            <td width='20%' class="action">
                                <a href="edit.php?id=<?php echo $id; ?>" class="edit">Edit</a>
                                <a href="delete.php?id=<?php echo $id; ?>" class="delete">Delete</a>
                            </td>
                        </tr>
                    <?php  } ?>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>