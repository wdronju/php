<?php include("connect.php"); ?>
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
                $number_of_rows = mysqli_num_rows($result);
                echo $number_of_rows;
                ?>
            </a>
        </div>
    </div>



    <div class=" formcontainer">
        <?php
        

        if ($_GET['id']) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM user WHERE id=$id";
            $query = mysqli_query($conn, $sql);

            $data = mysqli_fetch_assoc($query);
            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $address = $data['address'];
            $id= $data['id'];
        }
        if(isset($_POST['update'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $sql_update_1 = "UPDATE user SET name='$name',email='$email',phone='$phone',address='$address' WHERE id='$id'";
            if(mysqli_query($conn,$sql_update_1)==true){
                header('Location: index.php'); // Corrected the syntax of header function
                exit(); // Ensure that the script stops after redirecting
            }

        }

        ?>
        <div class="formbox">
            <form id="myForm" method="POST">
                <h3 style="text-align: center;">Edit Data</h3><br>
                <hr><br>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name;?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $email;?>">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $address;?>">
                </div>
                <input type="text" name="id" hidden value="<?php echo $id;?>">
                <p class="error-message" id="errorMessage"></p>
                <button type="submit" name="update">UPDATE</button>
            </form>
        </div>
    </div>


</body>

</html>